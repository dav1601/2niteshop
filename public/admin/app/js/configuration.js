$(function () {
    var btnSubmitGeneral = $("#cfg-general-update");

    initTinymce();
    // //////////////////////////////////////////////////////////////////
    function initTinymce() {
        $.each($(".cfg-html"), function (i, el) {
            $.create_editor($(el).attr("id"));
        });
    }
    $("#formCfgGeneral").ajaxForm({
        beforeSend: function () {
            $.btn_loading_v2(btnSubmitGeneral, true);
        },
        success: function (res) {
            toastr.success("Configuration Updated");
            $.btn_loading_v2(btnSubmitGeneral, false);
        },
        error: function (err) {
            console.log("🚀 ~ file: configuration.js:10 ~ err:", err);
            $.btn_loading_v2(btnSubmitGeneral, false);
        },
    });
    initFormCreate();
    function initFormCreate() {
        const btn = $("#submitFormCreateConf");
        $("#formCreateConf").ajaxForm({
            beforeSend: function () {
                $.btn_loading_v2(btn, true);
            },
            success: function (res) {
                $.btn_loading_v2(btn, false);
                toastr.success("Configuration Created");
                $("#formCreateConf").clearForm();
            },
            error: function (err) {
                console.log("🚀 ~ file: configuration.js:10 ~ err:", err);
                const data = err.responseJSON.data;
                $.validationFail(data);
                $.btn_loading_v2(btn, false);
            },
        });
    }

    // //////////////////////////////////////////////////////////////////////////

    $(document).on("change", "#type_conf", function () {
        const type = $(this).val();
        const content = $("#value_conf");
        switch (type) {
            case "text":
                content.html(
                    `<label class="a-form-label">
                    <span>${type}</span></label>
                <input type="text" class="form-control" name="value">`
                );
                break;

            case "html":
                content.html(
                    `<label class="a-form-label">
                    <span>${type}</span></label>
                    <textarea name="value" id="tiny_cfg_html"  class="cfg-html"></textarea>`
                );
                initTinymce();
                initFormCreate();
                break;

            default:
                content.html("");
                break;
        }
    });
});
