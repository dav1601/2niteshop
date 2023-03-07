<div class="section__checkout section__cart">
    <div class="section__checkout--title">
        Giỏ hàng
    </div>
    <div class="section__checkout--body">
        <div id="checkout_cart">
            @foreach ($cart as $item)
                <x-Cart :cart="$item" />
            @endforeach
        </div>
        <div id="checkout_total">
            <div class="row ck_total mx-0">
                <span class="col-md-9 col-6 pl-0">Chi phí vận chuyển linh hoạt:</span>
                <strong class="col-md-3 col-6 pr-md-4 pr-2">CALL-{{ getVal('switchboard')->value }}</strong>
            </div>
            <div class="row ck_total mx-0">
                <span class="col-md-9 col-6 pl-0">Tổng Tiền:</span>
                <strong class="col-md-3 col-6 pr-md-4 pr-2" id="ck_total">{{ crf(total()) }}</strong>
            </div>
        </div>
    </div>
</div>
