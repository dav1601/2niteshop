$(function () {
    jQuery.create_editor = function create_editor(id = "", height = 400) {
        let editor = {
            path_absolute: path_ab,
            selector: "#" + id,
            relative_urls: false,
            height: height,
            external_plugins: {
                grid: path_ab + "/plugin/grid/plugin.min.js",
            },

            plugins:
                "print preview importcss tinydrive searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists  wordcount  textpattern noneditable help charmap  quickbars emoticons grid",
            toolbar:
                "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist  | forecolor backcolor  removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample |  ltr rtl | showcomments addcomment grid_insert",
            grid_preset: "Bootstrap4",
            file_picker_callback: function (callback, value, meta) {
                var x =
                    window.innerWidth ||
                    document.documentElement.clientWidth ||
                    document.getElementsByTagName("body")[0].clientWidth;
                var y =
                    window.innerHeight ||
                    document.documentElement.clientHeight ||
                    document.getElementsByTagName("body")[0].clientHeight;

                var cmsURL =
                    path_ab + "/laravel-filemanager?editor=" + meta.fieldname;
                if (meta.filetype == "image") {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: "Filemanager",
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    },
                });
            },
        };
        return tinymce.init(editor);
    };
    $.create_editor("plc__tiny", 400);
    $.create_editor("info__tiny", 400);
    $.create_editor("content__tiny", 1000);
    $.create_editor("content__blog", 1600);
    $.create_editor("value_config_infor", 500);
    $.create_editor("block__product__tiny", 600);
    $.create_editor("block__category__tiny", 700);
    $.create_editor("pack-edit-tiny", 400);
});
