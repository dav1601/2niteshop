@extends('layouts.app')
@section('import_js')
    <script src="{{ $file->import_js('home.js') }}"></script>
@endsection

@section('content')
    @if (getVal('background')->value != null)
        @php
            $bg = urlImg(getVal('background')->value);
        @endphp
        <style>
            body {
                background-image: url({{ $bg }});
                background-attachment: fixed;
                background-repeat: no-repeat;
            }

            #biad__content--home {
                background: white;
                padding-left: 0;
                padding-right: 0;
            }

            #biad__header--bot {
                background: white;
            }

            #biad__header--bot>div {
                padding-left: 0;
                padding-right: 0;
            }

            .show__home {
                padding-left: 10px;
                padding-right: 10px;
            }

            .show__home--box:last-child {
                margin-bottom: 0 !important;
                padding-bottom: 100px;
            }
        </style>
    @endif


    {{-- END BOTTOM BANNER --}}
@endsection
