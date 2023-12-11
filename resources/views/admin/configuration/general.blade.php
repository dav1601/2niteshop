@extends('admin.layout.app')
{{-- ----------- --}}
@section('name')
    Cấu hình chung
@endsection
{{-- ----------- --}}
@section('import_css')
@endsection
{{-- ----------- --}}
@section('import_js')
    <script src="{{ $file->ver('admin/app/js/configuration.js') }}"></script>
@endsection
{{-- ----------- --}}
@section('content')
    <div id="configuration_general">
        {!! Form::open([
            'url' => route('conf.general-actions', ['action' => 'update']),
            'method' => 'POST',
            'id' => 'formCfgGeneral',
        ]) !!}
        <x-admin.layout.card class="col-12 mb-5">
            <x-slot name="heading" class="">
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <span>cấu hình chung</span>
                    <div class="actions">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_createConf">Thêm<i
                                class="fa-solid fa-plus pl-2"></i></button>
                        <button type="submit" class="btn btn-primary ml-2" id="cfg-general-update">Cập nhật<i
                                class="fa-solid fa-pen-to-square pl-2"></i></button>
                    </div>
                </div>
            </x-slot>
            <x-slot name="content" class="w-100">
                <ul class="nav nav-tabs dark-tab" id="configuration_tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="text-tab" data-toggle="tab" href="#text-tab-content" role="tab"
                            aria-controls="text-tab-content" aria-selected="true">Cấu hình text</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="html-tab" data-toggle="tab" href="#html-tab-content" role="tab"
                            aria-controls="html-tab-content" aria-selected="false">Cấu hình HTML</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="images-tab" data-toggle="tab" href="#images-tabs-content" role="tab"
                            aria-controls="images-tabs-content" aria-selected="false">Cấu hình images</a>
                    </li> --}}

                </ul>
                <div class="tab-content mt-4" id="configuration_tab_content">
                    <div class="tab-pane fade show active" id="text-tab-content" role="tabpanel" aria-labelledby="text-tab">
                        <div class="cfg-list-text">
                            @foreach ($configuration['text'] as $item)
                                <x-admin.configuration.item.text :config="$item" />
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="html-tab-content" role="tabpanel" aria-labelledby="html-tab">
                        <div class="cfg-list-html">
                            @foreach ($configuration['html'] as $item)
                                <x-admin.configuration.item.html :config="$item" />
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="images-tabs-content" role="tabpanel" aria-labelledby="images-tab">images
                    </div> --}}

                </div>

            </x-slot>
        </x-admin.layout.card>
        {!! Form::close() !!}
        {{--  --}}

    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="m_createConf" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                {!! Form::open([
                    'url' => route('conf.general-actions', ['action' => 'create']),
                    'method' => 'POST',
                    'id' => 'formCreateConf',
                ]) !!}
                <div class="modal-header">
                    <h5 class="modal-title"> Thêm Config </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <x-admin.layout.input.text required label="name" value="" name="name" />
                    </div>
                    <div class="form-group">
                        <x-admin.layout.form.label text="Value" required />
                        <select class="form-control" name="type" id="type_conf">
                            <option value="">Select Type</option>
                            <option value="text">Text</option>
                            <option value="html">Html</option>
                        </select>
                        <div id="value_conf" class="mt-4">
                            {{-- <label class="a-form-label">
                                <span>html</span></label>
                            <textarea name="value" id="tiny_cfg_html" class="cfg-html"></textarea> --}}
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submitFormCreateConf" class="btn btn-primary">Save</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
