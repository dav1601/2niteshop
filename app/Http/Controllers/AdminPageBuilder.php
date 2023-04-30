<?php

namespace App\Http\Controllers;

use App\Models\PageBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AdminPageBuilder extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'dashboard']);
            return $next($request);
        });
    }
    //    ///////////////////////////////////////
    public function index(Request $request)
    {
        $pages = PageBuilder::all();
        return view('admin.pagebuilder.index', compact('pages'));
    }
    //  //////////////////////////////////////// end index
    //    ///////////////////////////////////////
    public function create_or_edit($type = "create", Request $request)
    {
        $data_view = [
            "type" => $type,
        ];
        if ($type == "edit") {
            $data_view['page'] = PageBuilder::where('id', '=', $request->id)->firstOrFail();
        }

        return view('admin.pagebuilder.create', $data_view);
    }
    //  //////////////////////////////////////// end create
    //    ///////////////////////////////////////
    public function handle(Request $request)
    {
        $html_section = "";
        $html_package = "";
        $html_preview = "";
        $html_create = "";
        $type = $request->type;
        $error_create = false;
        $data_create = [];
        $redirect = null;
        switch ($type) {
            case 'add-section':
                $section = new Collection();
                $section->push((object)$request->section);
                $html_section .= view('components.admin.pagebuilder.section.item', ['section' => $section[0]]);
                break;
            case 'add-package':
                $package = $request->package;
                $html_package .= view('components.admin.pagebuilder.package', ['package' => $package]);
                break;
            case 'change-layout':
                $section = new Collection();
                $section->push((object)$request->section);
                $html_section .= view('components.admin.pagebuilder.column', ['section' => $section[0]]);
                break;
            case 'preview':
                $payload = $request->payload;
                handleStyle($payload, true);
                $html_preview .= view("components.admin.pagebuilder.preview", ['payload' => $payload]);
                break;
            case 'reset-create':
                $html_create .= view('components.admin.pagebuilder.create', ['type' => 'create']);
                break;
            case 'create-db-section':
                try {
                    $data_create['title'] = $request->title;
                    $data_create['slug'] = $request->slug;
                    $data_create['type'] = $request->typePage;
                    $data_create['data'] = json_encode($request->payload);
                    $page = PageBuilder::create($data_create);
                    $redirect = route('pgb.create.or.edit', ['type' => 'edit', 'id' => $page->id]);
                } catch (\Exception $e) {
                    $error_create = true;
                }
                break;
            case 'load-page':
                $sections = $request->payload;
                if ($sections && count($sections) > 0) {
                    foreach ($sections as  $section) {
                        $html_section .= view('components.admin.pagebuilder.section.item', ['section' => (object) $section]);
                    }
                }


                break;
            case 'save-db-section':
                try {
                    $data_create['title'] = $request->title;
                    $data_create['slug'] = $request->slug;
                    $data_create['type'] = $request->typePage;
                    $data_create['data'] = json_encode($request->payload);
                    $id = $request->id;
                    PageBuilder::where('id', $id)->update($data_create);
                } catch (\Exception $e) {
                    $error_create = true;
                }
                break;
            default:
                # code...
                break;
        }
        $data['html_section'] = $html_section;
        $data['html_package'] = $html_package;
        $data['html_preview'] = $html_preview;
        $data['html_create'] = $html_create;
        $data['error_create'] = $error_create;
        $data['redirect'] = $redirect;
        return response()->json($data);
    }
    //  //////////////////////////////////////// end handle
    //    ///////////////////////////////////////
    public function render_package(Request $request)
    {
        $t = $request->type;
        $html = "";
        $data = $request->has('data') ? $request->data : null;
        // return $data;
        $html .= view('components.admin.modal.pagebuilder.package', ['type' => $t, 'data' => $data]);
        return response()->json(['html' => $html]);
    }
    //  //////////////////////////////////////// end build_package
    //    ///////////////////////////////////////
    public function render_package_component(Request $request)
    {
        $t = $request->type;
        $payload = $request->payload;
        $html = "";
        switch ($t) {
            case 'category':
                $class = "my-4";
                $name = "";
                $id = "pgb-tab-category-" . $payload['id'];
                $selected = $request->has("value") ? $request->get("value") : 0;
                $html .= view('components.admin.form.select.category', compact('class', 'name', 'id', 'selected'));
                break;
            case 'products':
                $title = "Danh sách sản phẩm";
                $text = "Chọn sản phẩm";
                $id = "pgb-tab-products-" . $payload['id'];
                $onlymodel = "Products";
                $name = "";
                $selected = $request->has("value") ? $request->get("value") : "";
                $html .= view('components.admin.relation.rela', compact('title', 'id', 'text', 'name', 'selected', 'onlymodel'));
                break;
            case 'add-tab':
                $index = $request->index;
                $html .= view('components.admin.pagebuilder.edit.component.tab', compact('index', 'payload'));
                break;
            case 'load-banners-items':
                $items = $request->has('items') ? $request->get('items') : [];
                $pid = $request->pid;
                if (count($items) > 0) {
                    foreach ($items as $index => $item) {
                        $html .= view('components.admin.pagebuilder.edit.component.banners.item', compact('index', 'item', 'pid'));
                    }
                }
                break;
            case 'load-crsimages-items':
                $items = $request->has('items') ? $request->get('items') : [];
                $pid = $request->pid;
                if (count($items) > 0) {
                    foreach ($items as $index => $item) {
                        $html .= view('components.admin.pagebuilder.edit.component.crsimages.item', compact('index', 'item', 'pid'));
                    }
                }

                break;
            case 'load-gllYt-items':
                $items = $request->has('items') ? $request->get('items') : [];
                $pid = $request->pid;
                if (count($items) > 0) {
                    foreach ($items as $index => $payload) {
                        $html .= view('components.admin.pagebuilder.edit.component.gllyt.item', compact('index', 'payload', 'pid'));
                    }
                }
                break;
            case "load-tabs":
                $items = $request->items ?? [];
                if (count($items) > 0) {
                    foreach ($items as $index => $payload) {
                        $html .= view('components.admin.pagebuilder.edit.component.tab', compact('index', 'payload'));
                    }
                }
                break;
            default:
                # code...
                break;
        }
        $res['html'] = $html;
        return response()->json($res);
    }
    //  //////////////////////////////////////// end build_package
}
