<?php
namespace App\Http\Controllers\Api\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Model\Inventory\ProductUnit;
use Illuminate\Support\Facades\Auth;
use Validator;


class ProductUnitController extends BaseController
{
    /**
     * Product Unit api
     *
     * @return \Illuminate\Http\Response
     */
  

    public function createProductUnit(Request $request)
    {
        $productUnit = new ProductUnit();
        $productUnit->name=$request->name;        
        $productUnit->description=$request->description;        
        $productUnit->save();        
        return $this->sendResponse($productUnit, 'Unit Product create !! :)');
    }

    public function listProductUnit()
    {
        $productUnit=ProductUnit::select('*')->where('status',1)->get();
        return $this->sendResponse($productUnit, 'Loaded List Successfully :)');
    }

    public function updateProductUnit(Request $request)
    {
        $productUnit =ProductUnit::find($request->id);
        $productUnit->name=$request->name;        
        $productUnit->description=$request->description;     
        $productUnit->save();      
        return $this->sendResponse($productUnit, 'Unit of Measure Updated Successfully !! :)');
    }

    public function deleteProductUnit(Request $request)
    {
        $productUnit =ProductUnit::find($request->id);
        $productUnit->status=0;        
        $productUnit->save();        
        return $this->sendResponse($productUnit, 'Unit of Measure Removed Successfully !! :)');
    }
}