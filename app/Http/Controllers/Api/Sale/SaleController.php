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
 
        $scrp = Goutte::request('GET', 'https://eldni.com/buscar-por-dni?dni='.$request->dI);
        
        $var=$scrp->filter('tbody');
        $response=$var->text();
        $splitName = explode(' ', trim($response));
        $dni=$splitName[0];
        $neo=str_replace($dni," ",$response);
        $splitNameTwo = explode(' ', trim($neo));
        $nombre1=$splitNameTwo[0];
        $nombre2=$splitNameTwo[1];
        $nombre3=$splitNameTwo[2];
        $nombres=$nombre1.' '.$nombre2.' '.$nombre3;
        $neo2=str_replace($nombre1," ",$neo);
        $neo3=str_replace($nombre2," ",$neo2);
        $neo4=str_replace($nombre3," ",$neo3);
        $neo5 = explode(' ', trim($neo4));
        $apellidocompuesto1=$neo5[0];
        $apellidocompuesto2=$neo5[1];
        $apellidocompuesto3=$neo5[2];
        $apellidopaterno=$apellidocompuesto1.' '.$apellidocompuesto2.' '.$apellidocompuesto3;
        $neo6=str_replace($apellidocompuesto1," ",$neo4);
        $neo7=str_replace($apellidocompuesto2," ",$neo6);
        $neo8=str_replace($apellidocompuesto3," ",$neo7);
        $apellidomaterno=trim($neo8);
       
        $data = array(
            "nombres" => trim($nombres),
            "apaterno" => trim($apellidopaterno),
            "amaterno" => trim($apellidomaterno)
          );

        return $data;
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