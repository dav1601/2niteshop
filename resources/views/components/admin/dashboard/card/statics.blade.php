<div class="col-3 {{ $class }} stat__item px-2">
    <div class="card">
        <div class="card-body">
            <div class="card__top d-flex justify-content-between align-items-center mb-3">
                <span class="card__top--text">
                    {{ $header }}
                </span>
                <i class="fas {{ $icon }} card__top--icon"></i>
            </div>
            <div class="card__bot">
                <span> {{ $content }} </span>
            </div>
        </div>
    </div>
</div>
