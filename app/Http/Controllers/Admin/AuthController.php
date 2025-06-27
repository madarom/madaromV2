<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Admin;

class AuthController extends Controller
{
    public function login(Request $request)
    {


        if ($request->isMethod('post')) {

            

	        $validator = \Validator::make($request->all(), [
	            'email' => 'required|email|max:255',
                'password' => 'required'
	        ]);

	        if ($validator->fails()) {
	        	\Session::flash('error', 'Connexion erroné'); 
			    return redirect()->back();
			}


           
            $arrUser = Admin::where('email', $request->email)->first();

            if (!empty($arrUser) && \Hash::check($request->password, $arrUser->password)) {
                \Session::put('ADMIN_USER', $arrUser);
                return redirect()->route('admin.dashboard');
            } else {
                $request->session()->flash('error_credentials', 'Mauvaise identification');
                return redirect()->back()->withInput($request->all());
            }   

            /*
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                var_dump(Auth::user()->check());
                exit;
                return redirect()->route('admin.dashboard');
            } else {
                \Session::flash('error_credentials', 'Connexion erroné'); 
                return redirect()->back();
            }*/
        }
        return view('admin.login');
    }


    public function logout()
    {
        \Session::forget('ADMIN_USER');
        return redirect()->route('admin.login');
    }
}
