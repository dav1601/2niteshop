<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AdminPageBuilder extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'dashboard']);
            return $next($request);
        });
    }
    //    ///////////////////////////////////////
    public function index(Request $request)
    {
        return view('admin.pagebuilder.index');
    }
    //  //////////////////////////////////////// end index
    //    ///////////////////////////////////////
    public function create(Request $request)
    {
        return view('admin.pagebuilder.create');
    }
    //  //////////////////////////////////////// end create
    //    ///////////////////////////////////////
    public function handle(Request $request)
    {
        $html_section = "";
        $html_package = "";
        $type = $request->type;
        switch ($type) {
            case 'add-section':
                $section = new Collection();
                $section->push((object)$request->section);
                $html_section .= view('components.admin.pagebuilder.section.item', ['section' => $section[0]]);
                break;
            case 'add-package':
                $package = $request->package;
                $html_package .= view('components.admin.pagebuilder.package', ['package' => $package]);
                break;
            case 'change-layout':
                $section = new Collection();
                $section->push((object)$request->section);
                $html_section .= view('components.admin.pagebuilder.column', ['section' => $section[0]]);
                break;
            default:
                # code...
                break;
        }
        $data['html_section'] = $html_section;
        $data['html_package'] = $html_package;
        return response()->json($data);
    }
    //  //////////////////////////////////////// end handle
    //    ///////////////////////////////////////
    public function render_package(Request $request)
    {
        $t = $request->type;
        $html = "";
        $data = $request->has('data') ? $request->data : null;
        // return $data;
        $html .= view('components.admin.modal.pagebuilder.package', ['type' => $t, 'data' => $data]);
        return response()->json(['html' => $html]);
    }
    //  //////////////////////////////////////// end build_package
}
