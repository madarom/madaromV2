<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class CompteAdminController extends Controller
{
    //

    public function list(Request $request) 
    {
    	$admins = Admin::get();
    	return view('admin.compte.list', ['admins' => $admins]);
    }


    public function update(Request $request) 
    {
    	$admin = Admin::find($request->id);

         $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id
        ]);

        if ($validator->fails()) {
        	\Session::flash('error', 'error'); 
		    return redirect()->back();
		}

        $adminData = $request->all();

        unset($adminData['_token']);
        $admin->update($adminData);
        $request->session()->flash('message', 'Informations modifié avec succès');
        return redirect()->back();
    }


    public function add(Request $request) 
    {
    	$admin = Admin::find($request->id);

         $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins'
        ]);

        if ($validator->fails()) {
        	\Session::flash('error', 'error'); 
		    return redirect()->back();
		}

        $adminData = $request->all();
        $adminData['password'] = bcrypt($adminData['password']);
        $adminData['is_admin'] = 1;
        unset($adminData['_token']);
        Admin::create($adminData);
        return redirect()->back();
    }

    public function updatePassword(Request $request) 
    {

    	$admin = Admin::find($request->id);


         $validator = \Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
        	\Session::flash('error', 'error'); 
		    return redirect()->back();
		}

        $adminData = $request->all();
        unset($adminData['_token']);
        $adminData['password'] = bcrypt($adminData['password']);
        $admin->update($adminData);
        $request->session()->flash('message', 'Informations modifié avec succès');
        return redirect()->back();
    }


    public function delete(Request $request) 
    {
    	$admin = Admin::find($request->id)->delete();
        return redirect()->back();
    }
}
