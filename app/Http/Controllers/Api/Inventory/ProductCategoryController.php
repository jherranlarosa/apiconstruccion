<?php
namespace App\Http\Controllers\Api\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Model\Inventory\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Validator;


class ProductCategoryController extends BaseController
{
    /**
     * Product Category api
     *
     * @return \Illuminate\Http\Response
     */
  

    public function createProductCategory(Request $request)
    {
        $productCategory = new ProductCategory();
        $productCategory->name=$request->name;        
        $productCategory->description=$request->description;        
        $productCategory->save();        
        return $this->sendResponse($productCategory, 'Category Product create !! :)');
    }

    public function listProductCategory()
    {
        $productCategory=ProductCategory::select('*')->where('status',1)->get();
        return $this->sendResponse($productCategory, 'Loaded List Category Successfully :)');
    }

    public function updateProductCategory(Request $request)
    {
        $productCategory =ProductCategory::find($request->id);
        $productCategory->name=$request->name;        
        $productCategory->description=$request->description;     
        $productCategory->save();      
        return $this->sendResponse($productCategory, 'Category of Measure Updated Successfully !! :)');
    }

    public function deleteProductCategory(Request $request)
    {
        $productCategory =ProductCategory::find($request->id);
        $productCategory->status=0;        
        $productCategory->save();        
        return $this->sendResponse($productCategory, 'Category of Measure Removed Successfully !! :)');
    }
}