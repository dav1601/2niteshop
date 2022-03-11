<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;

class ClientPageController extends Controller
{
    public function index($slug, Request $request)
    {
        $page = Pages::where('slug', 'LIKE', $slug)->firstOrFail();
        return view('client.page.index', compact('page'));
    }
}
