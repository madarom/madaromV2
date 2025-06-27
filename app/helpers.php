<?php

use App\Models\I18n;
use App\Models\StaticPage;
use App\Models\ImagePage;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Config;
use App\Models\Currency;
use App\Models\Unite;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\SEO;

if(!function_exists('isMaintenance')) {
	function isMaintenance(){
		return (configuration('maintenance') == 1);
	}
}

if(!function_exists('isMaintenancePage')) {
	function isMaintenancePage($path) {
		$routes= ['maintenance', 'contact-madarom', 'admin', 'change-language'];
		foreach ($routes as $key => $route) {
			if(strpos($path, $route) !== false) {
				return false;
			}
		}

		return true;
	}
}

if(!function_exists('lang')) {
	function lang(){
		if(\Auth::check()) {
            $user = User::find(\Auth::id());
            return $user->lang;
        }
		return  \Session::get('locale');
	}
}

if(!function_exists('format_date')) {
	function format_date($date){
		if(lang() == 'en') {
			return date('m/d/Y', strtotime($date));
		} 

		return date('d/m/Y', strtotime($date)); 
	}
}

if(!function_exists('i18n_product')) {
	function i18n_product($product, $attr){
		$attr .= (lang() == 'fr') ? '' : '_' . lang();
		return $product->$attr;
	}
}

if(!function_exists('i18n_unite')) {
	function i18n_unite($unite, $attr){
		$attr .= '_' . lang();
		return $unite->$attr;
	}
}

if(!function_exists('i18n_partenaire')) {
	function i18n_partenaire($partenaire, $attr){
		$attr .= '_' . lang();
		return $partenaire->$attr;
	}
}



if(!function_exists('i18n')) {
	function i18n($key){
		$lang = lang();
		$info = explode('.', $key);
		$text = I18n::where('page', $info[0])->where('key', $info[1])->first();

		if($text) {
			return $text->$lang;
		}
		return $key;
	}
}


if(!function_exists('staticPage')) {
	function staticPage($page){
		$lang = lang();
		$infoPage = StaticPage::where('page', $page)->first();
		if($infoPage) {
			return $infoPage->$lang;
		}
	}
}

if(!function_exists('image')) {
	function image($key){
		$info = explode('.', $key);
		$image = ImagePage::where('page', $info[0])->where('key', $info[1])->first();

		if($image) {
			return '<img src="/assets/images/' . $image->filename .'" alt="'. $image->alt .'" />';
		}
		return '<img src="/assets/images/not found" alt="Not found" />';
	}
}

if(!function_exists('image_alt')) {
	function image_alt($key){
		$info = explode('.', $key);
		$image = ImagePage::where('page', $info[0])->where('key', $info[1])->first();

		if($image) {
			return $image->alt;
		}
		return $key;
	}
}

if(!function_exists('admin')) {
	function admin(){
		return \Session::get('ADMIN_USER');
	}
}

if(!function_exists('isHuilesList')) {
	function isHuilesList(){
		return (\Route::currentRouteName() == 'product.huile_essentiel.list');
	}
}

if(!function_exists('url_product')) {
	function url_product($product){

		//si huiles essentielles, produit type id = 1
		if($product->product_type_id == 1) {
			return route('product.huile_essentiel.detail', [slugify(i18n_product($product, 'nom')) . '-' . $product->id]);
		} else {
			return route('product.epice.detail', [slugify(i18n_product($product, 'nom')) . '-' . $product->id]);
		}
	}
}

if(!function_exists('nb_panier')) {
	function nb_panier(){

		$basket = panier();
		if($basket)
		return count($basket);

		return 0;
	}
}


if(!function_exists('panier')) {
	function panier(){
		return \Session::get('basket');
	}
}

if(!function_exists('get_products_panier')) {
	function get_products_panier(){
		$products = panier();
        if(is_null($products)) $products = [];

        return $products;
	}
}

if(!function_exists('qte_added_to_basket')) {
	function qte_added_to_basket($id){

		$list_products = \Session::get('basket');
        if($list_products) {
            foreach ($list_products as $key => $product) {
                if($product->id == $id) return $product->quantite;
            }
        }
		
		return 0;
	}
}

if(!function_exists('unite_added_to_basket')) {
	function unite_added_to_basket($id){

		$list_products = \Session::get('basket');
        if($list_products) {
            foreach ($list_products as $key => $product) {
                if($product->id == $id) return Unite::find($product->unite);
            }
        }
		return Unite::find(1);
	}
}

if(!function_exists('add_to_basket')) {
	function add_to_basket($prod){
		if(qte_added_to_basket($prod['id_product']) == 0) {
        	$p = Product::find(intval($prod['id_product']));
        	$p->quantite = $prod['quantite'];
        	$p->unite = $prod['unite'];
        	\Session::push('basket', $p);
        } else {
        	$list_products = \Session::get('basket');
	        if($list_products) {
	            foreach ($list_products as $key => $product) {
	                if($product->id == $prod['id_product']) {
	                	$product->quantite = intval($prod['quantite']);
	                	$product->unite = intval($prod['unite']);
	                }
	            }
	        }
        }

        return nb_panier();       	
	}
}

if(!function_exists('set_last_url')) {
	function set_last_url($url){
		\Session::put('last_url', $url);       	
	}
}

if(!function_exists('get_last_url')) {
	function get_last_url(){
		return \Session::get('last_url');       	
	}
}

if(!function_exists('clear_last_url')) {
	function clear_last_url(){
		\Session::forget('last_url');       	
	}
}

if(!function_exists('is_login_redirected_url')) {
	function is_login_redirected_last_url(){
		$url =  get_last_url();
		$list = ['quote-request/new'];
		foreach ($list as $key => $l) {
		    if(str_contains($url, $l)) return true;
		} 
		return false;   	
	}
}



if(!function_exists('delete_from_basket')) {
	function delete_from_basket($id){
		
		$list_products = \Session::get('basket');
	    if($list_products) {
	        foreach ($list_products as $key => $product) {
	            if($product->id == $id) {
	            	unset($list_products[$key]);
	            	\Session::put('basket', $list_products);
	            }
	        }
	    }

        return nb_panier();       	
	}
}

if(!function_exists('empty_panier')) {
	function empty_panier(){
		\Session::forget('basket');      	
	}
}

if(!function_exists('admin_user')) {
	function admin_user(){
		return \Session::get('ADMIN_USER');      	
	}
}

if(!function_exists('configuration')) {
	function configuration($key){
		$config = DB::table('config')->where('key', $key)->first();
		if($config) return $config->value;     	
	}
}

if(!function_exists('admin_emails_notifs')) {
	function admin_emails_notifs(){
		return  unserialize(configuration('admin_mails'));	
	}
}

if(!function_exists('devises')) {
	function convert_devises($amount, $iso){

		//$devises = array("BIF","CLP","DJF","GNF","JPY","KMF","KRW","MGA","PYG","RWF","UGX","VND","VUV","XAF","XOF","XPF");
		/*if (!in_array(strtoupper($curr), $devises)) {
		    return $amount * 100;
		}*/

		$cur = Currency::where('iso', $iso)->first();
		if($cur) {
			return $amount * pow(10,intval($cur->dec));
		}

		return $amount();
	}
}

if(!function_exists('format_money')) {
	function format_money($amount){
		return number_format($amount, 2);
	}
}

if(!function_exists('numero_facture')) {
	function numero_facture($order){
		return date('Ymd') . $order->devis->id . sprintf("%03d", $order->id);
	}
}


/**
 * Return the slug of a string to be used in a URL.
 *
 * @return String
 */

if(!function_exists('slugify')) {
	function slugify($text){
	    // replace non letter or digits by -
	    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

	    // transliterate
	    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	    // remove unwanted characters
	    $text = preg_replace('~[^-\w]+~', '', $text);

	    // trim
	    $text = trim($text, '-');

	    // remove duplicated - symbols
	    $text = preg_replace('~-+~', '-', $text);

	    // lowercase
	    $text = strtolower($text);

	    if (empty($text)) {
	      return 'n-a';
	    }

	    return $text;
	}
}

if(!function_exists('seo')) {
	function seo($attr){
	    $url = '/' . \Route::current()->uri;
	    $attribut = $attr . '_' . lang();

	    if($url == '/') {
	    	$seo = SEO::where('url', '/')->first();
	    	return $seo->$attribut;
	    } else {
	    	$seos = SEO::get();
	    	foreach ($seos as $key => $seo) {
		    	if($seo->url != '/' and str_contains($url, $seo->url)) {
		    		return $seo->$attribut;
		    	}
		    }
	    }
	    
	    return i18n('seo.'. $attr); 
	}
}

if(!function_exists('app_name')) {
	function app_name(){
	    return "Mad'arom";
	}
}





