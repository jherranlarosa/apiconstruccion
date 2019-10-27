<?php


namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $token = Str::random(60);
        $token_create=hash('sha256', $token);
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['token'] =$token_create;
        $user = User::create($input);
        $success['name'] =  $user->name;
        $success['token'] =  $token_create;


        return $this->sendResponse($success, 'User register successfully.');
    }



}