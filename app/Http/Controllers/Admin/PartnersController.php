<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partenaire;

class PartnersController extends Controller
{
	const PARTENAIRE_LOGO_PATH = 'assets/images/partenaires/';

    public function list(Request $request) 
   {
	    $partenaires = Partenaire::orderBy('created_at', 'desc')->get(); 
	    return view('admin.partenaire.list', ['partenaires' => $partenaires]);
   }

    public function new(Request $request) 
   {
	    return view('admin.partenaire.new');
   }

    public function save(Request $request) 
   {
	    $validated = $request->validate([
            'name' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required'
        ]);

        

        $data = $request->all();
        if(isset($data['id'])) {
            //update produit
            unset($data['partenaire']);
            $id = $data['id'];
            $partenaire = Partenaire::find($id);

            if(!is_null($request->logo)) {
            	$image = $request->logo;
                $imageName = time() . $data['name'] . '.' . $image->extension();
                $image->move(public_path(self::PARTENAIRE_LOGO_PATH), $imageName);

                $data['logo'] = $imageName;

                 if(file_exists(self::PARTENAIRE_LOGO_PATH . $partenaire->logo))
                        unlink(self::PARTENAIRE_LOGO_PATH . $partenaire->logo);
            }

            $partenaire->update($data);
           

        } else {

            //Creation partenaire
            unset($data['_token']);

            if(!is_null($request->logo)) {
            	$image = $request->logo;
                $imageName = time() . $data['name'] . '.' . $image->extension();
                $image->move(public_path(self::PARTENAIRE_LOGO_PATH), $imageName);

                $data['logo'] = $imageName;
            } else {
            	$data['logo'] = 'default.png';
            }

            Partenaire::create($data);
        }
        
        
        return redirect()->route('admin.partenaire.list');
   }

   public function update(Request $request, $id) 
    {
        $partenaire = Partenaire::find($id);
        return view('admin.partenaire.new', ["partenaire" => $partenaire]);
    }
}
