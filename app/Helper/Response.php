<?php

namespace App\Helper;

class Response
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public static function Out($status, $msg = "Something Wrong!", $data = null, $code = 404)
    {
        return response()->json(['status' => $status, 'message' => $msg, 'data' => $data], $code);
    }
    public static function unauthorized()
    {
        return response()->json(['status' => 'unauthorized', 'message' => 'null'], 401);
    }
    public static function success($msg = "Request Successfull", $code = 200)
    {
        return response()->json(['status' => 'success', 'message' => $msg], $code);
    }
    public static function error($msg = "Request Failed!", $code = 400)
    {
        return response()->json(['status' => 'failed', 'message' => $msg], $code);
    }

}
