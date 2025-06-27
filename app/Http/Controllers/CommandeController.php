<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeDevis;
use App\Models\Commande;
use App\Models\CommandeComplaint;
use App\Mail\SendNotifClientNewOrder;
use App\Mail\SendNewOrderAdminMail;
use Illuminate\Support\Facades\Mail;
use PDF;
use Stripe\StripeClient;


class CommandeController extends Controller
{
    public function processOrder(Request $request)
    {
    	$data = $request->all();
    	$devis = DemandeDevis::find($data['id']);
    	$token = bcrypt($devis->ref);
    	$devis->order_token = $token;
    	$devis->update();

        $stripe = new StripeClient(env('STRIPE_SECRET'));

        $checkout_session = $stripe->checkout->sessions->create([
		  'line_items' => [[
		    'price_data' => [
		      'currency' => strtolower($devis->response->price_unit->iso),
		      'product_data' => [
		        'name' => $devis->ref
		      ],
		      'unit_amount' => convert_devises($devis->response->price, $devis->response->price_unit->iso),
		    ],
		    'quantity' => 1,
		  ]],
		  'mode' => 'payment',
		  'success_url' => route('order.success') . "?token=" . $token,
		  'cancel_url' => route('order.error',['ref' => $devis->ref]),
		]);

		return redirect()->to($checkout_session->url);

	}

	public function error(Request $request, $ref)
	{
	    $devis = DemandeDevis::where('ref', $ref)->first();

	    if($devis) {
	    	$devis->update(['order_token' => null]);
	        return view('order.error', ['devis' => $devis]);
	    } else return redirect()->back();

	}

	public function success(Request $request)
	{
	    $devis = DemandeDevis::where('order_token', $request->token)->first();

	    if($devis) {
	    	if($devis->commande_id) {
	    		$order = $devis->order;

	    	} else {
	    		$order = Commande::create([
		    		'demande_devis_id' => $devis->id,
		    		'statut' => 1

		    	]);
		    	$order->update(['ref' => $this->refCommande($order->id), 'numero_facture' => numero_facture($order)]);
		    	$devis->commande_id = $order->id;
		    	$devis->update();
	    	}

	    	$this->sendNotifClientNewOrder($order, '');

	    	$this->SendNewOrderAdminNotif($order);

	        return view('order.success', ['order' => $order]);
	    } else return redirect()->back();

	}

	private function refCommande($id)
    {
        $ref = 'CO';
        $id = sprintf("%06d", $id);
        $ref.=$id;

        return $ref;
    }


    public function detail(Request $request, $id)
    {
    	$order = Commande::find($id);

        return view('order.detail', ['order' => $order]);
    }

    public function invoice(Request $request, $id)
    {
    	$order = Commande::find($id);
    	$pdf = PDF::loadView('order.invoice', compact('order'));
    	return $pdf->download(i18n('order.facture_file') . $order->numero_facture . ".pdf");

        //return view('order.invoice', ['order' => $order]);
    }

    private function sendNotifClientNewOrder($order, $body)
    {
        $subject = i18n('email.order_success_object') . $order->ref;

        $pdf = PDF::loadView('order.invoice', compact('order'));
        $pdf->save(public_path("assets/pdf/" . i18n('order.facture_file') . $order->numero_facture . ".pdf"));

        Mail::to($order->devis->user->email)->send(new SendNotifClientNewOrder($subject, $subject, strval($body), $order));


    }


    private function SendNewOrderAdminNotif($order)
    {
        $subject = 'Nouvelle commande ' . $order->ref;
        $emails = admin_emails_notifs();

        foreach ($emails as $key => $email) {
            Mail::to($email)->send(new SendNewOrderAdminMail($subject, $order));
        }
    }


     public function complaint(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required'
        ]);

        $data = $request->all();
        unset($data['_token']);
        CommandeComplaint::create($data);
        $request->session()->flash('message', 'message');
        return redirect()->back();
    }


}
