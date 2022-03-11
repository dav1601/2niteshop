@extends('layouts.app')
@section('title' , $page->title)
@section('margin') dtl__margin option_page_detail @endsection
@section('content')
<div id="breadCrumb">
    <div class="container">
        <ol class="b__crumb">
            <li class="b__crumb--item">
                <i class="fas fa-home"></i>
            </li>
            <li class="b__crumb--item">
                <i class="fas fa-long-arrow-alt-right"></i>
            </li>
            <li class="b__crumb--item">
                {{ $page->title }}
            </li>
        </ol>
    </div>
</div>

<div id="page__detail">
    <div class="container  page__detail">
        <div id="page_content">
            {!! $page->content !!}
        </div>
    </div>

</div>

@endsection
