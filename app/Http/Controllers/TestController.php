<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Banners;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\Products;
use App\Models\Slides;
use App\Repositories\FileInterface;

use App\Repositories\ModelInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class TestController extends Controller
{
    public function index(Request $request, ModelInterface $vam, FileInterface $file)
    {

      
        // $products =  Products::whereHas('categories', function ($q) {
        //     $q->where('category_id', "81");
        // })->where('stock', 2)->get();
        // foreach ($products as $key => $value) {
        //     $prd = ProductCategories::where('category_id', 152)->where('products_id', $value->id)->first();
        //     // if (!$prd) {
        //     //     ProductCategories::create(['category_id' => 152, "products_id" => $value->id]);
        //     // }
        //     dump($prd);
        // }
        // dd($fol);
        // Session::forget("crawler");
        // $s =  Slides::all();
        // foreach ($s as $key => $value) {
        //     Slides::where('id', $value->id)->update(['users_id' => 1, 'index' => $value->id]);
        // }
        // $categories =  Category::tree(false);
        // $index = 0;
        // foreach ($categories as $category) {
        //     if ($category->parent_id == 0) {
        //         Category::where('id',  $category->id)->update(['position' => $index]);
        //     }
        //     $index++;
        //     // $this->update_sort_child($category);
        // }
        // return view('test');
        return view('test');
    }
    public  function update_sort_child($category)
    {
        if ($category->children) {
            $index = 0;
            foreach ($category->children as $key => $value) {
                Category::where('id',  $value->id)->update(['position' => $index]);
                $index++;
                $this->update_sort_child($value);
            }
        }
    }
    //     public function handle($path)

    //     {
    //         if ($path && File::exists(public_path($path))) {
    //             $folder = pathinfo($path)['dirname'];
    //             $upload =  Cloudinary::upload(public_path($path), ["folder" => $folder]);
    //             $save = [];
    //             $save["id"] = $upload->getPublicId();
    //             $save["path"] = $upload->getSecurePath();
    //             return json_encode($save);
    //         }
    //         return null;
    //     }
}
