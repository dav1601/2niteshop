<div class="col-12 sta__item mt-4 p-0">
    <div class="w-100">
        <div class="card">
            <div class="card-header text-center">
                Tạo Page
            </div>
            <div class="card-body create-page">

                <div class="row w-100">
                    <div class="col-6">

                        <div class="create-page-item">
                            <div class="form-group">
                                <label for="pgb-title" class="text-dark">Tiêu đề trang web</label>
                                <input type="email" class="form-control" id="pgb-title">

                            </div>
                            <div class="form-group">
                                <label for="pgb-slug" class="text-dark">Slug</label>
                                <input type="email" class="form-control" id="pgb-slug">
                            </div>
                            <div class="form-group">
                                <select class="custom-select text-dark">
                                    <option selected value="0">Chọn loại page</option>
                                    <option value="full">Full Page (Bao gồm menu footer slug...Là 1 trang web hoàn
                                        chỉnh)</option>
                                    <option value="template">Template (Thường được nhúng vào thân website)</option>
                                    <option value="component">Component (Các phần html nhỏ để nhúng vào website)
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="create-page-item">
                            <h4 class="text-dark font-weight-bold">All Classes</h4>
                            <div class="mt-2">
                                <span class="text-dark font-weight-bold">Xem danh sách classes Bootstrap 4: <a
                                        href="https://hackerthemes.com/bootstrap-cheatsheet" target="_blank"
                                        class="font-weight-bold">Bootstrap 4 Cheat Sheet</a></span>
                            </div>
                            <div class="mt-2">
                                <span class="text-dark font-weight-bold">Custom Class:
                                </span>
                                <div class="d-flex flex-wrap">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <span class="badge badge-pill badge-dark m-1" data-toggle="tooltip"
                                            data-placement="bottom"
                                            title="margin-bottom: {{ $i * 10 . 'px' }}">mb-{{ $i * 10 }}</span>
                                        <span class="badge badge-pill badge-dark m-1"data-toggle="tooltip"
                                            data-placement="top"
                                            title="margin-top: {{ $i * 10 . 'px' }}">mt-{{ $i * 10 }}</span>
                                        <span class="badge badge-pill badge-dark m-1"data-toggle="tooltip"
                                            data-placement="left"
                                            title="margin-left: {{ $i * 10 . 'px' }}">ml-{{ $i * 10 }}</span>
                                        <span class="badge badge-pill badge-dark m-1"data-toggle="tooltip"
                                            data-placement="right"
                                            title="margin-right: {{ $i * 10 . 'px' }}">mr-{{ $i * 10 }}</span>
                                    @endfor
                                    <span class="badge badge-pill badge-dark m-1"data-toggle="tooltip"
                                        data-placement="top" title="Title Red">title-red</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 sta__item mt-4" id="wp-sections-build">
    <div class="w-100">
        <div class="card">
            <div class="card-header">
                Build Section
            </div>
            <x-admin.pagebuilder.section />
            <div class="card-footer">
                <x-admin.pagebuilder.component.button.add class="pgb-add-section" t="add-section" />
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="pgb-section-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kim Đan My Luv</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url' => '#', 'method' => 'POST', 'id' => 'pgb-section-form', 'files' => true]) !!}
            <div class="modal-body mx-2" id="pgb-section-modal-output">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Xác Nhận</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
