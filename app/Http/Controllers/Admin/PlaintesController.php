<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandeDevisComplaint;
use App\Models\CommandeComplaint;

class PlaintesController extends Controller
{
   public function demande_devis(Request $request) 
   {
	    $complaints = DemandeDevisComplaint::orderBy('created_at', 'desc')->get(); 
	    return view('admin.complaint.demande_devis_list', ['complaints' => $complaints]);
   }

   public function commande(Request $request) 
   {
	    $complaints = CommandeComplaint::orderBy('created_at', 'desc')->get(); 
	    return view('admin.complaint.commande_list', ['complaints' => $complaints]);
   }
}
