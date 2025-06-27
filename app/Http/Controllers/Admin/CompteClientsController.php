<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CompteClientsController extends Controller
{
    //
    public function list(Request $request) 
    {
    	$clients = User::where('is_admin', 0)->orderBy('created_at', 'desc')->get();
    	return view('admin.account.list', ['clients' => $clients]);
    }
}
