<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SEO;

class SEOController extends Controller
{
    public function index(Request $request)
    {
    	$selectedPage = null;
    	$currentPage = null;
    	$pages = SEO::select('url')->distinct()->orderBy('url')->get();
    	

    	if($request->page) {
    		$selectedPage = $request->page;
    		$currentPage = SEO::where('url',$selectedPage)->first();
             
    	} else {
    		if(count($pages) > 0) {
	    		$selectedPage = $pages[0]->url;
	    		$currentPage = SEO::where('url',$selectedPage)->first();
	    	}
    	}

    	return view('admin.seo.seo', [
    		'selectedPage' => $selectedPage,'pages' => $pages, 'seo' => $currentPage]);
    }

    public function save(Request $request) {
        $url = $request->url;
        $seo = SEO::where('url', $url)->first();
        $seo->update($request->all());

        return redirect()->back();
    }

    public function new(Request $request) {
        $validated = $request->validate([
            'url' => 'required'
        ]);

        $data = $request->all();
        $seo = SEO::create($data);
        return \Redirect::to(route('admin.seo') . "?page=" . $data['url']);
    }
}
