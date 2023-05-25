<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'pages']);
            return $next($request);
        });
    }
    ////////////////////////////////////////

    public function manage(Request $request)
    {
        $pages = Pages::orderBy('id', 'DESC')->get();
        return view('admin.pages.index', compact('pages'));
    }


    ////////////////////////////////////////
    ////////////////////////////////////////

    public function add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|unique:pages',
                'content' => 'required',
            ],
            [
                'title.required' => "Không được bỏ trống tiêu đề trang ",
                'title.unique' => "Trang đã tồn tại",
                'content.required' => 'Không được bỏ trống nội dung trang',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $page = Pages::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'users_id' => Auth::id()
            ]);
            if ($page) {
                return redirect()->back()->with('ok', 1);
            } else {
                return redirect()->back()->with('not-ok', 1);
            }
        }
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function edit($id, Request $request)
    {
        $page = Pages::where('id', '=', $id)->firstOrFail();

        return view('admin.pages.edit', compact('page' , 'id'));
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function handle_edit($id, Request $request)
    {
        $check = Pages::where('id', '=', $id)->firstOrFail();

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => "Không được bỏ trống tiêu đề trang ",
                'content.required' => 'Không được bỏ trống nội dung trang',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $page = Pages::where('id', '=', $id)->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
            ]);
            if ($page) {
                return redirect()->back()->with('ok', 1);
            } else {
                return redirect()->back()->with('not-ok', 1);
            }
        }
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function delete($id, Request $request)
    {
        $check = Pages::where('id', '=', $id)->firstOrFail();
       
        $delete = Pages::where('id', '=', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('delete-ok', 1);
        } else {
            return redirect()->back()->with('delete-not-ok', 1);
        }
    }

    ////////////////////////////////////////
    // ////////////////////////////////////
}
