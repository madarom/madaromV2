<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Mail\SendChangeStatutOrderMail;
use Illuminate\Support\Facades\Mail;


class CommandeController extends Controller
{
    public function list(Request $request) 
    {
        $orders = Commande::orderBy('updated_at', 'desc')->get(); 
    	return view('admin.order.list', ['orders' => $orders]);
    }

    public function detail(Request $request, $id) 
    {
        $order = Commande::find($id);

        return view('admin.order.detail', ['order' => $order]);
    }


    public function changeStatut(Request $request) 
    {
        $data = $request->all();
        $order = Commande::find($data['id']);
        $order->statut = $data['statut'];
        $order->save();

        if(isset($data['notif']) && !empty($data['message'])) {
            $this->sendNotifChangeStatut($order, $data['message']);
        }


        return redirect()->back();
    }


    private function sendNotifChangeStatut($order, $body)
    {
        $subject = 'Mis a jour de la commande ' . $order->ref;

        Mail::to($order->devis->user->email)->send(new SendChangeStatutOrderMail($subject, $subject, strval($body), $order));
        
        
    }
}
