<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\SendWelcomeClient;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendReinitPasswordMail;


class LoginController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('guest');
    }

    public function login(Request $request){

    	return view('account.login');
    }


    public function register(Request $request){
    	return view('account.register');
    }

    public function passwordforgot(Request $request) {
        return view('account.forgot_password');
    }

    /**
     * @throws \Exception
     */
    public function processRegistration(Request $request) {
    	$validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'ville' => 'required',
            'pays' => 'required',
            'telephone' => 'required|numeric',
            'password' => 'required|confirmed',
            'prenom' => 'required',
            'adresse' => 'required'
        ]);

        $userData = $request->all();
        unset($userData['_token']);
        unset($userData['password_confirmation']);
        $userData['password'] = bcrypt($userData['password']);
        $user = User::create($userData);
        Auth::login($user);
        $result_mail =  $this->sendWelcomeMail($user);
        logger($result_mail);
        $request->session()->flash('message', $result_mail);
        if(is_login_redirected_last_url()) {
            clear_last_url();
            return redirect()->to("/");
        } else
            return redirect()->route('espace_client');
    }

    private function sendWelcomeMail($user): string
    {
        try {
            Mail::to($user->email)->send(new SendWelcomeClient($user));
            return "message de bienvenue envoyee avec succes";
        }catch (\Exception $e) {
            return ("l'adresse email ".$user->email." n'est pas valide");
        }
    }

    public function processLogin(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if(Auth::attempt($credentials)) {
            if(is_login_redirected_last_url()) {
                $last_url = get_last_url();
                clear_last_url();
                return redirect()->to("/");
            } else
                return redirect()->route('espace_client');
        }

        return back()->withErrors([
            'message' => 'error',
        ]);
    }

    public function reinitPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();

        if($user) {
            $token = bcrypt($user->id . time());

            $user->update([
                'remember_token' => $token
            ]);


            $this->sendReinitPasswordMail($user);
            $request->session()->flash('message', 'message');
            return redirect()->back();

        } else {
            $request->session()->flash('message_error', 'message_error');
            return redirect()->back();
        }
    }

    private function sendReinitPasswordMail($user)
    {
        Mail::to($user->email)->send(new SendReinitPasswordMail($user));
    }

    public function updateReinitPassword(Request $request)
    {
        $user = User::where('remember_token', $request->token)->first();
        if($user) {
            return view('account.reinit-password', ['token' => $request->token]);
        } else {
            return redirect()->route('passwordforgot');
        }
    }

     public function createPassword(Request $request)
    {
       $validated = $request->validate([
            'password' => 'required|confirmed'
        ]);

       $user = User::where('remember_token', $request->token)->first();
        if($user) {

            $user->update(
                ['password' => bcrypt($request->password),
                'remember_token'=> null]
            );

            $request->session()->flash('message_create_password', 'message_create_password');
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }
}
