<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ads;
use App\Models\User;
use App\Models\Todos;
use App\Models\Orders;
use App\Models\Slides;
use App\Models\Banners;
use App\Models\Category;
use App\Models\Products;
use App\Jobs\SendOrderMail;
use App\Models\gllProducts;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Repositories\FileInterface;
use App\Repositories\ModelInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Repositories\MailOrderInterface;
use Spatie\Permission\Models\Permission;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class TestController extends Controller
{
    public function index(Request $request, ModelInterface $vam, FileInterface $file, MailOrderInterface $mail_order)
    {
        // $gll =  gllProducts::orderBy('index', 'asc')->get()->groupBy('products_id');
        // foreach ($gll as $prdid =>  $value) {
        //     foreach ($value as $key => $g) {
        //         gllProducts::where('products_id', $prdid)->where('index', $g->index)->update(['index' => $key]);
        //     }
        // }

        dd("done");
    }
}
