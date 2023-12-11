@php
    $pages = App\Models\Pages::where('id', '!=', 7)
        ->orderBy('id', 'ASC')
        ->get();
@endphp
<div id="b1ad__footer">
    <div class="container" id="b1ad__footer--content">
        <div class="row mx-0">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 grid-1 pl-0">
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h3>Giới thiệu</h3>
                    </div>
                    <div class="box__ft--cont">
                        {!! getVal('introduce')->value !!}
                    </div>
                </div>
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h3>Mua hàng, góp ý</h3>
                    </div>
                    <div class="box__ft--cont">
                        <ul>
                            <li>
                                <span>- Email: {!! getVal('email')->value !!}</span>
                            </li>
                            <li>
                                <span>- Tổng đài: <a
                                        href="tel:{{ str_replace(' ', '', getVal('switchboard')->value) }}">{!! getVal('switchboard')->value !!}</a>
                                    (1000đ/phút)</span>
                            </li>
                            <li>
                                <span>- Hotline: <a
                                        href="tel:{{ str_replace('.', '', getVal('hotline')->value) }}">{!! getVal('hotline')->value !!}</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 grid-2">
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h3>Địa chỉ</h3>
                    </div>
                    <div class="box__ft--cont">
                        {!! getVal('address')->value !!}
                    </div>
                </div>
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h3>Thời gian làm việc</h3>
                    </div>
                    <div class="box__ft--cont">
                        {!! getVal('working_time')->value !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 grid-3">
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h1>THEO dõi 2NITE</h1>
                    </div>
                    <div class="box__ft--cont">
                        <div class="my__box">
                            <a href="" class="d-block my__box--fb">
                                <img src="{{ $file->ver_img_local('client/images/facebook.png') }}" alt="icon facebook">
                                <span>2NITE SHOP</span>
                            </a>
                        </div>
                        <div class="my__box">
                            <a href="" class="d-block my__box--git">
                                <img src="{{ $file->ver_img_local('client/images/github-2.png') }}" alt="icon github">
                                <span>dav1601</span>
                            </a>
                        </div>
                        <div class="my__box">
                            <a href="" class="d-block my__box--vscode">
                                <img src="{{ $file->ver_img_local('client/images/code.png') }}" alt="icon code">
                                <span>My Extention</span>
                            </a>
                        </div>
                        <div class="my__box">
                            <a href="" class="d-block my__box--youtube">
                                <img src="{{ $file->ver_img_local('client/images/youtube.png') }}" alt="icon youtube">
                                <span>Channel Demo</span>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 grid-4 pr-0">
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h2>Thông tin</h2>
                    </div>
                    <div class="box__ft--cont">
                        <ul>
                            @foreach ($pages as $page)
                                <li>
                                    <a target="_blank" href="{{ route('detail_page', ['slug' => $page->slug]) }}">
                                        {{ $page->title }}
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <a target="_blank" href="https://vieclam.haloshop.vn">
                                    Tuyển Dụng
                                </a>
                            </li>
                            <li class="tax-info">
                                <img src="{{ $file->ver_img_local('client/images/tax.png') }}" width="220px"
                                    height="85px" alt="img tax">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
