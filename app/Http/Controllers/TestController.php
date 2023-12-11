<?php

namespace App\Http\Controllers;

use Cart;
use Carbon\Carbon;
use App\Models\Ads;
use App\Models\User;
use App\Models\Ward;
use App\Models\Blogs;
use App\Models\Todos;
use App\Models\AMedia;
use App\Models\Config;
use App\Models\Orders;
use App\Models\Slides;
use App\Models\Address;
use App\Models\Banners;
use App\Models\CatGame;
use App\Models\Options;
use App\Models\Category;
use App\Models\District;
use App\Models\Products;
use App\Models\Province;
use App\Models\Insurance;
use App\Models\ProductIns;
use App\Jobs\SendOrderMail;
use App\Models\gllProducts;
use App\Models\typeProduct;
use Illuminate\Support\Str;
use App\Http\Traits\Product;
use App\Models\GroupOptions;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Traits\Responser;
use App\Models\bundled_product;
use Barryvdh\DomPDF\Facade\Pdf;
use Buihuycuong\Vnfaker\VNFaker;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\DB;
use App\Repositories\FileInterface;
use App\Repositories\ModelInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Repositories\AdminPrdInterface;
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
    // ANCHOR test_return  //////////////////////////////////////////////////////
    public function test_return(Request $request)
    {
        dd($request->all());
    }
    //////////////////////////////////////////////////////
    public function index(Request $request, ModelInterface $vam, FileInterface $file, MailOrderInterface $mail_order, AdminPrdInterface $rprd)
    {
        Cache::store("redis")->forget("province");
        Cache::store("redis")->forget("district");
        Cache::store("redis")->forget("ward");
        // Cache::store("redis")->forever("province", Province::all());
        // Cache::store("redis")->forever("district", District::all());
        // Cache::store("redis")->forever("ward", Ward::all());
        dd("ok");
        // dd(collect(Auth::user()->address)->filter(function ($item, $key) {
        //     return $item->def === 1;
        // })->first());
        // $users = Address::where("def", true)->get();
        // $user = collect($users)->random();
        // $address = collect($user->address)->filter(function ($item) {
        //     return $item['def'] === 1;
        // });
        // dd($user);
        // foreach (User::where("id", "!=", 1)->get() as $key => $value) {
        //     $fullname = VNFaker::fullname();
        //     $phone = VNFaker::mobilephone($numbers = 10);
        //     $email = VNFaker::email();
        //     while (User::where(function ($query) use ($fullname, $phone, $email) {
        //         $query->where('name', 'LIKE', $fullname);
        //         $query->orWhere('email', 'LIKE', $email);
        //         $query->orWhere('phone', 'LIKE', $phone);
        //     })->first()) {
        //         $fullname = VNFaker::fullname();
        //         $phone = VNFaker::mobilephone($numbers = 10);
        //         $email = VNFaker::email();
        //     }
        //     User::where("id", $value->id)->update(['name' => $fullname, "phone" => $phone, "email" => $email]);
        // }





        dd("test checkout");

        // $url = "https://haloshop.vn/ps5/ea-sports-f1-23-ps5";
        // $crawler = \Goutte::request('GET', $url);
        // $content = $crawler->filter(".tab-content .expand-content.block-content")->html("");
        // return view("test", compact("content"));
        // $old = ProductIns::all();
        // DB::table('product_option')->truncate();
        // foreach ($old as $key => $value) {
        //     $new = Options::where("name", Insurance::where("id", $value->ins_id)->first()->name)->first();
        //     DB::table('product_option')->insert([
        //         'product_id' => $value->products_id,
        //         'option_id' => $new->id
        //     ]);
        // }


        // dd("done");

        // dd(1);
        $ordered = Orders::where('id', '=', 20)->first();
        $cart = unserialize($ordered->cart);
        // $data = [
        //     "ordered" => $ordered,
        //     "cart" => $cart,
        // ];
        // $html = '';
        // $html .= view("admin.orders.invoice", compact('ordered', 'cart'));
        $data = [
            "test" => "test",       "ordered" => $ordered,
            "cart" => $cart,
        ];


        return view("test.invoice4", $data);
        $pdf = Pdf::loadView('test.invoice4', $data);
        return $pdf->download('invoice4.pdf');

        return $pdf->download('test_invoice2.pdf');


        return view("test.invoice", compact('ordered', 'cart'));
        // $value = Products::where('id', 108)->first();
        // $fileinfo = pathinfo($value->bg);
        // $meta['file_name'] = $fileinfo['basename'];
        // $meta['mime_type'] = $fileinfo['extension'];
        // $meta['name'] = $fileinfo['filename'];
        // $main_img = Storage::disk("public")->path($value->bg);;
        // $create_m['path'] =  Storage::disk('media')->putFileAs("products", $main_img,  $meta['file_name']);
        // $create_m['collection'] = "Background Product";
        // $create_m['model'] = "Products";
        // $create_m = array_merge($create_m, $meta);
        // $createdm =  AMedia::create($create_m);
        // $update1 = Products::where("id", $value->id)->update(['image_background' => $createdm->id]);
        // if ($update1) {
        //     Storage::disk("storage")->delete($value->bg);
        // }
        // dd("ok");
        // dd($rprd->getAll()['data']);

        // foreach ($users as  $value) {
        // if ($value->avatar) {
        //     $fileinfo = pathinfo($value->avatar);
        //     $meta['file_name'] = $fileinfo['basename'];
        //     $meta['mime_type'] = $fileinfo['extension'];
        //     $meta['name'] = $fileinfo['filename'];
        //     $main_img = Storage::disk("storage")->path($value->avatar);;
        //     $save = Storage::disk('public')->putFileAs("avatar", $main_img,  $meta['file_name']);
        //     $update1 = User::where("id", $value->id)->update(['avatar' => $save]);
        //     if ($update1) {
        //         Storage::disk("storage")->delete($value->avatar);
        //     }
        // }
        // if ($value->icon) {
        //     $ficon = pathinfo($value->icon);
        //     $micon['file_name'] = $ficon['basename'];
        //     $micon['mime_type'] = $ficon['extension'];
        //     $micon['name'] = $ficon['filename'];
        //     $icon = Storage::disk("storage")->path($value->icon);
        //     $save2 = Storage::disk('public')->putFileAs("category/icon", $icon,  $micon['file_name']);
        //     $update2 = Category::where("id", $value->id)->update(['icon' => $save2]);
        //     if ($update2) {
        //         Storage::disk("storage")->delete($value->icon);
        //     }
        // }
        // }

        return view("test");
    }
    // ANCHOR test  //////////////////////////////////////////////////////
    public function testCheckout(Request $request)
    {
        $ordered = Orders::first();
        $vnp_TmnCode = "UIDKD8XU"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "HPWLEEORSLGSPTPWABBBLLIKOYUNGCBS"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route("test.return");

        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_TxnRef = $ordered->code; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $ordered->total; // Số tiền thanh toán
        $vnp_Locale = "vn"; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = ""; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location: ' . $vnp_Url);
        die();
    }
    //////////////////////////////////////////////////////
    public function tTruncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('a_media')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        dd("1");
    }
    public function upload(Request $request)
    {

        $products =   Products::with(['gll'])->get();
        foreach ($products as  $product) {
            foreach ($product->gll as  $value) {
                if ($value->image_700) {
                    $fileinfo = pathinfo($value->image_700);
                    $meta['file_name'] = $fileinfo['basename'];
                    $meta['mime_type'] = $fileinfo['extension'];
                    $meta['name'] = $fileinfo['filename'];
                    $meta['alt'] = $meta['name'];
                    $meta['size'] = Storage::disk("storage")->size($value->image_700);
                    $main_img = Storage::disk("storage")->path($value->image_700);
                    $create_m['path'] =  Storage::disk('media')->putFileAs("products", $main_img,  $meta['file_name']);
                    $create_m['collection'] = "Gallery Product 700x700";
                    $create_m['model'] = "Products";
                    $create_m = array_merge($create_m, $meta);
                    $createdm =  AMedia::create($create_m);
                    gllProducts::where('id', $value->id)->update([
                        "media_700" => $createdm->id,
                    ]);
                }

                if ($value->image_80) {
                    $fileinfosub = pathinfo($value->image_80);
                    $meta_sub['file_name'] = $fileinfosub['basename'];
                    $meta_sub['mime_type'] = $fileinfosub['extension'];
                    $meta_sub['name'] = $fileinfosub['filename'];
                    $meta_sub['alt'] = $meta_sub['name'];
                    $meta_sub['size'] = Storage::disk("storage")->size($value->image_80);
                    $sub_img = Storage::disk("storage")->path($value->image_80);
                    $create_s['path'] = Storage::disk('media')->putFileAs("products", $sub_img,  $meta_sub['file_name']);

                    $create_s['collection'] = "Gallery Product 80x80";

                    $create_s['model'] = "Products";

                    $create_s = array_merge($create_s, $meta_sub);

                    $createds = AMedia::create($create_s);
                    gllProducts::where('id', $value->id)->update([
                        "media_80" => $createds->id,
                    ]);
                }
            }
            unset($fileinfo, $fileinfosub, $meta, $meta_sub, $create_m, $create_s, $main_img, $sub_img);
            $fileinfo = pathinfo($product->main_img);
            $fileinfosub = pathinfo($product->sub_img);
            $meta['file_name'] = $fileinfo['basename'];
            $meta['mime_type'] = $fileinfo['extension'];
            $meta['name'] = $fileinfo['filename'];
            $meta['alt'] = $meta['name'];
            $meta_sub['file_name'] = $fileinfosub['basename'];
            $meta_sub['mime_type'] = $fileinfosub['extension'];
            $meta_sub['name'] = $fileinfosub['filename'];
            $meta_sub['alt'] = $meta_sub['name'];
            $main_img = Storage::disk("storage")->path($product->main_img);
            $sub_img = Storage::disk("storage")->path($product->sub_img);
            $meta['size'] = Storage::disk("storage")->size($product->main_img);
            $meta_sub['size'] = Storage::disk("storage")->size($product->sub_img);
            $create_m['path'] =  Storage::disk('media')->putFileAs("products", $main_img,  $meta['file_name']);
            $create_s['path'] = Storage::disk('media')->putFileAs("products", $sub_img,  $meta_sub['file_name']);
            $create_m['collection'] = "Image Product Main";
            $create_s['collection'] = "Image Product Sub";
            $create_m['model'] = "Products";
            $create_s['model'] = "Products";
            $create_m = array_merge($create_m, $meta);
            $create_s = array_merge($create_s, $meta_sub);
            $createdm =  AMedia::create($create_m);
            $createds = AMedia::create($create_s);
            Products::where('id', $product->id)->update([
                "image_first" => $createdm->id,
                "image_second" => $createds->id
            ]);
        }
        dd("moved");
    }
    public function category()
    {
        // $categories = Category::select("id", "img", "icon")->get();
        // foreach ($categories as  $value) {
        //     if ($value->img) {
        //         $fileinfo = pathinfo($value->img);
        //         $meta['file_name'] = $fileinfo['basename'];
        //         $meta['mime_type'] = $fileinfo['extension'];
        //         $meta['name'] = $fileinfo['filename'];
        //         $main_img = Storage::disk("storage")->path($value->img);
        //         $save = Storage::disk('public')->putFileAs("category/img", $main_img,  $meta['file_name']);
        //         $update1 = Category::where("id", $value->id)->update(['img' => $save]);
        //         if ($update1) {
        //             Storage::disk("storage")->delete($value->img);
        //         }
        //     }
        //     if ($value->icon) {
        //         $ficon = pathinfo($value->icon);
        //         $micon['file_name'] = $ficon['basename'];
        //         $micon['mime_type'] = $ficon['extension'];
        //         $micon['name'] = $ficon['filename'];
        //         $icon = Storage::disk("storage")->path($value->icon);
        //         $save2 = Storage::disk('public')->putFileAs("category/icon", $icon,  $micon['file_name']);
        //         $update2 = Category::where("id", $value->id)->update(['icon' => $save2]);
        //         if ($update2) {
        //             Storage::disk("storage")->delete($value->icon);
        //         }
        //     }
        // }
    }
    public function crawler_auto_products()
    {
        $url = "https://haloshop.vn/game-ps5";
        $crawler = \Goutte::request('GET', $url);
        $layout = $crawler->filter(".main-products-wrapper .product-thumb")->each(function ($node) {
            $arrayData = [];
            $urlDetail = $node->filter(".name a")->attr("href");
            $crlDetail = \Goutte::request("GET", $urlDetail);
            $arrayData['images_detail'] =  $crlDetail->filter('.product-image .swiper-slide img')->each(function ($node) {
                $array = [];
                array_push($array, $node->image()->getUri());
                return $array;
            });
            $arrayData['name'] = $crlDetail->filter('.page-title')->text("");
            $arrayData['producer'] = $crlDetail->filter('.product-manufacturer a')->text("");
            $arrayData['price'] = preg_replace('/\D/', '', $crlDetail->filter('.product-price')->text(0));
            $arrayData["price_new"] = preg_replace('/\D/', '', $crlDetail->filter('.product-price-new')->text(0));
            $arrayData["price_old"] = preg_replace('/\D/', '', $crlDetail->filter('.product-price-old')->text(0));
            $arrayData['meta'] = va_get_meta($urlDetail);
            $arrayData['spec'] = $crlDetail->filter('#tab-specification')->html("");
            $arrayData["content"] = $crlDetail->filter(".tab-content .block-content")->html("");
            $arrayData["model"] = $crlDetail->filter(".product-model span")->text("");
            $arrayData["images"] = $node->filter("img")->each(function ($image) {
                $array = [];
                array_push($array, $image->attr("data-src"));
                return $array;
            });
            return $arrayData;
        });
        dd($layout);
    }
    // ANCHOR get ips //////////////////////////////////////////////////////
    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return the server IP if the client IP is not found using this method.
    }
}
