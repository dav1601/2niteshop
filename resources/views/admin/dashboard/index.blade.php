@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@endsection
@section('import_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"
        integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/gcal.min.js"
        integrity="sha512-X22wrzog4NcL9NM97PKUVhWH4K6MSp9f6iIYHtXkKVwEXZ8GqkWOkLWdBeStyPuuKRkNzkkGVr5v++qMoYM5Fg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ $file->ver('admin/app/plugin/chart/canvasjs.min.js') }}"></script>
    <script src="{{ $file->ver('admin/app/js/chart.js') }}"></script>
    <script>
        var todos = {{ Js::from($tasks->data) }};
    </script>
    <script src="{{ $file->ver('admin/app/js/dashboard.js') }}"></script>
@endsection
@section('name')
    Dashboard
@endsection

@section('content')
    <div id="content__dashboard">
        <div class="row mx-0">
            <div class="stat col-12 row no-gutters">
                <x-admin.dashboard.card.statics header="Users" icon="fa-users" :content="crf_2($stats_users) . ' Users'" />
                <x-admin.dashboard.card.statics header="Đơn Hàng" icon="fa-receipt" :content="crf_2($stats_order) . ' Đơn'" />
                <x-admin.dashboard.card.statics header="Số Lượng Sản Phẩm" icon="fa-boxes" :content="crf_2($stats_product) . ' sản phẩm'" />
                <x-admin.dashboard.card.statics header="Số Lượng Bài Viết" icon="fa-boxes" :content="crf_2($stats_blog) . ' bài'" />
                @can('Statistics')
                    <x-admin.dashboard.card.statics header="Doanh Thu Hôm Nay" icon="fa-dollar-sign" :content="crf($stats_revenueToday)" />
                    <x-admin.dashboard.card.statics header="Doanh Thu Tháng Này" icon="fa-dollar-sign" :content="crf($stats_revenueMonth)" />
                    <x-admin.dashboard.card.statics header="Lợi Nhuận Hôm Nay" icon="fa-dollar-sign" :content="crf($stats_proFToday)" />
                @endcan

            </div>
            {{-- Chartttttttttttttttttttttttt --}}
            <div id="chart" class="col-12 my-4">
                <div class="w-100">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
            {{-- ---------------End Chart----------- --}}

            <div class="col-12 mt-4">
                <x-admin.layout.card class="mb-4">
                    <x-slot name="heading" class="text-center">
                        <h2>Sản phẩm mới</h2>
                    </x-slot>
                    <x-slot name="content">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Tên</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Nhà sản xuất</th>
                                    <th scope="col">Danh Mục</th>
                                    <th scope="col">Tác Giả</th>
                                    <th scope="col">Thời Gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products->data as $product)
                                    <tr>

                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img src="{{ urlImg($product->path_first, 'media') }}" width="150px"
                                                height="150px" class="va-radius-fb" alt="">
                                        </td>
                                        <td>{{ crf($product->price) }}</td>
                                        <td>
                                            {{ $product->producer->name }}
                                        </td>
                                        <td style="width:300px;">
                                            {!! badges(collect($product->categories)->toArray(), 'name') !!}
                                        </td>
                                        <td>
                                            {{ $product->author }}
                                        </td>
                                        <td>
                                            {{ $carbon->create($product->created_at)->diffForHumans($carbon->now()) }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </x-slot>
                    <x-slot name="footer" class="text-center">
                        <a href="#" class="btn btn-primary">Xem tất cả sản phẩm</a>
                    </x-slot>
                </x-admin.layout.card>
            </div>

            {{-- ----------------- --}}
            <div class="col-6 mt-4">

                <x-admin.layout.card class="dsh-users">
                    <x-slot name="heading" class="text-center">
                        <h2>Thành Viên Mới</h2>
                    </x-slot>
                    <x-slot name="content">
                        <div class="row card__users mx-0">
                            @foreach ($users->data as $user)
                                <div class="card__users--item col-3 mb-3 text-center">
                                    <img src="{{ $daviUser->getAvatarUser($user->id) }}" width="112" height="112"
                                        class="va-rounded" alt="">
                                    <a>{{ $user->name }}</a>
                                    <span>
                                        @if ($carbon->create($user->created_at)->isToday())
                                            Hôm Nay
                                        @elseif ($carbon->create($user->created_at)->isYesterday())
                                            Hôm Qua
                                        @else
                                            {{ $carbon->create($user->created_at)->day }}
                                            {{ $carbon->create($user->created_at)->format('M') }}
                                        @endif
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </x-slot>
                    <x-slot name="footer" class="text-center">
                        <a href="#" class="btn btn-primary">Xem tất cả thành viên</a>
                    </x-slot>
                </x-admin.layout.card>
            </div>
            {{-- ------------------------- --}}
            <div class="col-6 mt-4">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Danh sách công việc</h2>

                        </div>
                        <div class="card-body" id="my_tasks">

                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add__task"><i
                                        class="fas fa-plus pr-2"></i>Thêm Task</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END USERSSSSSSSSSSSSSSSSSSSSSSS --}}
            <div class="col-6 mt-4">
                <x-admin.layout.card class="dsh-blogs">
                    <x-slot name="heading" class="text-center">
                        <h2>Bài viết mới</h2>
                    </x-slot>
                    <x-slot name="content">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Tiêu Đề</th>
                                    <th scope="col">Tác Giả</th>
                                    <th scope="col">Thời Gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs->data as $blog)
                                    <tr>

                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->author }}</td>
                                        <td>{{ $carbon->create($blog->created_at)->diffForHumans($carbon->now()) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </x-slot>
                    <x-slot name="footer" class="text-center">
                        <a href="#" class="btn btn-primary">Xem tất cả bài viết</a>
                    </x-slot>
                </x-admin.layout.card>
            </div>
            {{-- END BLOGSSSSSSSSSSSSSSSS --}}

            {{-- END PRODUCTSSSSSSSSSSSSSSSS --}}

            {{-- END TODOLIST --}}
            <div class="col-6 mt-4">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Lịch Làm Việc</h2>
                        </div>
                        <div class="card-body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END FULLCANALED --}}
            {{-- END WRAPPER DASHBOAD --}}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add__task" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="add__taskLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add__taskLabel">Thêm Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="task-content" class="mb-3">Nội Dung Công Việc</label>
                        <input type="text" value="" class="form-control" name="" id="task-content"
                            placeholder="Làm page builder">
                    </div>
                    <div class="form-group mb-4">
                        <label for="task-datetime" class="mb-3">Date Time Complete Task</label>
                        <input type="text" value="" class="form-control" name="" id="task-datetime"
                            placeholder="2023/05/14 11:11">
                    </div>

                    <div class="form-group">
                        <button id="add-task" class="btn btn-primary w-100 text-center">Thêm Task</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
