@extends('admin.layout.app')
@section('import_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var media = {{ Js::from($arr) }};
        console.log(media);
    </script>
@endsection
@section('content')
    <div class="mt-4">




    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="a-media-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="a-media-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="a-media-modalLabel">Av Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="a-media-modal-body">
                    <x-admin.media.layout :media="$media">
                        {{-- <x-slot name="upload" >
                            <x-admin.media.upload />
                        </x-slot>
                        <x-slot name="media" >
                            <x-admin.media.media :media="$media" />
                        </x-slot> --}}
                    </x-admin.media.layout>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="a-set-media" data-target="">Thiết lập hình
                        ảnh</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modal-popup-image" tabindex="-1" aria-labelledby="modal-popup-imageLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <button type="button" class="close position-absolute"
                style="top:0; right:0 ; z-index:99999; color:#fff;opacity:1" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-content" style="background:none">
                <div class="modal-body d-flex justify-content-center align-items-center">
                    <img id="modal-popup-image-op" src="" class="h-auto w-auto"
                        style="max-width:100%; max-height:100%;" alt="">
                </div>

            </div>
        </div>
    </div>
@endsection
