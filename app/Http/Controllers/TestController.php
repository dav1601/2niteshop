<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use App\Models\Blogs;
use App\Models\Config;
use App\Models\gllCat;
use App\Models\Slides;
use App\Models\Banners;
use App\Models\Category;
use App\Models\Products;
use App\Models\showHome;
use App\Models\gllProducts;
use App\Models\ProductCategories;
use Illuminate\Http\Request;
use App\Repositories\FileInterface;

use App\Repositories\ModelInterface;
use Illuminate\Support\Facades\File;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class TestController extends Controller
{
    public function index(Request $request, ModelInterface $vam, FileInterface $file)
    {
        $products = Products::all();
        foreach ($products as  $prd) {
            $c1 = $prd->cat_id;
            $c2 = $prd->sub_1_cat_id;
            $c3 = $prd->sub_2_cat_id;
            if ($c1) {
                if (!ProductCategories::where('products_id', $prd->id)->where('category_id', $c1)->first()) {
                    ProductCategories::create([
                        'products_id' => $prd->id,
                        'category_id' => $c1
                    ]);
                }
            }


            if ($c2) {
                if (!ProductCategories::where('products_id', $prd->id)->where('category_id', $c2)->first()) {
                    ProductCategories::create([
                        'products_id' => $prd->id,
                        'category_id' => $c2
                    ]);
                }
            }
            if ($c3) {
                if (!ProductCategories::where('products_id', $prd->id)->where('category_id', $c3)->first()) {
                    ProductCategories::create([
                        'products_id' => $prd->id,
                        'category_id' => $c3
                    ]);
                }
            }
        }
        echo "ok";
    }
    public function handle($path)

    {
        if ($path && File::exists(public_path($path))) {
            $folder = pathinfo($path)['dirname'];
            $upload =  Cloudinary::upload(public_path($path), ["folder" => $folder]);
            $save = [];
            $save["id"] = $upload->getPublicId();
            $save["path"] = $upload->getSecurePath();
            return json_encode($save);
        }
        return null;
    }
}
