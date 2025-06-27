<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\DemandeDevis;
use App\Models\Commande;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout(Request $request){
        
        Auth::logout();
        return redirect()->route('login');
    }

    public function espaceClient(Request $request){

        
        $demandeDevis = DemandeDevis::where('user_id', Auth::user()->id)->whereNull('commande_id')->orderBy('updated_at', 'desc')->paginate(5);

        $orders = Commande::whereRelation('devis', 'user_id', '=', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(5);

        $tab = 'quote';
        if(isset($request->tab)) {
            $tab = $request->tab;
        }

        return view('account.espace-clients', ['demandeDevis' => $demandeDevis, 'orders' => $orders, 'tab' => $tab]);
    }

    public function monCompte(Request $request){
        $user = User::find(Auth::user()->id);
        return view('account.mon-compte', ['user' => $user]);
    }

    public function updateAccount(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'ville' => 'required',
            'pays' => 'required',
            'telephone' => 'required|numeric',
            'prenom' => 'required',
            'adresse' => 'required'
        ]);

        $userData = $request->all();
        unset($userData['_token']);
        $user->update($userData);
        $request->session()->flash('message', 'Informations modifié avec succès');
        return redirect()->back();
    }  

    public function updateMdp(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $validated = $request->validate([
            'old_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!\Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect'));
                }
            }],
            'password' => 'required|confirmed'
        ]);

        $userData = $request->all();
        unset($userData['_token']);
        unset($userData['password_confirmation']);
        unset($userData['old_password']);
        $userData['password'] = bcrypt($userData['password']);
        $user->update($userData);
        $request->session()->flash('message', 'Mot de passe modifié avec succès');
        return redirect()->back();
    }
 
}
