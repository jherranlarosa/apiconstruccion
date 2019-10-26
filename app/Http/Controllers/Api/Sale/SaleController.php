<?php
namespace App\Http\Controllers\Api\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Model\Inventory\ProductCategory;
use App\Model\Sale\Sale;
use App\Model\Sale\SaleDetail;
use App\Model\Inventory\Product;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Goutte;


class SaleController extends BaseController
{
    /**
     * Product Category api
     *
     * @return \Illuminate\Http\Response
     */
    public function getClientWDocument(Request $request)
    {
        $scrp = Goutte::request('POST', 'http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/api/AfiliadoApi/GetNombresCiudadano?CODDNI='.$request->dI);
        $scrp->filter('body');
        $response=$scrp->text();
        // $response=explode("|",$response);
        $response=str_replace("|"," ",$response);
        return $this->sendResponse($response, $response);
    }

    public function list(Request $request)
    {
        $list=Sale::all();
        return $this->sendResponse($list,"venta Exitosa ;)");

    }
    public function saveSale(Request $request)
    {
        $user=User::select('*')->where('documentIdentification',$request->clientDocument)->first();
        if($user){
            $userClient=$user->id;
        }else{
            $userNew=new User();  
            $userNew->rolId=3;
            $userNew->name=$request->clientName;
            $userNew->userName=$request->clientDocument;
            $userNew->documentIdentification=$request->clientDocument;
            $userNew->password=bcrypt($request->clientDocument);
            $userNew->save();
            $userClient=$userNew->id;
        }

        $sale=new Sale();  
        $sale->userSellerId=1;
        $sale->userClientId=$userClient;
        $sale->igv_amount=$request->igv;
        $sale->net_amount=$request->netValue;
        $sale->total_amount=$request->totalValue;
        $sale->masterStatusId=1;
        $sale->save();

        $dataDetail=$request->dataDetail;
        for ($i=0; $i < count($dataDetail); $i++) { 
            # code...
            $saleDetail=new SaleDetail();  
            $saleDetail->saleId=$sale->id;  
            $saleDetail->productId=$dataDetail[$i]['id'];  
            $saleDetail->save();

            $productEdit=Product::find($dataDetail[$i]['id']);
            $productEdit->stock=(float)$productEdit->stock-(float)$dataDetail[$i]['quanty'];        
            $productEdit->save();     
        }
        
        return $this->sendResponse('success',"venta Exitosa ;)");
    }
}