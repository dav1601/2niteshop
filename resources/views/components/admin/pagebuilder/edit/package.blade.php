<div style="min-width:600px">
    <input type="hidden" name="" id="edit-package-type" value="{{ $type }}">
    <input type="hidden" name="" id="edit-package-id" value="{{ $package['id'] }}">
    @switch($type)
        @case('image')
            <div class="form-group">
                <label for="pack-edit-image-href">Href</label>
                <input type="text" class="form-control" name="" id="pack-edit-href" placeholder="">
            </div>
            <div class="form-group">
                <div class="custom-file pack-edit-image cursor-pointer">
                    <input type="text" class="custom-file-input" value="" id="package-edit-image">
                    <label class="custom-file-label" for="package-edit-image">Choose file</label>
                </div>

            </div>
            <div class="form-group preview-package-edit-image">
                test
            </div>
        @break

        @case('video')
            <div class="form-group">
                <label for="pack-edit-video-source">Source</label>
                <input type="text" class="form-control" name="" value="{{ $package['payload']['content'] }}"
                    id="pack-edit-video-source" placeholder="">
            </div>
        @break

        @case('text-editor')
            <div class="form-group">
                <label for="pack-edit-tiny">Editor</label>
                <textarea name="content" id="pack-edit-tiny" class="form-control my-editor"> {!! $package['payload']['content'] !!} </textarea>
            </div>
        @break

        @default
    @endswitch
    <div class="form-group">
        <label for="edit-section-class">Classes</label>
        <input type="text" data-role="tagsinput" class="form-control" value="{{ $package['payload']['class'] }}"
            id="edit-package-class">
        <small id="classesHelp" class="form-text text-muted">Nhập class và nhấn <strong>TAB</strong> hoặc
            <strong>Enter</strong></small>
    </div>
</div>
