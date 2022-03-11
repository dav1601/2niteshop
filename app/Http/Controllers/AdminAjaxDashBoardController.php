<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use App\Models\Statistics;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAjaxDashBoardController extends Controller
{
    //////////////////////////////////////

    public function todos(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $error = 0;
        $ok = 0;
        $update = 0;
        $load = 0;
        if ($request->action == "add") {
            $data_create['name'] = $request->name;
            $data_create['user_id'] = Auth::id();
            $data_create['time_add'] = $now;
            if ($request->unit == "h") {
                $data_create['time_end'] = $now->addHours($request->time);
            } elseif ($request->unit == "min") {
                $data_create['time_end'] = $now->addMinutes($request->time);
            } elseif ($request->unit == "month") {
                $data_create['time_end'] = $now->addMonths($request->time);
            }
            Todos::create($data_create);
            $ok = 1;
        }
        if ($request->action == "load") {
            $load = 1;
        }
        if ($request->action == "update") {
            Todos::where('id', '=', $request->id)->update(['done' => $request->done]);
            $update = 1;
        }
        $now1 = Carbon::now('Asia/Ho_Chi_Minh');
        $todo = new Todos;
        $count = Todos::count();
        $page = $request->page;
        $item_page = 6;
        $start = ($page - 1) * $item_page;
        $number_page = ceil($count / $item_page);
        $tasks = $todo->orderBy('id', 'DESC')->offset($start)->limit($item_page)->get();
        if ($todo->count() > 0) {
            foreach ($tasks as $task) {
                $output .= '
            <div class="task__item task-' . $task->id . '
            ';
                if ($task->done == 1) {
                    $output .= 'task__item--done  ';
                }
                if ($task->done == 0 && $task->time_end <= $now1) {
                    $output .= 'task__item--fail ';
                }
                $output .= '
            ">
    <div class="va-checkbox">
        <input type="checkbox" name="" id="tk-' . $task->id . '" class="task__item--check"
            data-id="' . $task->id . '"';
                if ($task->done == 1) {
                    $output .= ' checked  >
                <label for="tk-' . $task->id . '">' . $task->name . '
                    ';
                } else {
                    $output .= '  >
                <label for="tk-' . $task->id . '">' . $task->name . '
                    ';
                }
                if ($task->done == 1) {
                    $output .= '<span class="badge badge-success">Hoàn Thành</span>';
                } else {
                    if ($task->time_end > $now1) {
                        $output .= '<span class="badge badge-warning">Còn ' . timeDiff($now1, $task->time_end) . '</span>';
                    } else {
                        $output .= '<span class="badge badge-danger">Chưa Hoàn Thành</span>';
                    }
                }
                $output .= '
            </label>
        </div>
    </div>';
            }
            $pagination = navi_ajax_page($number_page, $page,  'pagination-sm', 'justify-content-end', 'mt-2');
        } else {
            $output  = "<span>Chưa Có Công Việc Nào!</span>";
        }
        $data['html'] = $output;
        $data['ok'] = $ok;
        $data['update'] = $update;
        $data['page'] = $pagination;
        $data['load'] = $load;
        return response()->json($data);
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
