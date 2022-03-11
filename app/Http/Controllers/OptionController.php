<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;



class OptionController extends Controller
{
    //////////////////////////////////////

    public function set_cookie(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $response = new Response('Cookie view');
        $response->withCookie(cookie()->forever('view', $request->type));
        return $response;
    }

    ////////////////////////////////////////
}
