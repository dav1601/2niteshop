<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Slides;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'banner']);
            return $next($request);
        });
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

    public function banner_handle_add(Request $request)
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
            ],
            [
                'name.required' => "Không được để trống tên banner",
                'link.required' => "Không được để trống link banner",
                'position.required' => "Không được để trống vị trí banner",
                'index.required' => "Không được để trống thứ tự banner",
                'img.required' => "Không được để trống file ảnh",
                'img.image' => "File không phải là file ảnh",
                'img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'img.max' => "File ảnh không vượt quá 500kb",
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
                $main_img = $request->img;
                $n_main = $main_img->getClientOriginalName();
                if (file_exists("public/admin/images/banners/" . $n_main)) {
                    $filename = pathinfo($n_main, PATHINFO_FILENAME);
                    $ext = $main_img->getClientOriginalExtension();
                    $n_main = $filename . '(1)' . '.' . $ext;
                    $i = 1;
                    while (file_exists("public/admin/images/banners/" . $n_main)) {
                        $n_main = $filename . '(' . $i . ')' . '.' . $ext;
                        $i++;
                    }
                }
                $save_main = "admin/images/banners/" . $n_main;
                $main_img->move("public/admin/images/banners", $n_main);
                $data['img'] = $save_main;
                Banners::create($data);
                return redirect()->back()->with('ok', '1');
            }
        }
    }

    ////////////////////////////////////////
    public function banner_handle_edit($id, Request $request)
    {
        $data = array();
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'link' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
            ],
            [
                'name.required' => "Không được để trống tên banner",
                'link.required' => "Không được để trống link banner",
                'img.required' => "Không được để trống file ảnh",
                'img.image' => "File không phải là file ảnh",
                'img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'img.max' => "File ảnh không vượt quá 500kb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data['name'] = $request->name;
            $data['link'] = $request->link;
            if ($request->has('img')) {
                unlink("public/" . Banners::where('id', '=', $id)->first()->img);
                $main_img = $request->img;
                $n_main = $main_img->getClientOriginalName();
                if (file_exists("public/admin/images/banners/" . $n_main)) {
                    $filename = pathinfo($n_main, PATHINFO_FILENAME);
                    $ext = $main_img->getClientOriginalExtension();
                    $n_main = $filename . '(1)' . '.' . $ext;
                    $i = 1;
                    while (file_exists("public/admin/images/banners/" . $n_main)) {
                        $n_main = $filename . '(' . $i . ')' . '.' . $ext;
                        $i++;
                    }
                }
                $save_main = "admin/images/banners/" . $n_main;
                $main_img->move("public/admin/images/banners", $n_main);
                $data['img'] = $save_main;
            }
            Banners::where('id', '=', $id)->update($data);
            return redirect()->back()->with('ok', '1');
        }
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function slide_view_add(Request $request)
    {
        $slides = Slides::all();
        Carbon::setLocale('vi');
        $carbon = new Carbon;
        return view('admin.slides_banners.slides.index', compact('slides', 'carbon'));
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function slide_handle_add(Request $request)
    {
        $data = array();
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'link' => 'required',
                'index' => 'required',
                'img' => 'required|image|mimes:jpeg,png,jpg,tiff,svg|max:500',
            ],
            [
                'name.required' => "Bạn chưa nhập tên slide",
                'link.required' => "Bạn chưa nhập link slide",
                'index.required' => "Bạn chưa chọn vị trí slide",
                'img.required' => "Chưa có ảnh slide",
                'img.image' => "File không phải là file ảnh",
                'img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'img.max' => "File ảnh không vượt quá 500kb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if ($request->status == 1) {
                if (Slides::where('index', '=', $request->index)->where('status', '=', 1)->first()) {
                    return redirect()->back()->with('index', '1');
                } else {
                    $data['name'] = $request->name;
                    $data['link'] = $request->link;
                    $data['index'] = $request->index;
                    $data['status'] = $request->stt;
                    $data['author_post'] = Auth::user()->name;
                    $main_img = $request->img;
                    $n_main = $main_img->getClientOriginalName();
                    if (file_exists("public/admin/images/slides/" . $n_main)) {
                        $filename = pathinfo($n_main, PATHINFO_FILENAME);
                        $ext = $main_img->getClientOriginalExtension();
                        $n_main = $filename . '(1)' . '.' . $ext;
                        $i = 1;
                        while (file_exists("public/admin/images/slides/" . $n_main)) {
                            $n_main = $filename . '(' . $i . ')' . '.' . $ext;
                            $i++;
                        }
                    }
                    $save_main = "admin/images/slides/" . $n_main;
                    $main_img->move("public/admin/images/slides", $n_main);
                    $data['img'] = $save_main;
                }
                // ////////////
            } else {
                $data['name'] = $request->name;
                $data['link'] = $request->link;
                $data['index'] = $request->index;
                $data['status'] = $request->stt;
                $data['author_post'] = Auth::user()->name;
                $main_img = $request->img;
                $n_main = $main_img->getClientOriginalName();
                if (file_exists("public/admin/images/slides/" . $n_main)) {
                    $filename = pathinfo($n_main, PATHINFO_FILENAME);
                    $ext = $main_img->getClientOriginalExtension();
                    $n_main = $filename . '(1)' . '.' . $ext;
                    $i = 1;
                    while (file_exists("public/admin/images/slides/" . $n_main)) {
                        $n_main = $filename . '(' . $i . ')' . '.' . $ext;
                        $i++;
                    }
                }
                $save_main = "admin/images/slides/" . $n_main;
                $main_img->move("public/admin/images/slides", $n_main);
                $data['img'] = $save_main;
            }
            // ///
            Slides::create($data);
            return redirect()->back()->with('ok', '1');
        }
    }

    ////////////////////////////////////////
    //////////////////////////////////////

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
}
