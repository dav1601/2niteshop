<!-- Modal -->
<div class="modal fade show" id="popup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <a href=" {{ url('category/do-choi-lego') }} ">
                    <img src="{{ asset('client/images/lego-popup (1).jpg') }}" width="100%" alt="popup">
                </a>
            </div>
            <style>
                #popup .va-checkbox label::before {
                    top: -1px;
                }
                #popup .va-checkbox label::after {
                    top: 4px;
                }
            </style>
            <div class="modal-footer m-0">
                <div class="va-checkbox  d-flex align-items-center w-100">
                    <input type="checkbox" value="1" id="no-popup" class="no-popup">
                    <label for="no-popup">
                        {{ "Không hiển thị lại" }}
                    </label>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
