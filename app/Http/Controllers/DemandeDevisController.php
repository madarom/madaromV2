<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeDevis;
use App\Models\DemandeDevisProduct;
use App\Mail\SendDemandeDevisMail;
use Illuminate\Support\Facades\Mail;
use App\Models\DemandeDevisComplaint;

class DemandeDevisController extends Controller
{

	const STATUT_EN_ATTENTE = 1;
	const STATUT_EN_COURS = 2;
	const STATUT_TRAITE = 3;

	public function __construct()
    {
        $this->middleware('auth')->except('new');;
    }

    public function new(Request $request)
    {
        if(\Auth::check()) {
           $products = get_products_panier();
            return view('demande_devis.new', ['products' => $products]); 
        } else {
            $request->session()->flash('quote', 'quote');
            set_last_url(redirect()->getUrlGenerator()->current());
            return redirect()->route('login');
        }
        
    }

    public function submit(Request $request)
    {
    	$data = $request->all();
        $devis = DemandeDevis::create([
        	'message' => $data['message'],
            'price_type' => $data['price_type'],
        	'user_id' => \Auth::user()->id
        ]);

        $devis->update(['ref' => $this->refDemandeDevis($devis->id)]);

        $products = $data['product_id'];
        $quantite = $data['quantite'];
        $unite = $data['unite'];

        foreach ($products as $key => $p) {
        	DemandeDevisProduct::create([
        		'demande_devis_id' => $devis->id,
        		'quantite' => $quantite[$key],
        		'product_id' => $p,
                'unite_id' => $unite[$key],
        	]);
        }

        empty_panier();

        $this->sendNotifAdminMail($devis, $data['message']);

        return redirect()->route('espace_client');
    }


    public function update(Request $request)
    {
    	$data = $request->all();
    	$devis = DemandeDevis::find($data['id']);
        $devis->update([
        	'message' => $data['message'],
            'price_type' => $data['price_type'],
        	'statut'=> self::STATUT_EN_ATTENTE
        ]);


        $products = $data['products'];
        $quantite = $data['quantite'];
        $unite = $data['unite'];

        foreach ($products as $key => $p) {
        	$prod = DemandeDevisProduct::find($p);
        	$prod->update([
        		'quantite' => $quantite[$key],
                'unite_id' => $unite[$key]
        	]);
        }

        $this->sendNotifAdminMail($devis, $data['message']);

        return redirect()->route('espace_client');
    }

    public function detail(Request $request, $id)
    {
    	$devis = DemandeDevis::find($id);

        return view('demande_devis.detail', ['devis' => $devis]);
    }


    public function order(Request $request, $ref)
    {
        $devis = DemandeDevis::where('ref', $ref)->first();
        if($devis->statut == 3) {
            return view('order.order', ['devis' => $devis]);
        } else return redirect()->back();
        
    }

    public function deleteProduct(Request $request, $id)
    {
    	$product = DemandeDevisProduct::find($id)->delete();
        return redirect()->back();
    }

    private function refDemandeDevis($id)
    {
        $ref = 'DD';
        $id = sprintf("%06d", $id);
        $ref.=$id;

        return $ref;
    }

    private function sendNotifAdminMail($devis, $body)
    {
        $subject = 'Nouvelle demande de devis ' . $devis->ref;
        $emails = admin_emails_notifs();

        foreach ($emails as $key => $email) {
            Mail::to($email)->send(new SendDemandeDevisMail($subject, $subject, strval($body), $devis));
        }
        
    }

    public function delete(Request $request, $id)
    {
        DemandeDevis::find($id)->delete();
        return redirect()->route('espace_client');
    }

    public function complaint(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required'
        ]);

        $data = $request->all();
        unset($data['_token']);
        DemandeDevisComplaint::create($data);
        $request->session()->flash('message', 'message');
        return redirect()->back();
    }

}
