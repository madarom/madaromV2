<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Unite;

class ConfigController extends Controller
{
    public function index(Request $request)
    {
    	$emails = unserialize(configuration('admin_mails'));
    	$maintenance = configuration('maintenance');
    	$unites = Unite::get();
    	return view('admin.config.main', ['emails' => $emails, 
    		'maintenance' => $maintenance, 'unites' => $unites]);
    }

     public function deleteMail(Request $request){
        if(isset($request->mails)) {

        	$mails = json_decode($request->mails);
        	$emails = unserialize(configuration('admin_mails'));
        	$data = [];
        	foreach ($emails as $key => $email) {
        		if(!in_array($email, $mails)) {
        			$data[] = $email;
        		}	
        	}
        	Config::where('key', 'admin_mails')->first()->update([
        		'value' => serialize($data)
        	]);	
        }

        return  redirect()->back();
    }


    public function saveMail(Request $request){
        $validated = $request->validate([
            'email' => 'required|email'
        ]);
		$emails = unserialize(configuration('admin_mails'));
		if(!empty($request->id)) {
			foreach ($emails as $key => $email) {
				if($email == $request->id) {
					$emails[$key] = $request->email;
				}
			}
		} else {
			if(!in_array($request->email, $emails)) {
				$emails[] = $request->email;
			}
		}
		

		Config::where('key', 'admin_mails')->first()->update([
    		'value' => serialize($emails)
    	]);

        return  redirect()->back();
    }

    public function maintenance(Request $request, $value){
        Config::where('key', 'maintenance')->first()->update([
        	'value' => $value
        ]);
        return  redirect()->back();
    }

    public function deleteUnite(Request $request){
        if(isset($request->unites)) {
        	Unite::whereIn('id', json_decode($request->unites))->delete();
        }
        return  redirect()->back();
    }

    public function saveUnite(Request $request){
        $validated = $request->validate([
            'designation_fr' => 'required',
            'designation_en' => 'required',
            'abr' => 'required'
        ]);

        if(!empty($request->id)){
        	Unite::find($request->id)->update(
        		$request->all()
        	);
        } else {
        	Unite::create(
        		$request->all()
        	);
        }
        return  redirect()->back();
    }


}
