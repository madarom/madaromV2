<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class MessagesController extends Controller
{
    public function list(Request $request) 
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get(); 
    	return view('admin.messages.list', ['contacts' => $contacts]);
    }
}
