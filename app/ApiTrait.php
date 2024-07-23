<?php

namespace App;

trait ApiTrait
{
    public function apiResponse($data= null,$message = null,$status = null){

        $array = [
            'data'=>$data,
            'message'=>$message,
            'status'=>$status,
        ];

        return response($array,$status);

    }
    public function returnError( $msg,$code)
    {
        return response()->json([
            'status' => false,
            'errNum' => $code,
            'msg' => $msg
        ],$code);
    }
}
