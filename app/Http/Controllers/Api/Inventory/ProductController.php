<?php
namespace App\Http\Controllers\Api\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Model\Inventory\Product;
use App\Model\Inventory\ProductImage;
use Illuminate\Support\Facades\Auth;
use Validator;
use Storage;
use Image;

class ProductController extends BaseController
{
    /**
     * Product  api
     *
     * @return \Illuminate\Http\Response
     */
  

    public function createProduct(Request $request)
    {
        $z=rand(100000000000,999999999999);
        // $z=1;
        $product = new Product();
        $product->name=$request->name;        
        $product->description=$request->description;
        $product->unitId=$request->unitId;     
        $product->categoryId=$request->categoryId; 
        $product->stock=$request->stock;     
        $product->priceRial=$request->priceRial;     
        $product->priceSale=$request->priceSale;            
        $product->codeBar=$z;            
        $product->save();        
        return $this->sendResponse($product, 'Product create !! :)');
    }

    public function listProduct()
    {
        $product=Product::select('*')->with('productImages')->where('status',1)->get();
        return $this->sendResponse($product, 'Loaded List Successfully :)');
    }

    public function updateProduct(Request $request)
    {
        $product =Product::find($request->id);
        $product->name=$request->name;        
        $product->description=$request->description;     
        $product->unitId=$request->unitId;     
        $product->categoryId=$request->categoryId;     
        $product->stock=$request->stock;     
        $product->priceRial=$request->priceRial;     
        $product->priceSale=$request->priceSale;     
        $product->save();      
        return $this->sendResponse($product, 'Product Updated Successfully !! :)');
    }

    public function deleteProduct(Request $request)
    {
        $product =Product::find($request->id);
        $product->status=0;        
        $product->save();        
        return $this->sendResponse($product, 'Product Removed Successfully !! :)');
    }

    public function createProductImage(Request $request)
    {
        $file=$request->file;
       // $path = $request->file->store('public/imageProduct');
        // $pathash = $request->file->hashName();
        $path=  Storage::disk('public')->put('imageProduct',$file);       
        if($path){
            $pImage=new ProductImage();
            $pImage->url="http://".request()->getHttpHost()."/".$path;    
            $pImage->productId=$request->productSelectId;   
            $pImage->save();
            return $this->sendResponse("Success", 'Image  Upload Success !! :)');
        }else{
            return $this->sendResponse("Error", 'Danger, Danger  X(');
        }
    }
    
    public function searchProduct(Request $request)
    {
        $product =Product::select('*')->where('status',1)->where('codeBar',$request->codeBar)->first();
        if($product){
            return $this->sendResponse($product, 'Loaded Product Successfully !! :)');
        }else{
            return $this->sendResponse("Error", 'Producto no encontrado X(');
        }

    }

}