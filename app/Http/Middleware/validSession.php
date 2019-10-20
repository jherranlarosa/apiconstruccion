<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Constant\ResponseCode;
use App\Model\Responses\ResponseLog;
use App\Model\Security\SecurityProfileUser;
use App\Model\Security\SecuritySession;
use Closure;
use App\Model\Responses\ResponseAcepted;
use BaoPham\DynamoDb\Facades\DynamoDb;
class validSession
{
    /**
     * validSession constructor.
     */
    public function __construct(ResponseAcepted $response)
    {
        $this->response = $response;
    }


    /**
     * @param $data
     * @param $message
     * @param $error
     * @param $status
     */
    public function createResponse($data, $message, $error, $status)
    {
        $this->response->data = $data;
        $this->response->message = $message;
        $this->response->error = $error;
        $this->response->statusApi = $status;
    }


    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|mixed
     */
    public function handle($request, Closure $next)
    {
        $header = $request->header('token');
        $session = SecuritySession::where('token', $header)->first();
        $dateTime = date("Y-m-d H:i:s");
        $addTime = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($dateTime)));

        $request->sessionObject = $session;

        if (!is_null($session)) {

            $date1 = new \DateTime($session->expire);
            $date2 = new \DateTime($dateTime);

            if ($date2 < $date1) {
                $user = SecurityProfileUser::find($session->userId);
                $request->user = $user;
                $request->msg = 'ok';
                $session->expire = $addTime;
                $session->save();
                return $next($request);
            }
            $this->createResponse('', 'session expired', '', ResponseCode::HTTP_ACCEPTED);
        } else {
            $request->user = null;
            $request->msg = 'expired';
            $this->createResponse('', '', 'bad token', ResponseCode::HTTP_UNAUTHORIZED);
        }

        return response($this->response);  //abort('okdas');//$next($request);
    }



    public function terminate($request,$response)
    {

        //$ip = $request->header('X-Forwarded-For');
        $headers = $request->headers->all();
        $user= '';
        if(!is_null($request->user)){
            $user = $request->user;
        }
        $uri = $request->path();

        /*

        DynamoDb::table('response_log')
            ->setItem(DynamoDb::marshalItem(
                [
                    'idx' => uniqid(base64_encode(str_random(20))),
                    'api' => $uri,
                    'ip' => ($headers),
                    'userId' => $request->user->id,
                    'response' => '',//substr(json_decode($response->getContent()),0,1000),
                    'session' => $request->header('token'),
                    'date' => date("Y-m-d H:i:s")
        ]
            ))
            ->prepare()
            ->putItem();


        */
    }
}
