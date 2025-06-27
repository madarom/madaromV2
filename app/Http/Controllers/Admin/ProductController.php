<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\HuileEssentielle;
use App\Models\Epice;
use App\Models\Unite;
use App\Models\ProductUnite;
use App\Models\ProductQuestion;

class ProductController extends Controller
{
    //
    const IMG_PATH = 'assets/images/products/';

    public function list(Request $request, $type) 
    {
        if($type == 1) {
            $products = HuileEssentielle::orderBy('created_at', 'desc')->get();
        } else {
            $products = Epice::orderBy('created_at', 'desc')->get();
            
        }
    	return view('admin.products.list', ['products' => $products, "type" => $type]);
    }

    public function add(Request $request, $type) 
    {
        $unites = Unite::orderBy('designation_fr')->get();
    	return view('admin.products.new', ["type" => $type, 'unites' => $unites]);
    }

    public function update(Request $request, $id) 
    {
        $product = Product::with('images')->with('unites')->find($id);
        //var_dump($product->unites->pluck('unite_id')->toArray());
        $unites = Unite::orderBy('designation_fr')->get();
        
        $type = $product->product_type_id;
        return view('admin.products.new', ["product" => $product, "type" => $type, 'unites' => $unites]);
    }

    public function delete(Request $request) 
    {
        $product = Product::find($request->id);
        $product->delete();
        
        return redirect()->back();
    }

    public function save(Request $request) {


        $validated = $request->validate([
            'nom' => 'required',
            'subtitle' => 'required',
            'summary_desc' => 'required',
            'detail_desc' => 'required',
            'nom_en' => 'required',
            'subtitle_en' => 'required',
            'summary_desc_en' => 'required',
            'detail_desc_en' => 'required'
        ]);


        

        $data = $request->all();
        
        $unites = $data['unites'];
        unset($data['unites']);
        if(isset($data['id'])) {
            //update produit
            unset($data['_token']);
            $data = $this->manageBoolean($data);
            $id = $data['id'];
            $product = Product::find($id);
            $data['ref'] = $this->refProduct($id, $data['product_type_id']);
            $product->update($data);
            
            $images = ProductImage::where('product_id', $id)->get();
            
            foreach ($images as $key => $image) {
                if($data['preview'.$image->id] == 'delete') {
                    if(file_exists(self::IMG_PATH . $image->filename))
                        unlink(self::IMG_PATH . $image->filename);
                    $image->delete();
                    
                }
            }
            if(!is_null($request->images)) {
                 foreach ($request->images as $key => $image) {
                    $imageName = time() . $id . $key . '.' . $image->extension();
                    $image->move(public_path(self::IMG_PATH), $imageName);

                    ProductImage::create([
                        'filename' => $imageName,
                        'product_id' => $id
                    ]);
                }
            }
           

        } else {

            //Creation produit
            unset($data['_token']);
            $data = $this->manageBoolean($data);
            
            $product = Product::create($data);
            $id = $product->id;
            $product->update(['ref' => $this->refProduct($id, $data['product_type_id'])]);
            

            $this->deleteProductImage($id);

            if(!is_null($request->images)) {
                 foreach ($request->images as $key => $image) {
                    $imageName = time() . $id . $key . '.' . $image->extension();
                    $image->move(public_path(self::IMG_PATH), $imageName);

                    ProductImage::create([
                        'filename' => $imageName,
                        'product_id' => $id
                    ]);
                }
            }
        }

        ProductUnite::where('product_id', $id)->delete();
        foreach ($unites as $key => $unite) {
            ProductUnite::insert(['product_id' => $id, 'unite_id' => $unite]);
        }
        
        
        return redirect()->route('admin.product.list', [$data['product_type_id']]);
    }

    private function manageBoolean($data)
    {
        $data['pure'] = ($data['pure'] == 'on') ? 1 : 0;

        $data['home_page'] = ($data['home_page'] == 'on') ? 1 : 0;

        $data['stock'] = ($data['stock'] == 'on') ? 1 : 0;

        return $data;
    }
    private function deleteProductImage($id){
        $images = ProductImage::where('product_id', $id)->get();

        foreach ($images as $key => $image) {
            if(file_exists(self::IMG_PATH . $image->filename))
                unlink(self::IMG_PATH . $image->filename);
        }

        ProductImage::where('product_id',$id)->delete();
    }

    private function refProduct($id, $type)
    {
        $ref = 'P';
        if($type == 1) {
            $ref.='H';
        }
        else $ref .= 'E';

        $id = sprintf("%03d", $id);
        $ref.=$id;

        return $ref;
    }


    public function questions(Request $request) 
    {
        $questions = ProductQuestion::orderBy('created_at', 'desc')->get(); 
        return view('admin.products.questions_list', ['questions' => $questions]);
    }
}
