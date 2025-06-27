<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

use App\Models\User;
use App\Models\HuileEssentielle;
use App\Models\Epice;
use App\Models\Partenaire;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        
        seo('title');
        $huiles = HuileEssentielle::with('images')->with('unites')->where('home_page', 1)->where('stock', 1)->paginate(4);
        
        $epices = Epice::with('images')->where('home_page', 1)->where('stock', 1)->paginate(4);
        return view('home', ['huiles' => $huiles, 'epices' => $epices]);
    }
    //
    public function setLanguage(Request $request, $locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        if(\Auth::check()) {
            $user = User::find(\Auth::id());
            $user->lang = $locale;
            $user->update();
        }

    	return redirect()->back();
    }

    public function saveContact(Request $request)
    {
    	
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'ville' => 'required',
            'pays' => 'required',
            'telephone' => 'required|numeric',
            'prenom' => 'required',
            'adresse' => 'required',
            'lang' => lang()
        ]);


        $data = $request->all();


        unset($data['_token']);
        Contact::create($data);
        $request->session()->flash('message', 'message');
        return redirect()->back();
    } 

    public function partenaires(Request $request)
    {
        $partenaires = Partenaire::orderBy('created_at', 'desc')->get();
       return view('nos_partenaires', ['partenaires' => $partenaires]);
    }


}
