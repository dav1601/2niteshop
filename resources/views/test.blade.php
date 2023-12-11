@extends('layouts.app')
@section('import_js')
    <link rel="stylesheet" href="{{ asset('test/test.css') }}">
    <style>
        .journal-custom-tab.journal-custom-tab-location {
            background-color: #ffe000 !important;
            color: #000;
        }


        @media only screen and (max-width: 760px) {
            footer .column {
                height: auto !important;
            }
        }

        #information-page,
        .blog-post .post-details {
            position: relative;
            margin-bottom: 20px;
        }


        #information-page ul li ul li,
        .blog-post .post-details ul li,
        #information-page ol li ol li,
        .blog-post .post-details ol li {
            margin: 0 !important;
            padding: 0px !important;
            text-indent: 0px !important;
            line-height: 25px !important;
        }

        #information-page ul ul,
        .blog-post .post-details ul {
            list-style-type: disc;
        }

        ul.share,
        ul.check,
        ul.check-square-o,
        ul.hand-o-right,
        ul.thumbs-o-up {
            list-style: none;
            padding-left: 10px;
        }

        #information-page ul.share li:before,
        ul.share li:before,
        .blog-post .post-details ul.share li:before {
            content: '\f064' !important;
            font-family: 'FontAwesome';
            margin-right: 5px !important;
        }

        #information-page ul.check li:before,
        ul.check li:before,
        .blog-post .post-details ul.check li:before {
            content: '\f00c' !important;
            font-family: 'FontAwesome';
            margin-right: 5px !important;
        }

        #information-page ul.check-square-o li:before,
        ul.check-square-o li:before,
        .blog-post .post-details ul.check-square-o li:before {
            content: '\f046' !important;
            font-family: 'FontAwesome';
            margin-right: 5px !important;
        }

        #information-page ul.thumbs-o-up li:before,
        ul.thumbs-o-up li:before,
        .blog-post .post-details ul.thumbs-o-up li:before {
            content: '\f087' !important;
            font-family: 'FontAwesome';
            margin-right: 5px !important;
        }

        #information-page ul.hand-o-right li:before,
        ul.hand-o-right li:before,
        .blog-post .post-details ul.hand-o-right li:before {
            content: '\f0a4' !important;
            font-family: 'FontAwesome';
            margin-right: 5px !important;
        }

        #information-page ul li,
        #information-page ol li,
        .blog-post .post-details ul li,
        .blog-post .post-details ol li,
        ul li ol li {
            margin: 10px 0px 0px 0px;
            padding: 0px;
            text-indent: 15px;
            text-align: justify;
        }

        #information-page h4,
        .blog-post .block-content h4,
        h4 {
            font-weight: bold;
            color: rgba(20, 102, 120, 1);
            font-size: 18px;
            text-transform: uppercase;
            margin: 15px 15px 5x 15px !important;
        }

        #information-page h3,
        .blog-post .post-details h3,
        h3 {
            text-align: center;
            text-transform: uppercase;
        }

        #information-page p,
        .blog-post .post-details p,
        p {
            text-align: justify;
            line-height: 25px !important;
            margin: 10px 0;
            padding: 0 15px;
        }

        #information-page img,
        .blog-post .post-details img,
        img {
            cursor: pointer;
        }

        #information-page div.image-caption,
        #information-page div.video-caption,
        .blog-post .post-details div.image-caption,
        .blog-post .post-details div.video-caption,
        div.image-caption,
        div.video-caption {
            display: block;
            text-align: center;
            padding: 5px 10px;
            width: 70%;
            margin: 0px auto 20px auto !important;
            background-color: #f5f5f5;
        }

        #information-page img,
        #information-page iframe,
        .blog-post .post-details img,
        .blog-post .post-details iframe,
        img iframe,
        iframe {
            display: block;
            margin: 15px auto !important;
        }

        .shadow {
            border: 1px solid #e5e5e5 !important;
            -webkit-box-shadow: 0 10px 6px -6px #777;
            -moz-box-shadow: 0 10px 6px -6px #777;
            box-shadow: 0 10px 6px -6px #777;
        }

        #information-page div.note,
        .blog-post .post-details div.note,
        div.note {
            border: 1px solid #777;

            -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;

            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;

            width: 90%;
            margin: 5px auto 30px auto;
            padding: 10px 20px;
        }

        #information-page div.note p,
        .blog-post .post-details div.note p,
        div.note p {
            margin: 0px !important;
        }

        #information-page div.note ul,
        .blog-post .post-details div.note ul,
        div.note ul {
            list-style-type: none;
        }

        .blog-post .post-details p>a {
            font-weight: 600;
        }

        #information-page div.note ul li:before,
        .blog-post .post-details div.note ul li:before,
        div.note ul li:before {
            content: '\f00c' !important;
            font-family: 'FontAwesome';
            margin-right: 5px;
        }

        #information-page .table,
        .table,
        .blog-post .post-details .table {
            width: 90% !important;
            margin: 20px auto;
            padding: 10px;
            border-bottom: 2px solid #b30000;
        }

        #information-page .table thead tr th,
        .table thead tr th,
        .blog-post .post-details .table thead tr th {
            color: #b30000;
            padding: 20px 10px;
        }

        #information-page .table tbody tr th,
        #information-page .table tbody tr td,
        .table tbody tr th .table tbody tr td,
        .blog-post .post-details .table tbody tr th,
        .blog-post .post-details .table tbody tr td {
            padding: 10px 5px;
        }

        #information-page .table tbody tr td.row-header,
        #information-page .table tbody.row-header tr td:first-child,
        .table tbody tr td.row-header .table tbody.row-header tr td:first-child,
        .blog-post .post-details .table tbody tr td.row-header,
        .blog-post .post-details .table tbody.row-header tr td:first-child {
            font-weight: bold;
            color: #666666;
            border-bottom: 1px solid #b30000 !important;
            border-top: 1px solid #b30000 !important;
            vertical-align: middle;
        }

        #information-page .table thead tr th:first-child,
        .table thead tr th:first-child,
        .blog-post .post-details .table thead tr th:first-child {
            border-left: 1px solid #b30000;
        }

        #information-page .table thead tr th:last-child,
        .table thead tr th:last-child,
        .blog-post .post-details .table thead tr th:last-child {
            border-right: 1px solid #b30000;
        }

        #information-page .table thead tr th,
        .table thead tr th,
        .blog-post .post-details .table thead tr th {
            background-color: #b30000;
            color: #fff;
            border-bottom: 2px solid #b30000;
            border-top: 2px solid #b30000;
            text-transform: uppercase;
        }

        #information-page .table tbody tr th,
        .table tbody tr th,
        .blog-post .post-details .table tbody tr th {
            background-color: #ccc;
            color: #b30000;
            border-top: 2px solid #b30000;
            border-bottom: 2px solid #b30000;
        }

        #information-page .table-striped tbody tr:nth-child(even),
        .table-striped tbody tr:nth-child(even),
        .blog-post .post-details .table-striped tbody tr:nth-child(even) {
            background-color: #e5e5e5;
        }

        #information-page .table-striped tbody tr td,
        .table-striped tbody tr td,
        .blog-post .post-details .table-striped tbody tr td {
            border-bottom: 1px solid #f2be01;
        }

        #information-page .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover td,
        .blog-post .post-details .table-hover tbody tr:hover td {
            background-color: #f2be01;
            color: #b30000;
        }

        #information-page .table-bordered tr td,
        .table-bordered tr td,
        .blog-post .post-details .table-bordered tr td {
            border-bottom: 1px solid #f2be01;
        }

        .tbl-info tr:nth-child(even) td {
            background-color: #e5e5e5;
        }

        .tbl-info {
            width: 90% !important;
            margin: 20px auto;
        }

        .tbl-info tr td,
        .tbl-info tr th {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .tbl-info tbody tr td {
            text-align: center;
        }

        .tbl-info tfoot tr td p,
        .tbl-info thead tr td p {
            text-indent: 20px;
        }

        .tbl-info thead tr th {
            background-color: #ffe000;
            color: #000;
            text-align: center;
        }

        .tbl-info.yellow thead tr th {
            background-color: #f2be01 !important;
        }

        .tbl-info tbody tr th {
            background-color: #f2be01;
            text-align: center;
        }

        .tbl-info.red thead tr th {
            background-color: #b30000 !important;
        }

        .tbl-info strong {
            font-weight: bold;
        }

        .morelink,
        .less,
        #attribute-toggle,
        #attribute-toggle-up {
            display: block;
            width: 100%;
            position: relative;
            margin: 20px auto 20px auto;
            border: 1px solid #ccc;
            text-align: center;
            padding: 10px 20px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;

            -webkit-box-shadow: 0 0 1px rgba(34, 25, 25, 0.4);
            -moz-box-shadow: 0 0 1px rgba(34, 25, 25, 0.4);
            box-shadow: 0 0 1px rgba(34, 25, 25, 0.4);
        }

        /* options */
        .product-info .right .options .option-link li {
            padding: 0;
        }

        .product-info .right .options .option-link li a {
            display: block;
        }

        .product-info .right .options .option-link li img {
            margin-right: 0;
            float: left;
            transition: all 0.2s;
            border: 2px solid #A9B8C0;
        }

        .product-info .right .options .option-link li img:hover {
            border-color: #3F5765;
        }

        .product-info .right .options .option-link li img.selected {
            border-color: #3F5765;
        }

        .product-info .right .options.push-select .option-image li span img.selected,
        .product-info .right .options.push-image .option-image li span img.selected,
        .product-info .right .options.push-checkbox .option-image li span img.selected,
        .product-info .right .options.push-radio .option-image li span img.selected {
            border-color: #3F5765;
        }

        /* attribute */
        .attribute-content {
            overflow: hidden;
            margin-bottom: 20px;
            position: relative;
            width: 100%;
        }

        .attribute-content h2 {
            border-bottom: 5px solid #3055a2 !important;
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
        }

        .attribute-content h2 span {
            background-color: #333745;
            color: #fff;
            padding: 10px;
            overflow: hidden;
        }

        .attribute-content .attribute-thumb img {
            width: 100%;
            height: 100%;
        }

        .attribute-top {
            margin-top: 50px;
        }

        .attribute-top,
        .attribute-top tr td,
        .attribute-top tr th {
            border: 0px !important;
            padding: 10px;
            font-size: 14px;
            text-align: left;
        }

        .attribute-top tbody th {
            color: #777 !important;
            width: 35% !important;
            text-indent: 10px;
        }

        .attribute-top td {
            text-align: left;
        }

        .attribute-top tbody tr td {
            border-bottom: 1px solid #A9B8C0 !important;
        }

        .attribute-top tbody tr th {
            border-bottom: 1px solid #ffe000 !important;
        }

        .attribute-top tbody tr:last-child td,
        .attribute-top tbody tr:last-child th {
            border-bottom: 0px !important;
        }


        #tab-specification .attribute,
        #tab-attribute .attribute tr td {
            border: 0px !important;
        }

        #tab-specification .attribute thead td {
            background: #ffe000 !important;
            color: #000 !important;
            font-weight: 500;
            font-size: 15px;
        }

        #tab-specification .attribute tbody td:first-child {
            background: #eeeeee !important;
            color: #777 !important;
            width: 25% !important;
        }

        #tab-specification .attribute tbody td {
            text-align: left;
        }

        #tab-specification .attribute tbody tr td {
            border-bottom: 1px solid #CCC !important;
        }

        .lwhw {
            text-align: center;
            margin: 10px 20px;
        }

        /* label */
        .label {
            display: inline-block;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: bold;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }

        .label[href]:hover,
        .label[href]:focus {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        .label:empty {
            display: none;
        }

        .label-default {
            background-color: #999999;
        }

        .label-default[href]:hover,
        .label-default[href]:focus {
            background-color: #808080;
        }

        .label-primary {
            background-color: #428bca;
        }

        .label-primary[href]:hover,
        .label-primary[href]:focus {
            background-color: #3071a9;
        }

        .label-success {
            background-color: #5cb85c;
        }

        .label-success[href]:hover,
        .label-success[href]:focus {
            background-color: #449d44;
        }

        .label-info {
            background-color: #5bc0de;
        }

        .label-info[href]:hover,
        .label-info[href]:focus {
            background-color: #31b0d5;
        }

        .label-warning {
            background-color: #f0ad4e;
        }

        .label-warning[href]:hover,
        .label-warning[href]:focus {
            background-color: #ec971f;
        }

        .label-danger {
            background-color: #d9534f;
        }

        .label-danger[href]:hover,
        .label-danger[href]:focus {
            background-color: #c9302c;
        }

        .product-info .image>span {
            display: none !important;
        }

        /*aftersales and promotion*/
        .aftersales-box .block-icon.block-icon-left {
            background-color: #ebce00;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50px;
        }

        .aftersales-box .block-icon.block-icon-left i {
            margin-right: 5px;
            color: rgb(255, 255, 255);
            font-size: 18px;
        }

        .aftersales-box .aftersales-content {
            margin-left: 50px;
        }

        .aftersales-box p span {
            color: rgb(51, 55, 69);
            background-color: rgb(244, 244, 244);
            line-height: 24px;
        }

        .promotion-box {
            margin-top: 1px;
            background-color: #89de2d !important;
            color: #fff;
        }

        .promotion-box h3 {
            border-bottom: 2px solid #EB5858;
            color: #fff !important;
            margin-bottom: 10px;
        }

        .promotion-box h3 i {
            font-size: 18px !important;
            padding: 5px;
        }

        .promotion-box .promotion-content p span:before {
            content: '\f046' !important;
            font-family: 'FontAwesome';
            margin-right: 5px !important;
        }

        /* Product name fix
        .product-list .product-grid-item .name{
            height:80px;
        }
        .product-details .name{
            width:100%;
        }
        .product-details .name a {
            white-space: normal !important;
            text-overflow: ellipsis;
            -o-text-overflow: ellipsis;
        }
         */
        /* Download */
        .product-download h3 {
            border-bottom: 1px solid #ccc;
        }

        .product-download ul {
            border-bottom: 1px solid #ccc;
            list-style-type: none;
            margin: 0px;
            padding: 10px 5px 10px 5px;
        }

        .product-download ul li {
            padding-bottom: 5px;
        }

        .download-page table thead tr {
            margin-bottom: 5px;
        }

        .download-page table thead tr td {
            background-color: #e5e5e5;
            padding-top: 10px;
            padding-bottom: 10px;
            font-weight: bold;
        }

        .download-page table tr td {
            padding-left: 10px;
        }

        /*video */
        .video-play {
            position: absolute;
            display: block;
            top: 35%;
            left: 35%;
            font-size: 48px !important;
        }

        /* custom */
        a[href="/tuyen-dung.html"],
        a[href="/tuyen-dung.html"] {
            background-color: #3055a2 !important;
        }

        a[href="/tuyen-dung.html"]:hover {
            background-color: #3055a2 !important;
        }

        .journal-menu>ul>li>a[href="http://haloshop.vn/game.html"] {
            color: #fce203 !important;
            background-color: #333745 !important;
        }

        .journal-menu>ul>li>a[href="http://haloshop.vn/game.html"]:hover {
            color: #333745 !important;
            background-color: #fce203 !important;
        }

        a[href="http://haloshop.vn/tin-tuc/huong-dan-va-thu-thuat-game.html"] {
            font-weight: bold !important;
        }

        .p-stock {
            display: none;
        }

        /*Hide product option*/
        .control-label strong {
            display: none;
        }

        .product-page .heading-title {
            line-height: 130% !important;
        }

        blockquote {
            background: #f9f9f9;
            border-left: 5px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C" "\201D" "\2018" "\2019";
        }

        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }

        blockquote p {
            display: inline;
            font-style: italic;
            font-size: 14px;
        }

        @media only screen and (max-width: 470px) {
            .journal-cart {
                width: 50%;
            }

            .journal-search {
                width: 50%;
            }

            h1.h1_60 {
                width: 100% !important;
            }

            .div_9 {
                width: 100% !important;
            }

            .div_10 {
                width: 100% !important;
            }

            .div_12 {
                width: 100% !important;
            }

            .div_25_item {
                width: 44% !important;
                height: auto !important;
            }

            .div_25 {
                width: 100% !important;
                margin-left: 0 !important;
                margin-bottom: 10px;
            }

            .div_33 {
                width: 100% !important;
            }

            .div_66 {
                width: 100% !important;
            }

            .div_75 {
                width: 100% !important;
            }

            .div_50 {
                width: 100% !important;
            }
        }

        h1 {
            font-size: 48px;
            margin-bottom: 10px;
            padding: 0 15px;
        }

        h1.h1_60 {
            width: 60%;
        }

        h2 {
            font-size: 26px;
            margin: 10px 0;
            padding: 0 15px;
        }

        .div_9 {
            width: 9%;
            float: left;
        }

        .div_10 {
            width: 10%;
            float: left;
        }

        .div_12 {
            width: 12%;
            float: left;
        }

        .div_25_item {
            width: 25%;
            float: left;
        }

        .div_25 {
            width: 25%;
            float: left;
        }

        .div_33 {
            width: 33.333333%;
            float: left;
        }

        .div_66 {
            width: 66.666666%;
            float: left;
        }

        .div_75 {
            width: 75%;
            float: left;
        }

        .div_50 {
            width: 50%;
            float: left;
            padding: 0 5px;
        }

        .clear {
            clear: both
        }

        .div_par {
            margin-bottom: 50px;
        }

        .product_extra-331 .block-content img {
            display: block;
            margin: 0 auto;
            margin-bottom: 25px;
        }

        .post-content video {
            margin-bottom: 20px;
        }

        #post-content img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(1.02);
        }

        #tab-specification .table-bordered td:first-child {
            width: 22%;
        }

        .blog-contents a {
            margin: 0% !important;
            width: 33%;
        }

        .blog-contents img {
            margin: 0% !important;
        }

        @media only screen and (max-width: 828px) {
            .blog-contents a {
                width: 32.9%;
            }

            h1 {
                font-size: 32px;
            }
        }

        @media only screen and (max-width: 650px) {
            .blog-contents a {
                width: 32.8%;
            }
        }

        @media only screen and (max-width: 539px) {
            .blog-contents a {
                width: 32.7%;
            }
        }

        @media only screen and (max-width: 461px) {
            .blog-contents a {
                width: 32.6%;
            }

            h1 {
                font-size: 28px;
            }
        }

        @media only screen and (max-width: 407px) {
            .blog-contents a {
                width: 32.5%;
            }
        }

        .other-post {
            font-size: 22px;
            font-weight: bold;
            padding-left: 10px;
        }

        .other-post:before {
            content: '\f101' !important;
            font-family: 'FontAwesome';
        }

        .related-post {
            padding-left: 20px;
        }

        .tra-gop-btn {
            cursor: pointer;
        }

        .zalo-chat-widget {
            bottom: 10px !important;
            left: 25px !important;
        }

        /*! Generated by Font Squirrel (https://www.fontsquirrel.com) on September 26, 2022 */



        @font-face {
            font-family: 'berserkerregular';
            src: url('berserker-regular-webfont.woff2') format('woff2'),
                url('berserker-regular-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;

        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ $file->ver('plugin/lazy/lazyload.min.js') }}"></script> --}}
    {{-- <script src="{{ $file->ver('admin/app/js/a_media.js') }}"></script> --}}
@endsection

@section('content')
    <div class="mt-4" id="spec-wrapper-content">
        {{-- {!! $content !!} --}}
        <div id="content">
            {!! $content !!}
        </div>

    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    {{-- <div class="modal fade p-0" id="a-media-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="a-media-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="a-media-modalLabel">Av Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="a-media-modal-body pb-0">
                    <x-admin.media.layout />
                </div>
                <div class="modal-footer p-0" style="height:50px;">
                    <div class="row w-100 h-100 m-0">
                        <div class="col-9 h-100">
                            <div id="a-media-selected" class="row w-100 d-none">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <strong class="d-block"></strong>
                                    <a class="text-danger d-block cursor-pointer" id="a-media-selected-clear">Clear</a>
                                </div>
                                <div class="flex-1 px-3">
                                    <div class="d-flex justify-content-start w-100 flex-wrap" id="a-media-selected-files">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 h-100 d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-primary" id="a-media-set" data-target="">Thiết lập hình
                                ảnh</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    {{-- <div class="modal fade" id="modal-popup-image" tabindex="-1" aria-labelledby="modal-popup-imageLabel"
        aria-hidden="true">
        <button type="button" id="modal-popup-image-close" class="btn position-absolute btn-secondary"
            style="top:20px; right: 20px ; z-index:20000"><i class="fa-solid fa-xmark pr-1"></i> Close</button>
        </button>
        <div class="modal-dialog modal-dialog-centered max-w-100" style="margin:0 ;  height:100vh">

            <div class="modal-content h-100" style="background:none">
                <div class="modal-body d-flex justify-content-center align-items-center max-w-100 max-h-100">
                    <img id="modal-popup-image-op" src="" class="h-auto w-auto"
                        style="max-width:100%; max-height:100%;" alt="">
                </div>

            </div>
        </div>
    </div> --}}
    {{-- -------------------------- --}}
    {{-- <div class="modal fade" id="a-media-popup" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="a-media-popupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="a-media-popupLabel">Model và Collection</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <x-admin.layout.form.label text="Model" />
                        <select class="custom-select" name="model" id="a-media-popup-model">
                            <option value="" selected>No Model</option>
                            @foreach (config('avmedia.models') as $model)
                                <option value="{{ $model }}">{{ $model }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <x-admin.layout.form.label text="Collection" />
                        <input type="text" class="form-control" name="collection" value=""
                            id="a-media-popup-collect" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">NếU collection không có sẵn thì hệ thống sẽ thêm
                            vào</small>
                    </div>
                    <div id="a-media-popup-files">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="a-media-popup-close" class="btn btn-secondary"
                        data-dismiss="modal">Cancel</button>
                    <button type="button" id="a-media-popup-upload" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
