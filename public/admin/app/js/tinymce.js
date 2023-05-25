$(function () {
    jQuery.create_editor = function create_editor(id = "", height = 500) {
        let setting = {
            path_absolute: path_ab,
            selector: "#" + id,
            height: height,
            plugins:
                "lists advlist anchor autolink  autosave charmap code codesample directionality emoticons fullscreen help image importcss insertdatetime link lists media nonbreaking pagebreak preview quickbars save  table  visualblocks visualchars wordcount",
            toolbar:
                "aligncenter alignjustify alignleft alignnone alignright blockquote backcolor bold italic indent copy cut fontselect fontsizeselect forecolor formatselect outdent underline superscript subscript	styleselect strikethrough  undo  anchor restoredraft charmap code codesample  emoticons fullscreen  image insertdatetime link numlist bullist media nonbreaking pagebreak preview save  table  | ltr rtl visualblocks visualchars wordcount tabledelete tableprops tablerowprops tablecellprops  tableinsertrowbefore tableinsertrowafter tabledeleterow  tableinsertcolbefore tableinsertcolafter tabledeletecol ",

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
        tinymce.remove("#" + id);
        tinymce.init(setting);
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
