<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ads;
use App\Models\User;
use App\Models\Todos;
use App\Models\AMedia;
use App\Models\Orders;
use App\Models\Slides;
use App\Models\Banners;
use App\Models\CatGame;
use App\Models\Category;
use App\Models\Products;
use App\Jobs\SendOrderMail;
use App\Models\gllProducts;
use App\Models\typeProduct;
use Illuminate\Support\Str;
use App\Http\Traits\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Traits\Responser;
use App\Models\ProductCategories;
use App\Repositories\FileInterface;
use App\Repositories\ModelInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Repositories\MailOrderInterface;
use Spatie\Permission\Models\Permission;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TestController extends Controller
{
    use Product;
    public function index(Request $request, ModelInterface $vam, FileInterface $file, MailOrderInterface $mail_order)
    {
        $media = AMedia::orderBy('id', 'DESC')->get();
        $arr = collect($media)->toArray();
        return view("test", compact('media', 'arr'));
    }
    public function upload(Request $request)
    {



        dd("ok");
    }
}
