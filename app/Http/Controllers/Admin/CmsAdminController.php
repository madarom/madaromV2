<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\I18n;
use App\Models\StaticPage;
use App\Models\ImagePage;

class CmsAdminController extends Controller
{
	const IMG_PATH = 'assets/images/';
    public function contenuTextuelle(Request $request) 
    {
    	$texts = I18n::get();
    	$selectedPage = null;
    	$pages = I18n::select('page')->distinct()->orderBy('page')->get();
    	if($request->page && $request->page!='all') {
    		$texts = I18n::where('page', $request->page)->get();
    		$selectedPage = $request->page;
    	}
    	return view('admin.cms.text', ['texts' => $texts, 'selectedPage' => $selectedPage, 'pages' => $pages]);
    }

    public function saveContenuTextuelle(Request $request) 
    {
    	$validated = $request->validate([
            'page' => 'required',
            'key' => 'required',
            'fr' => 'required',
            'en' => 'required'
        ]);

        $data = $request->all();
        $id = $data['id'];
        unset($data['id']);
        unset($data['_token']);
        $data['fr'] = nl2br($data['fr']);
        $data['en'] = nl2br($data['en']);
        if($id) {
        	$text = I18n::find($id)->update($data);
        } else {
        	I18n::create($data);
        }
        return redirect()->back();
    }

    public function contenuPageStatic(Request $request)
    {
    	$selectedPage = null;
    	$currentPage = null;
    	$pages = StaticPage::select('page')->distinct()->orderBy('page')->get();
    	

    	if($request->page) {
    		$selectedPage = $request->page;
    		$currentPage = StaticPage::where('page',$selectedPage)->first();
    	} else {
    		if(count($pages) > 0) {
	    		$selectedPage = $pages[0]->page;
	    		$currentPage = StaticPage::where('page',$selectedPage)->first();
	    	}
    	}
    	return view('admin.cms.statics-page', [
    		'selectedPage' => $selectedPage,'pages' => $pages, 'currentPage' => $currentPage]);
    }


    public function SaveContenuStaticPage(Request $request)
    {
    	$data = $request->all();
        unset($data['_token']);
    	$text = StaticPage::where('page', $data['page'])->update($data);
    	return redirect()->back();
    }

    public function contenuImages(Request $request) 
    {
    	$pages = ImagePage::select('page')->distinct()->orderBy('page')->get();
    	$selectedPage = '';
    	if($request->page) {
    		$selectedPage = $request->page;
    	} else {
    		if(count($pages) > 0) {
	    		$selectedPage = $pages[0]->page;
	    	} 
    	}

    	
    	$imagesPages = ImagePage::where('page', $selectedPage)->get();
    	return view('admin.cms.images', [ 'imagesPages' => $imagesPages, 'pages' => $pages, 'selectedPage' => $selectedPage]);
    }

    public function SaveImages(Request $request)
    {
    	$data = $request->all();
    	unset($data['_token']);
    	foreach ($data['key'] as $k => $key) {
    		$id = $data['id'][$k];
    		$info = [];

    		$imagePage = ImagePage::find($id);
    		$info['alt'] = (isset($data['alt'][$k])) ? $data['alt'][$k] : '';
    		$image_key = 'image' . $id;
    		if($request->$image_key) {

    			$imageName = time() . str_replace(' ', '', $key) . '.' . $request->$image_key->extension();
    			$request->$image_key->move(public_path(self::IMG_PATH), $imageName);
    			if(file_exists(self::IMG_PATH . $imagePage->filename))
                    unlink(self::IMG_PATH . $imagePage->filename);
                $info['filename'] = $imageName;
                $imagePage->update($info);
    		} else {
    			 $imagePage->update($info);
    		}
    		
    	}

    	return redirect()->back();
    }
}
