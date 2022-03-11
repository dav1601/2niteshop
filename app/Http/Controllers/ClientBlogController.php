<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\CatBlog;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ClientBlogController extends Controller
{
    function index($cat = 0, $detail = 0, Request $request)
    {
        if ($request->has('search')) {
            if ($request->search != '') {
                $kw = $request->search;
            } else {
                $kw = 0;
            }
        } else {
            $kw = 0;
        }
        $blogs = Blogs::where('active', '=', 1);
        if ($detail == 0) {
            if ($cat != 0) {
                $cat_blog  = CatBlog::where('slug', 'LIKE', $cat)->firstOrFail();
                $id = $cat_blog->id;
                $blogs = $blogs->where(function ($query) use ($id) {
                    $query->where('cat_id', '=', $id)
                        ->orWhere('cat_sub_id', '=', $id);
                });
                $bc = CatBlog::where('slug', 'LIKE', $cat)->firstOrFail()->name;
                $backLink = url('tin-tuc/'. CatBlog::where('slug', 'LIKE', $cat)->firstOrFail()->slug);
            } else {
                $bc = "Tin Tức";
                $cat_blog = (object)['name'=>"Tin Tức"];
                $backLink = url('tin-tuc/');
            }
            if ($kw  != 0) {
                $blogs = $blogs->where('title', 'LIKE', '%' . $kw . '%');
            }
            $blogs = $blogs->Paginate(10);
            return view('client.blog.index', compact('blogs', 'bc', 'cat', 'cat_blog' , 'kw' , 'backLink'));
        } else {
            $blog = $blogs->where('slug', 'LIKE', $detail)->firstOrFail();
            $involve = Blogs::where('active', '=', 1)->where('id' , '!=' , $blog->id);
            $cat_id = $blog->cat_id;
            $cat_sub_id = $blog->cat_sub_id;
            $involve = $involve -> where(function ($query) use ($cat_id , $cat_sub_id) {
                $query->where('cat_id', '=', $cat_id)
                    ->orWhere('cat_sub_id', '=', $cat_sub_id);
            });
            $involve = $involve->orderBy('id' , 'ASC') -> limit(6)->get();
            return view('client.blog.detail', compact('blog' , 'involve'));
        }
    }
}
