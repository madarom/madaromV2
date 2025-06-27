<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductQuestion;
use App\Models\HuileEssentielle;
use App\Models\Epice;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    const PAGINATION = 4;
    private $listOrder = 'asc';
    public function list(Request $request)
    {
        
        if($request->order) {
            $this->listOrder = $request->order;
        }
        if(isHuilesList()) {
            //liste huiles essentielles
            $products = HuileEssentielle::with('images')->orderBy('nom', $this->listOrder)->paginate(self::PAGINATION);
        } else {
             $products = Epice::with('images')->orderBy('nom', $this->listOrder)->paginate(self::PAGINATION);
        }
    	return view('products.list', ['products' => $products, 'order' => $this->listOrder]);
    }

    public function detail(Request $request, $id) 
    {
        $id = explode('-', $id);
        if(count($id) > 0 && is_int(intval($id[count($id)-1]))) {
            $product_id = $id[count($id)-1];
            $product = Product::with('images')->find($product_id);
            return view('products.detail', ['product' => $product]);
        } else {
            return abort(404);
        }
    }

    public function panier(Request $request) 
    {
        $products = get_products_panier();
        
        return view('products.panier', ['products' => $products]);
    }

    public function addPanier(Request $request)
    {
        $product = $request->all();
        $nb = add_to_basket($product);
        return json_encode(['reussi' => true, 'nb_panier' => $nb, 'quantite' => $product['quantite'], 'unite' => $product['unite']]);
    }

    public function deleteFromPanier(Request $request, $id)
    {
        delete_from_basket($id);
        return redirect()->back();
    }

    public function emptyPanier(Request $request)
    {
        empty_panier();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if($request->order) {
            $this->listOrder = $request->order;
        }

        $products = Product::with('images')->where(DB::raw("LOWER(CONCAT(ref,coalesce(nom,''),coalesce(nom_en,''),coalesce(summary_desc,''),coalesce(summary_desc_en,''),coalesce(detail_desc,''),coalesce(detail_desc_en,''),coalesce(keywords,''),coalesce(subtitle,''),coalesce(subtitle_en,'')))"), 'LIKE', "%".strtolower($keyword)."%")->orderBy('nom', $this->listOrder)->paginate(self::PAGINATION);
        return view('products.search', ['products' => $products, "keyword" => $keyword,  'order' => $this->listOrder]);
    }

    public function showPanier(Request $request)
    {
        $products = get_products_panier();
        
        return view('products.basket-summary', ['products' => $products])->render();
    }

    public function deleteFromSummPanier(Request $request)
    {
        delete_from_basket($request->id);
        $products = get_products_panier();
        
        return view('products.basket-summary', ['products' => $products])->render();
    }

    public function question(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'message' => 'required',
            'pays' => 'required',
            'lang' => lang()
        ]);

        $data = $request->all();
        unset($data['_token']);
        ProductQuestion::create($data);
        $request->session()->flash('message', 'message');
        return redirect()->back();
    }

}
