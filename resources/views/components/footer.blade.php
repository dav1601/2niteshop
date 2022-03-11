@php
$pages = App\Models\Pages::where('id' , '!=' , 7)->orderBy('id' , 'ASC')->get();
@endphp
<div id="b1ad__footer">
    <div class="container" id="b1ad__footer--content">
        <div class="row mx-0">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 pl-0 grid-1">
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h1>Giới thiệu</h1>
                    </div>
                    <div class="box__ft--cont">
                        {!! getVal("introduce")->value !!}
                    </div>
                </div>
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h2>Mua hàng, góp ý</h2>
                    </div>
                    <div class="box__ft--cont">
                        <ul>
                            <li>
                                <span>- Email: {!! getVal("email")->value !!}</span>
                            </li>
                            <li>
                                <span>- Tổng đài: <a
                                        href="tel:{{ str_replace(' ', '', getVal('switchboard')->value)}}">{!!
                                        getVal('switchboard')->value !!}</a> (1000đ/phút)</span>
                            </li>
                            <li>
                                <span>- Hotline: <a href="tel:{{ str_replace('.', '', getVal('hotline')->value)}}">{!!
                                        getVal("hotline")->value !!}</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3  grid-2">
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h1>Địa chỉ</h1>
                    </div>
                    <div class="box__ft--cont">
                        {!! getVal("address")->value !!}
                    </div>
                </div>
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h1>Thời gian làm việc</h1>
                    </div>
                    <div class="box__ft--cont">
                        <div class="box__chill">
                            <div class="box__chill-header">
                                <h3>Hệ thống cửa hàng:</h3>
                            </div>
                            <div class="box__chill-content">
                                {!! getVal("working_time")->value !!}
                            </div>
                        </div>
                        <div class="box__chill">
                            <div class="box__chill-header">
                                <h3>Bảo hành sửa chữa:</h3>
                            </div>
                            <div class="box__chill-content">
                                {!! getVal("fix_time")->value !!}
                            </div>
                        </div>
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
                                <img src="{{ $file->ver_img('client/images/facebook.png') }}" alt="">
                                <span>2NITE</span>
                            </a>
                        </div>
                        {{-- <div class="my__box">
                            <a href="https://vachill.com/" class="d-block my__box--web">
                                <img src="{{ $file->ver_img('client/images/web.png') }}" alt="">
                                <span>My website 2</span>
                            </a>
                        </div> --}}
                        <div class="my__box">
                            <a href="" class="d-block my__box--git">
                                <img src="{{ $file->ver_img('client/images/github-2.png') }}" alt="">
                                <span>2NITE</span>
                            </a>
                        </div>
                        <div class="my__box">
                            <a href="" class="d-block my__box--vscode">
                                <img src="{{ $file->ver_img('client/images/code.png') }}" alt="">
                                <span>My Extention</span>
                            </a>
                        </div>
                        <div class="my__box">
                            <a href="" class="d-block my__box--youtube">
                                <img src="{{ $file->ver_img('client/images/youtube.png') }}" alt="">
                                <span>My Channel</span>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 pr-0 grid-4">
                <div class="box__ft">
                    <div class="box__ft--header">
                        <h2>Thông tin</h2>
                    </div>
                    <div class="box__ft--cont">
                        <ul>
                            @foreach ($pages as $page )
                            <li>
                                <a target="_blank" href="{{ route('detail_page' , ['slug'=>$page->slug]) }}">
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
                                <img src="{{ $file->ver_img('client/images/tax.png') }}" width="220px" height="85px" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
