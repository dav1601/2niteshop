<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (session('crawler'))
        @dd(Session::get('crawler'))
    @endif
    {!! Form::open(['url' => route('crawler'), 'method' => 'post']) !!}
    <div class="form-group d-flex mb-5">
        <input type="text" class="form-control" required name="url" value=""
            placeholder="Nhập Url để tự động crawl dữ liệu">
        <input type="submit" value="Crawl Data" class="btn navi_btn mb-5 ml-2">
    </div>

    {!! Form::close() !!}

</body>

</html>
