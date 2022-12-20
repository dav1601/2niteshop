<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
use Illuminate\Support\Facades\File;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UploadFileFromLocalToCloudinary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:cloudinary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload File From Local To Cloudinary';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('start uploading to cloudinary');
        $a1 = Ads::all();
        $a2 = Banners::select(['img', 'id'])->get();
        $a3 = Blogs::select(['img', 'id'])->get();
        $a4 = Category::select(['img', 'icon', 'id'])->get();
        $a5 = Config::select(['value', 'id'])->where('type', 'LIKE', 'img')->get();
        $a6 = gllProducts::select(['link', 'id'])->get();
        $a7 = gllCat::select(['path', 'id'])->get();
        $a8 = Products::select(['banner', 'main_img', 'sub_img', 'id'])->get();
        $a9 =  showHome::select(['access_img', 'instruct_img', 'main_img', 'use_img', 'fix_img', 'id'])->get();
        $a10 = Slides::select(['img', 'id'])->get();
        $a11 = User::select(['avatar', 'id'])->whereNull('provider')->get();
        foreach ($a1 as $i1) {
            $u1 =  $this->handleFile($i1->img);
            Ads::where('id', $i1->id)->update(['img' => $u1]);
            unset($u1);
        }
        $this->info("success uploaded folder ads");
        foreach ($a2 as $i2) {
            $u2 = $this->handleFile($i2->img);
            Banners::where('id', $i2->id)->update(['img' => $u2]);
            unset($u2);
        }
        $this->info("success uploaded folder Banners");
        foreach ($a3 as $i3) {
            $u3 =  $this->handleFile($i3->img);
            Blogs::where('id', $i3->id)->update(['img' => $u3]);
            unset($u3);
        }
        $this->info("success uploaded folder blogs");
        foreach ($a4 as $i4) {
            $u4_1 =  $this->handleFile($i4->img);
            $u4_2 = $this->handleFile($i4->icon);
            Category::where('id', $i4->id)->update(['img' => $u4_1, 'icon' => $u4_2]);
        }
        $this->info("success uploaded folder category");
        foreach ($a5 as $i5) {
            $u5 =  $this->handleFile($i5->value);
            Config::where('id', $i5->id)->update(['value' => $u5]);
        }
        $this->info("success uploaded folder config");
        foreach ($a6 as $i6) {
            $u6 =   $this->handleFile($i6->link);
            gllProducts::where('id', $i6->id)->update(['link' => $u6]);
        }
        $this->info("success uploaded folder gllProducts");
        foreach ($a7 as $i7) {
            $u7 = $this->handleFile($i7->path);
            gllCat::where('id', $i7->id)->update(['path' => $u7]);
        }
        $this->info("success uploaded folder gllCat");
        foreach ($a8 as $i8) {
            $u8_1 =  $this->handleFile($i8->banner);
            $u8_2 =  $this->handleFile($i8->main_img);
            $u8_3 =  $this->handleFile($i8->sub_img);
            Products::where('id', $i8->id)->update([
                'banner' => $u8_1,
                'main_img' => $u8_2,
                'sub_img' => $u8_3
            ]);
        }
        $this->info("success uploaded folder products");
        foreach ($a9 as $i9) {
            $u9_1 =  $this->handleFile($i9->instruct_img);
            $u9_2 =  $this->handleFile($i9->main_img);
            $u9_3 = $this->handleFile($i9->use_img);
            $u9_4 = $this->handleFile($i9->fix_img);
            $u9_5 = $this->handleFile($i9->access_img);
            showHome::where('id', $i9->id)->update([
                'instruct_img' => $u9_1,
                'main_img' => $u9_2,
                'use_img' => $u9_3,
                'fix_img' => $u9_4,
                'access_img' => $u9_5
            ]);
        }
        $this->info("success uploaded folder show_home");
        foreach ($a10 as $i10) {
            $u_10 = $this->handleFile($i10->img);
            Slides::where('id', $i10->id)->update(['img' => $u_10]);
        }
        $this->info("success uploaded folder slides");
        foreach ($a11 as $i11) {
            $u_11 = $this->handleFile($i11->avatar);
            User::where('id', $i11->id)->update(['avatar' => $u_11]);
        }
        $this->info("success uploaded folder user");
        return Command::SUCCESS;
    }
    public function handleFile($path)
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
