<li class="pgb-section mb-4 init-sort" data-id="{{ $section->id }}" id="pgb-section-{{ $section->id }}"
    data-ord="{{ isset($section->ord) ? $section->ord : 'none' }}" data-type="section-item">
    <div class="pgb-section-act">
        <div class="item move" sid="{{ $section->id }}" data-ord="{{ isset($section->ord) ? $section->ord : 'none' }}">
            <i class="fa-solid fa-maximize"></i>
        </div>
        <div class="item layout" sid="{{ $section->id }}">
            <i class="fa-solid fa-grip"></i>
        </div>
        <div class="item edit" sid="{{ $section->id }}">
            <i class="fa-regular fa-pen-to-square"></i>
        </div>
        <div class="item remove" sid="{{ $section->id }}">
            <i class="fa-regular fa-trash-can"></i>
        </div>
    </div>
    <div class="pgb-section-body">
        <x-admin.pagebuilder.column :isCreate="true" :section="$section" />
    </div>


</li>
