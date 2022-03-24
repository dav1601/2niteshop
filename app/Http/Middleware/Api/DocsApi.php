<?php

namespace App\Http\Middleware\Api;

use Closure;
use App\Models\Api\ApiAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DocsApi
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
        if ($request->has('token_api') && $request->has('security_code') && $request->has('rq_at')) {
            $token = Crypt::decrypt($request->token_api);
            $secode = Crypt::decrypt($request->security_code);
            $rq_at = $request->rq_at;
            if (ApiAdmin::where('token_api', $token)->where('security_code', $secode)->where('requested_at', $rq_at)->first())
            return $next($request);
            return redirect()->route('identity_confirmation')->with('error' , 1);
        }
        return redirect()->route('identity_confirmation');
    }
}
