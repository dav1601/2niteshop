<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Banners;
use App\Models\Slides;
use App\Repositories\FileInterface;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminBannerController extends Controller
{
    public $file;
    public function __construct(FileInterface $file)
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'banner']);
            return $next($request);
        });
        $this->file = $file;
    }
    ////////////////////////////////////////

    public function banner_view_add(Request $request)
    {
        Carbon::setLocale('vi');
        $carbon = new Carbon;
        $banners = Banners::all();
        return view('admin.slides_banners.banners.index', compact('banners', 'carbon'));
    }

    ////////////////////////////////////////
    public function banner_view_edit($id, Request $request)
    {
        $banner = Banners::where('id', '=', $id)->first();
        return view('admin.slides_banners.banners.edit', compact('banner'));
    }
    ////////////////////////////////////////

    public function banner_handle_add(Request $request, FileInterface $file)
    {
        $data = array();
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'link' => 'required',
                'position' => 'required',
                'index' => 'required',
                'img' => 'required|image|mimes:jpeg,png,jpg,tiff,svg|max:500',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if (Banners::where('index', '=', $request->index)->where('position', '=', $request->position)->first()) {
                return redirect()->back()->with('index', '1');
            } else {
                $data['name'] = $request->name;
                $data['link'] = $request->link;
                $data['index'] = $request->index;
                $data['position'] = $request->position;
                $path_img = "admin/images/banners/";
                $data['img'] = $file->storeFileImg($request->img, $path_img);
                Banners::create($data);
                return redirect()->back()->with('ok', '1');
            }
        }
    }

    ////////////////////////////////////////
    public function banner_handle_edit($id, Request $request, FileInterface $file)
    {
        $data = array();
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'link' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $banner = Banners::where('id', '=', $id)->first();
            $data['name'] = $request->name;
            $data['link'] = $request->link;
            if ($request->has('img')) {
                if ($banner->img != NULL)
                    $file->deleteFile("" . $banner->img);
                $path_img = "admin/images/banners/";
                $data['img'] = $file->storeFileImg($request->img, $path_img);
            }
            Banners::where('id', '=', $id)->update($data);
            return redirect()->back()->with('ok', '1');
        }
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function slide_view_add(Request $request)
    {
        $slides = Slides::with('author')->get();
        return view('admin.slides_banners.slides.index', compact('slides'));
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function slide_handle_add(Request $request)
    {
        $data = array();
        $validator = $this->slide_validator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $path = "admin/images/slides/";

            $data['name'] = $request->name;
            $data['link'] = $request->link;
            $daa['users_id'] = Auth::id();
            $data['author_post'] = Auth::id();
            $save_main =  $this->file->storeFileImg($request->img, $path);
            $$data['img'] = $save_main;
            $created =  Slides::create($data);
            if ($created) {
                Slides::where('id', $created->id)->update(['index' => $created->id]);
            }
            return redirect()->back()->with('ok', '1');
        }
    }
    public function slide_validator($request, $id = null)
    {
        $name = $id ? "|unique:slides,name," . $id : "";
        $validator = Validator::make(
            $request,
            [
                'name' => 'required' . $name,
                'link' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:1000',
            ]

        );
        return $validator;
    }
    ////////////////////////////////////////
    public function slide_update(Request $request)
    {
        $validator = $this->slide_validator($request->all());
        if ($validator->fails()) {
            $data['error'] = $validator->errors()->first();
        } else {
            $slide = Slides::where('id',  $request->id)->first();
            $path = "admin/images/slides/";
            $data_update['name'] = $request->name;
            $data_update['link'] = $request->link;
            $data_update['users_id'] = Auth::id();
            $data_update['author_post'] = Auth::id();
            if ($request->img) {
                if ($slide->img) {
                    $this->file->deleteFile($slide->img);
                }
                $save_main =  $this->file->storeFileImg($request->img, $path);
                $data_update['img'] = $save_main;
            }
            $updated =  Slides::where('id', $request->id)->update($data_update);
            if (!$updated) {
                $data['error'] = "Updated fail";
            }
        }
        return response()->json($data);
    }
    //////////////////////////////////////
    //    ///////////////////////////////////////
    public function slide_modal_content(Request $request)
    {
        $id = $request->id;
        $html = "";
        $slide = Slides::where('id', $id)->first();
        $html .= view('components.admin.modal.slide.content', compact('slide'));
        $data['html'] = $html;
        return response()->json($data);
    }
    //  //////////////////////////////////////// end slide_modal_content
    // //////////////////////////////////

    public function handle_update(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $data['error'] = 0;
        if ($request->act == 1) {
            if ($request->stt == 1) {
                if (Slides::where('index', '=', $request->index)->where('status', '=', 1)->first()) {
                    $data['error'] = 1;
                } else {
                    Slides::where('id', '=', $request->id)->update([
                        'index' => $request->index,
                    ]);
                }
            } else {
                Slides::where('id', '=', $request->id)->update([
                    'index' => $request->index,
                ]);
            }
        }
        if ($request->act == 2) {
            if ($request->stt == 1) {
                if (Slides::where('index', '=', $request->index)->where('status', '=', 1)->first()) {
                    $data['error'] = 1;
                } else {
                    Slides::where('id', '=', $request->id)->update([
                        'status' => $request->stt,
                    ]);
                }
            } else {
                Slides::where('id', '=', $request->id)->update([
                    'status' => $request->stt,
                ]);
            }
        }
        $slides = Slides::all();
        Carbon::setLocale('vi');
        $carbon = new Carbon();
        foreach ($slides as $slide) {
            $output .= '
             <tr>
             <th scope="row">' . $slide->id . '</th>
             <td>' . $slide->name . '</td>
             <td>' . $slide->link . '</td>
             <td>
                 <img src="' . asset($slide->img) . '" width="200" class=" va-radius-fb " alt="">
             </td>
             <td>
                 <select class="custom-select" name="" id="slide__show--index"
                     data-id="' . $slide->id . '" data-stt="' . $slide->status . '">
                     <option value="' . $slide->index . '">' . $slide->index . '</option>
             ';
            foreach (config('navi.index_slides') as $index) {
                if ($index != $slide->index) {
                    $output .= '<option value="' . $index . '">' . $index . '</option>';
                }
            }
            $output .= '
            </select>
            </td>
            <td>
                <select class="custom-select" name="" id="slide__show--stt"
                    data-id="' . $slide->id . '" data-index=" ' . $slide->index . '">
                    <option value="' . $slide->status . '">' . slide_stt($slide->status) . '</option>
            ';
            foreach (config('navi.status_slides') as $stt) {
                if ($stt != $slide->status) {
                    $output .= '<option value="' . $stt . '">' . slide_stt($stt) . '</option>';
                }
            }
            $output .= '
            </select>
            </td>
            <td class="text-center">' . $slide->author_post . '</td>
            <td>' . $carbon->create($slide->created_at)->diffForHumans($carbon->now('Asia/Ho_Chi_Minh')) . '</td>
            <td class="text-center">
                <a href="' . route('slide_delete', ['id' => $slide->id]) . '" class="delete_slide">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
            ';
        }
        $data['html'] = $output;
        return response()->json($data);
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function ads_view_add(Request $request)
    {
        $ads = Ads::all();
        return view('admin.slides_banners.ads.add', compact('ads'));
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function ads_handle_add(Request $request, FileInterface $file)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'link' => 'required',
                'img' => 'required|image|mimes:jpeg,png,jpg,tiff,svg|max:500',
            ],

        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data['active'] = $request->active;
            $data['link'] = $request->link;
            $data['type'] = $request->type;
            $path = "admin/images/ads/";
            $data['img'] = $file->storeFileImg($request->img, $path);
            Ads::create($data);
            return redirect()->back()->with('ok', 1);
        }
    }
    //    ///////////////////////////////////////
    public function slide_handle(Request $request)
    {
        $act = $request->act;
        $ido = $request->ido;
        $ida = $request->ida;
        $indexo = $request->indexo;
        $indexa = $request->indexa;
        $id = $request->has('id') ? $request->id : 0;
        $status = $request->active;
        $html = '';
        $html_edit = '';
        $data['update_s'] = false;
        $data['update_slide']['errors'] = null;
        switch ($act) {
            case 'update_index':
                $arraySort = explode(",", $request->arrSort);
                foreach ($arraySort as $key => $idSlide) {
                    Slides::where('id', $idSlide)->update(['index' => $key]);
                }
                break;
            case 'update_stt':
                $last = Slides::where('status', '=', 1)->first();
                $index = $status == 1 ? (int) $last->index + 1 : NULL;
                Slides::where('id', $id)->update(['index' => $index, 'status' => $status]);
                break;
            case 'update_slide':
                $validator = $this->slide_validator($request->all());
                if ($validator->fails()) {
                    $data['update_slide']['errors'] = $validator->errors();
                } else {
                    $slide = Slides::where('id',  $id)->first();
                    $path = "admin/images/slides/";
                    $data_update['name'] = $request->name;
                    $data_update['link'] = $request->link;
                    if ($request->img) {
                        if ($slide->img) {
                            $this->file->deleteFile($slide->img);
                        }
                        $save_main =  $this->file->storeFileImg($request->img, $path);
                        $data_update['img'] = $save_main;
                    }
                    $updated =  Slides::where('id', $request->id)->update($data_update);
                    if ($updated) {
                        $data['update_s'] = true;
                    }
                }
                $slide = Slides::where('id', $id)->first();
                $html_edit .= view('components.admin.modal.slide.content', ['slide' => $slide]);
                $data['html_edit'] = $html_edit;
                break;
            default:
                break;
        }
        $slides = Slides::with("author")->get();
        $html .= view('components.admin.slides.show', compact('slides'));

        $data['html'] = $html;
        return response()->json($data);
    }
    //  //////////////////////////////////////// end name
    ////////////////////////////////////////
}
