<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandeDevis;
use App\Models\Currency;
use App\Models\DemandeDevisResponse;
use App\Models\DemandeDevisProduct;
use App\Mail\RespondDemandeDevisMail;
use Illuminate\Support\Facades\Mail;

class DemandeDevisController extends Controller
{
    //

    public function list(Request $request) 
    {
       
        $demandeDevis = DemandeDevis::orderBy('updated_at', 'desc')->get(); 
    	return view('admin.demande_devis.list', ['demandeDevis' => $demandeDevis]);
    }

    public function detail(Request $request, $id)
    {
    	$devis = DemandeDevis::find($id);
        $currs = Currency::get();

        return view('admin.demande_devis.detail', ['devis' => $devis, 'currs' => $currs]);
    }

    public function reply(Request $request)
    {
        $data = $request->all();
        $devisId = $data['demande_devis_id'];
        $data['user_id'] = admin_user()->id;
        $devisProduct = DemandeDevisProduct::where('demande_devis_id', $devisId)->get();

        foreach ($devisProduct as $key => $product) {
            $product->unit_price = $data['unit_price' . $product->id];
            unset($data['unit_price' . $product->id]);
            $product->update();
        }

        $devis = DemandeDevis::find($devisId);
        $devis->statut = 3;
        $devis->update();
        $response = DemandeDevisResponse::where('demande_devis_id', $data['demande_devis_id'])->first();

        if($response) {
            $response->update($data);
        } else {
            DemandeDevisResponse::create($data);
        }

        $this->sendResponseMail($devis->user->email, $devis, $data);


        return redirect()->route('admin.devis.list');
    }

    private function sendResponseMail($email, $devis, $response)
    {
        $title = 'Response to your quote request' . $devis->ref;
        $subject = 'Response to your quote request ' . $devis->ref;
        $body =  strval($response['admin_message']);

        Mail::to($email)->send(new RespondDemandeDevisMail($subject, $title, strval($body), $devis));
    }
}
