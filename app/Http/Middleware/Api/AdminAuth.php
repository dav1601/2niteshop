<?php

namespace App\Http\Middleware\Api;

use App\Models\Api\ApiAdmin;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $data_fail = ['message' => "Truy cập api bị từ chối vì chưa có tham số token_api"];
        if(!$request->has('token_api'))
        return response()->json($data_fail , 401);
        $token_api = $request->token_api;
        if (!ApiAdmin::where('token_api', '=' , $token_api)->first())
        return response()->json(['message' => "Truy cập api bị từ chối vì token_api không tồn tại trong hệ thống"] , 403);
        return $next($request);
    }
}
