$(function () {
    function create_editor(id = "", height = 400) {
        var id = {
            path_absolute: path_ab,
            selector: "#" + id,
            relative_urls: false,
            height: height,
            apiKey: "K62VDFLT",
            external_plugins: {
                N1ED: "http://localhost/2niteshop/home/u217861923/domains/vachill.com/public_html/public/plugin/tinymce/FontAwesome/plugin.js",
            },

            plugins:
                "print preview importcss tinydrive searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists  wordcount  textpattern noneditable help charmap  quickbars emoticons FontAwesome",
            toolbar:
                "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist  | forecolor backcolor  removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample |  ltr rtl | showcomments addcomment",
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
                    editor_config.path_absolute +
                    "laravel-filemanager?editor=" +
                    meta.fieldname;
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
        tinymce.init(id);
    }
    create_editor("plc__tiny", 400);
    create_editor("info__tiny", 400);
    create_editor("content__tiny", 1000);
    create_editor("content__blog", 1600);
    create_editor("value_config_infor", 500);
    create_editor("block__product__tiny", 600);
});
