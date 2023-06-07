<?php

namespace App\Http\Traits;

trait Responser
{
    protected function successResponse($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse($message = null, $code = 500, $data = [])
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data
        ], $code);
    }
    protected function backSuccess($message = "Success", $data = [])
    {
        $data["success"] = $message;
        return redirect()->back()->with($data);
    }
    protected function backError($message = "Error", $data = [])
    {
        $data["error"] = $message;
        return redirect()->back()->with($data);
    }
    protected function backValidate($validator)
    {
        return redirect()->back()->withErrors($validator)->withInput();
    }
}
