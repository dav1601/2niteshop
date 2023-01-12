<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;



class OptionController extends Controller
{
    //////////////////////////////////////

    public function set_cookie(Request $request)
    {
        $response = new Response('Cookie View');
        $response->withCookie(cookie()->forever('view', $request->type));
        return $response;
    }

    ////////////////////////////////////////
    public function set_nsp(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        if ($request->val != 0) {
          $request->session()->put('nsp' , 1);
        } else {
            $request->session()->put('nsp' , 0);
        }
        return $request->session()->get('nsp');
    }

}
