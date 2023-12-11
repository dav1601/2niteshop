  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade p-0" id="a-media-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
  </div>
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="modal-popup-image" tabindex="-1" aria-labelledby="modal-popup-imageLabel"
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
  </div>
  {{-- -------------------------- --}}
  <div class="modal fade" id="a-media-popup" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                      <small id="helpId" class="form-text text-muted">NếU collection không có sẵn thì hệ thống sẽ
                          thêm
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
  </div>
