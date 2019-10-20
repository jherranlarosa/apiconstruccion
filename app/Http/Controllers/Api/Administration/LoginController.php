<?php


namespace App\Http\Controllers\Api\Administration;


use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Model\User;
use App\Model\UserRol;
use Illuminate\Support\Facades\Auth;
use Validator;
use Goutte;
use DB;

class LoginController extends BaseController
{

       /**
     * @param $hash
     * @param $password
     * @return bool
     */
    public function decrypt($hash,$password)
    {
        return password_verify($password,$hash);
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    
    public function login(Request $request)
    { 

        $user = User::select('id','name','rolId','password')->where('name',$request->username)->first();
        $rol =  UserRol::select('*')->where('id',$user->rolId)->first();
          
           if(is_null($user)) {
        
                $this->response->data = '';
                $this->response->error = 'notlogin';
                $this->response->message = 'not user found';
                return $this->response;
            }

            $response = $this->decrypt($user->password,$request->password);
        
            if(!$response){
             
            $this->response->data = '';
            $this->response->error = 'notlogin';
            $this->response->message = 'not match password';
            return $this->response;
             
             }

             $arrayRoles=[];
             array_push($arrayRoles,$rol->name);
  
         $user->token=$rol->name;
         $user->roles=$arrayRoles;
         $user->introduction='introduction';
         $user->avatar='https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif';

         return $this->sendResponse($user,'Loaded List Category Successfully :)');
 
    }

public function getAllRol(Request $request)
    { 
       
        $user=  User::select('users.name as name', 'user_rol.name as rol','users.remember_token as token')
                ->join('user_rol', 'users.rolId', '=', 'user_rol.id')
                ->get();
       
        $i=0;
		$rolesUser=array();
		
                foreach($user as $t){

                    $arrayRoles=[];
                    array_push($arrayRoles,$t->rol);
            
                    
                    $rolesUser[$i]["name"]=$t->name;
                    $rolesUser[$i]["roles"]=$arrayRoles;
                    $rolesUser[$i]["token"]=$t->rol;
                    $rolesUser[$i]["introduction"]="Intro".$i;
                    $rolesUser[$i]["avatar"]="https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif";
                    
                    $i++;
                    } 

        
    return $this->sendResponse(json_encode($rolesUser),'Loaded List Category Successfully :)');
   
                
         }

    public function info(Request $request)
    {

        $user=  User::with('userModuleRols.userRol')->where('name',$request->token)->first();
        return $this->sendResponse($user,'Loaded List Category Successfully :)');
    }

    public function logout()
    {
        return 'ok';
    }

} 