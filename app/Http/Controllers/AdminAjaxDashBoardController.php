<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Todos;
use App\Models\Statistics;
use App\Models\SectionHome;
use App\Models\showHome;
use App\Repositories\ModelInterface;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Boolean;

class AdminAjaxDashBoardController extends Controller
{
    //////////////////////////////////////
    public $resCode;
    public $carbon;
    public function __construct()
    {
        $this->resCode = 200;
        $this->carbon = new Carbon("Asia/Ho_Chi_Minh");
    }

    public function todos(Request $request, ModelInterface $model)
    {

        $output = '';
        $page = $request->page ?? 1;
        $action = $request->action ?? "load";
        switch ($action) {
            case 'add-task':
                $content = $request->payload['content'];
                $time = $this->carbon->parse($request->payload['datetime'])->format("Y-m-d H:i:s");
                $created = Todos::create(['name' => $content, 'user_id' => Auth::id(), 'deadline' => $time]);
                if (!$created) {
                    $this->resCode = 500;
                }
                break;
            case 'task-done':
                $updated = Todos::where('id', (int) $request->id)->update(['done' => 1]);
                if (!$updated) {
                    $this->resCode = 500;
                }
                break;
            default:

                break;
        }
        $tasks = $model->pagination(User::find(Auth::id())->todos(), ['id', 'DESC'], $page, 6, null);
        $output .= view('components.admin.dashboard.todos', compact('tasks'));
        $data['html'] = $output;
        return response()->json($data, $this->resCode);
    }

    ////////////////////////////////////////
    //////////////////////////////////////

    public function price(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        if ($request->price != '') {
            $validator = Validator::make(
                $request->all(),
                [
                    'price' => 'numeric',
                ],
                [
                    'price.numeric' => "Bạn nhập không phải số",
                ]
            );
            if ($validator->fails()) {
                $ok = 0;
            } else {
                $ok = 1;
                $output = crf($request->price);
            }
        } else {
            $output = "0đ";
            $ok = 1;
        }
        $data['price'] = $output;
        $data['ok'] = $ok;
        return response()->json($data);
    }

    ////////////////////////////////////////
    //    ///////////////////////////////////////
    public function update__order(Request $request)
    {
        $order = $request->order;
        foreach ($order as $key => $id) {
            showHome::where('id', $id)->update(['position' => $key]);
        }
        return response()->json($order);
    }
    //  //////////////////////////////////////// end update__order
    ////////////////////////////////////////

    public function home__section(Request $request)
    {
        $data = [];
        $section = $request->has('section') ? $request->get('section') : [];
        $act = $request->act;
        $html = "";
        $id = $request->id;
        switch ($act) {
            case 'load':
                $section = SectionHome::select(['category_id', 'section'])->where('show_id', $id)->get();
                $section = collect($section)->groupBy("section")->toArray();
                break;

            default:
                break;
        }
        if (count($section) > 0 && $act != "load") {
            $show = true;
            foreach ($section as $key => $item) {
                $show = $item['show'] == "true";
                $selected = array_key_exists("selected", $item) ? $item['selected'] : [];
                $html .= view('components.admin.section.home', ['index' => $key, 'selected' => $selected, 'showid' => $id, 'show' => $show, 'idSection' => $item['id']]);
                unset($item);
            }
        }
        $data['sections'] = $section;
        $data['html'] = $html;
        return response()->json($data);
    }

    ////////////////////////////////////////

    //////////////////////////////////////

    public function load__chart(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $stats = Statistics::select("*")->selectRaw('total_day - total_cost AS profit')->where('month', '=', Carbon::now()->month)->where('year', '=', Carbon::now()->year)->orderBy('day', 'ASC')->get();
        $data['stats'] = $stats;
        $data['month'] = Carbon::now()->month;
        $data['year'] = Carbon::now()->year;
        return response()->json($data);
    }

    ////////////////////////////////////////

}
