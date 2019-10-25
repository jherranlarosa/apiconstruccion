<?php
namespace App\Http\Controllers\Api\Alumno;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Model\Alumno\Persona;
use Illuminate\Support\Facades\Auth;
use Validator;
use Storage;
use Image;

class AlumnoController extends BaseController
{
    /**
     * Alumno  api
     *
     * @return \Illuminate\Http\Response
     */
  

    public function createAlumno(Request $request)
    {
        $z=rand(100000000000,999999999999);
        // $z=1;
        $Alumno = new Alumno();
        $Alumno->name=$request->name;        
        $Alumno->description=$request->description;
        $Alumno->unitId=$request->unitId;     
        $Alumno->categoryId=$request->categoryId; 
        $Alumno->stock=$request->stock;     
        $Alumno->priceRial=$request->priceRial;     
        $Alumno->priceSale=$request->priceSale;            
        $Alumno->codeBar=$z;            
        $Alumno->save();        
        return $this->sendResponse($Alumno, 'Alumno create !! :)');
    }

    public function listAlumno()
    {
        $Alumno=Persona::select('*')->get();
        return $this->sendResponse($Alumno, 'Loaded List Successfully :)');
    }

    public function updateAlumno(Request $request)
    {
        $Alumno =Alumno::find($request->id);
        $Alumno->name=$request->name;        
        $Alumno->description=$request->description;     
        $Alumno->unitId=$request->unitId;     
        $Alumno->categoryId=$request->categoryId;     
        $Alumno->stock=$request->stock;     
        $Alumno->priceRial=$request->priceRial;     
        $Alumno->priceSale=$request->priceSale;     
        $Alumno->save();      
        return $this->sendResponse($Alumno, 'Alumno Updated Successfully !! :)');
    }

    public function deleteAlumno(Request $request)
    {
        $Alumno =Alumno::find($request->id);
        $Alumno->status=0;        
        $Alumno->save();        
        return $this->sendResponse($Alumno, 'Alumno Removed Successfully !! :)');
    }

    public function createAlumnoImage(Request $request)
    {
        $file=$request->file;
       // $path = $request->file->store('public/imageAlumno');
        // $pathash = $request->file->hashName();
        $path=  Storage::disk('public')->put('imageAlumno',$file);       
        if($path){
            $pImage=new AlumnoImage();
            $pImage->url="http://".request()->getHttpHost()."/".$path;    
            $pImage->AlumnoId=$request->AlumnoSelectId;   
            $pImage->save();
            return $this->sendResponse("Success", 'Image  Upload Success !! :)');
        }else{
            return $this->sendResponse("Error", 'Danger, Danger  X(');
        }
    }
    
    public function searchAlumno(Request $request)
    {
        $Alumno =Alumno::select('*')->where('status',1)->where('codeBar',$request->codeBar)->first();
        if($Alumno){
            return $this->sendResponse($Alumno, 'Loaded Alumno Successfully !! :)');
        }else{
            return $this->sendResponse("Error", 'Alumnoo no encontrado X(');
        }

    }

}