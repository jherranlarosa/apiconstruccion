<?php
namespace App\Http\Controllers\Api\Alumno;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Model\Alumno\Alumno;
use App\Model\Alumno\Persona;
use App\Model\Alumno\TipoAlumno;
use Illuminate\Support\Facades\Auth;
use Validator;
use Storage;
use Image;
use Goutte;

class AlumnoController extends BaseController
{
    /**
     * Alumno  api
     *
     * @return \Illuminate\Http\Response
     */
  

    public function getClientWDocument(Request $request)
    {

        $Persona =Persona::where('dni',$request->dI)->first();
        if($Persona){
            return $this->sendResponse('hh','El dni ya fue registrado por '.$Persona->nombre.'!! )');
            }
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

            return $this->sendResponse($data, 'Bienvenido '.$nombres.'!! :)');
    }

    
     public function createAlumno(Request $request)
    {

        // $z=1;
        $timestamp = strtotime($request->fechanacimiento);  
        $fecha = date('Y-m-d', $timestamp );

        $Persona = new Persona();
        $Persona->apaterno=$request->apaterno;        
        $Persona->amaterno=$request->amaterno;
        $Persona->nombre=$request->nombre;     
        $Persona->dni=$request->dni; 
        $Persona->sexo=$request->sexo;     
        $Persona->fechanacimiento=$fecha;     
        $Persona->edad=$request->edad;            
        $Persona->correoelectronico=$request->correoelectronico;            
        $Persona->idubigeo=$request->idubigeo;            
        $Persona->numeroemergencia=$request->numeroemergencia;            
        $Persona->direccion=$request->direccion;            
        $Persona->gradoinstruccion=$request->gradoinstruccion;            
        $Persona->celular=$request->celular;            
        $Persona->telefono=$request->telefono;            
        $Persona->save();        
        
        $TipoAlumno =TipoAlumno::where('descripcion',$request->tipoalumno)->first();
        
        $Alumno = new Alumno();
        $Alumno->idpersona=$Persona->idpersona;            
        $Alumno->idtipoalumno=$TipoAlumno->idtipoalumno;            
        $Alumno->save();        
        

        return $this->sendResponse($Alumno, 'Alumno create !! :)');
    }

    public function listAlumno()
    {
        $Alumno=Alumno::with('persona','persona.ubigeo','tipoalumno')->select('*')->get();
        return $this->sendResponse($Alumno, 'Loaded List Successfully :)');
    }

    public function updateAlumno(Request $request)
    {
        
        
        $timestamp = strtotime($request->fechanacimiento);  
        $fecha = date('Y-m-d', $timestamp );

        $Persona =Persona::find($request->idpersona);
        $Persona->apaterno=$request->apaterno;        
        $Persona->amaterno=$request->amaterno;
        $Persona->nombre=$request->nombre;     
        $Persona->dni=$request->dni; 
        $Persona->sexo=$request->sexo;     
        $Persona->fechanacimiento=$fecha;     
        $Persona->edad=$request->edad;            
        $Persona->correoelectronico=$request->correoelectronico;            
        $Persona->idubigeo=$request->idubigeo;            
        $Persona->numeroemergencia=$request->numeroemergencia;            
        $Persona->direccion=$request->direccion;            
        $Persona->gradoinstruccion=$request->gradoinstruccion;            
        $Persona->celular=$request->celular;            
        $Persona->telefono=$request->telefono;            
        $Persona->save();        
        
        $TipoAlumno =TipoAlumno::where('descripcion',$request->tipoalumno)->first();

        $Alumno =Alumno::find($request->idalumno);
        $Alumno->idpersona=$request->idpersona;            
        $Alumno->idtipoalumno=$TipoAlumno->idtipoalumno;            
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