$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    const renderErrForm = (text = "") => {
        return `<span class="invalid-feedback d-block" role="alert">
        <strong>${text}</strong></span>`;
    };
    jQuery.isImage = function isImage(url) {
        return /\.(jpg|jpeg|png|webp|avif|gif|svg)$/.test(url);
    };
    jQuery.assign = function assign(obj, keyPath, value) {
        lastKeyIndex = keyPath.length - 1;
        for (var i = 0; i < lastKeyIndex; ++i) {
            key = keyPath[i];
            if (!(key in obj)) {
                obj[key] = {};
            }
            obj = obj[key];
        }
        obj[keyPath[lastKeyIndex]] = value;
        return obj;
    };
    jQuery.btn_loading_v2 = function btn_loading_v2(
        el,
        loading = true,
        submit = false
    ) {
        let btnSubmit = el;
        if (submit) {
            btnSubmit = el.querySelectorAll('button[type="submit"]');
        }
        btnSubmit = $(btnSubmit);
        if (!btnSubmit) {
            return;
        }
        if (!btnSubmit.attr("data-original")) {
            let currentHtml = $(btnSubmit).html();
            $(btnSubmit).attr("data-original", currentHtml);
        }
        // let currentHtml = $(btnSubmit).html();
        // $(btnSubmit).attr("data-original", currentHtml);
        $(btnSubmit).prop("disabled", loading);
        if (loading) {
            $(btnSubmit).attr("is-loading", true);
            $(btnSubmit)
                .html(`<span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                Loading...`);
        } else {
            const old = $(btnSubmit).attr("data-original");
            $(btnSubmit).html(old);
            $(btnSubmit).attr("is-loading", false);
        }

        return;
    };
    jQuery.errForm = function errForm(clear = false, form = [], errors = []) {
        if (clear) {
            let elErr = $(".invalid-feedback");
            for (let j = 0; j < elErr.length; j++) {
                let ele = elErr[j];
                $(ele).remove();
            }
        } else {
            if (errors.length <= 0) {
                return;
            }
            for (let index = 0; index < form.length; index++) {
                let element = form[index];
                let name = element.getAttribute("name");
                if (errors.hasOwnProperty(name)) {
                    let html = renderErrForm(errors[name][0]);
                    $(element).after(html);
                }
            }
        }

        return;
    };
    jQuery.btn_loading = function btn_loading(el, content = null) {
        if (!content) {
            el.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...`);
        } else {
            el.html(content);
        }
    };
    jQuery.render_img = function render_img(array, el) {
        const id = el.getAttribute("id");
        const previewClass = "preview-" + id;
        let html = "";
        if (array.length === 1) {
            html += `<label class="a-form-label ${previewClass}"><span>Preview</span></label>`;
            html += `<div class="preview_img text-center my-3 ${previewClass}">
            <img src="${array[0]}" style="max-width:100%; max-height:600px;" alt="preview" class="preview_item">
        </div>`;
        } else if (array.length > 1) {
            html += `<label class="a-form-label ${previewClass}"><span>Preview</span></label>`;
            html += `<div class="d-flex flex-wrap preview_img justify-content-center  --mul  my-3 ${previewClass}">`;
            for (let j = 0; j < array.length; j++) {
                html += ` <div class="mb-4">
                <img src="${array[j]}" style="max-width:350px ; max-height: 600px; height:auto"  alt="preview" class="preview_item mx-2 border-preview  shadow-1-strong rounded mb-4">
            </div>`;
            }
            html += `</div>`;
        } else {
            return "";
        }
        html += `<div class="w-100 d-flex justify-content-center align-items-center my-3">
        <button type="button" class="btn btn-primary clear-images" data-clear="${previewClass}" data-id="${id}">Clear</button>
    </div>`;
        return html;
    };
    jQuery.preview_img = function preview_img(el) {
        let array = [];
        let arrayName = [];

        let files = el[0].files;
        let element = el[0];
        for (let index = 0; index < files.length; index++) {
            array.push(window.URL.createObjectURL(files[index]));
            arrayName.push(files[index].name);
        }

        el.next().text(arrayName.toString());
        let html = $.render_img(array, element);
        return el.parent(".custom-file").parent(".form-group").after(html);
    };

    jQuery.end_loading = function end_loading() {
        $("#page__loading").addClass("d-none");
    };
    var url = location.protocol + "//" + location.host + location.pathname;
    jQuery.get_checked = function get_checked(class_name) {
        var selected = [];
        $("." + class_name + ":checked").each(function () {
            selected.push($(this).val());
        });
        return selected;
    };
    jQuery.format_price = function format_price($price = "") {
        var url = route("price");
        $.ajax({
            type: "post",
            url: url,
            data: { price: $price },
            dataType: "json",
            success: function (data) {
                if (data.ok == 1) {
                    $(".output_price").text(data.price);
                } else {
                    alert("Bạn nhập không phải là SỐ");
                }
            },
        });
    };
    jQuery.vaSwal = function vaSwal(title = "", text = "", icon = "") {
        return Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
        });
    };
    jQuery.vaToas = function vaToas(content = "", type = "s") {
        switch (type) {
            case "s":
                return toastr.success(content);
            case "e":
                return toastr.error(content);
        }
        return;
    };
    const urlParams = new URLSearchParams(window.location.search);
    jQuery.addParamsUrl = function addParamsUrl(key, val) {
        return urlParams.set(key, val);
    };
    jQuery.delParamsUrl = function delParamsUrl(key) {
        return urlParams.delete(key);
    };
    jQuery.getParamsUrl = function getParamsUrl(key) {
        return urlParams.getAll(key).toString();
    };
    jQuery.hasParamsUrl = function hasParamsUrl(key) {
        return urlParams.has(key) ? true : false;
    };
    jQuery.replaceNewUrl = function replaceNewUrl() {
        window.history.replaceState({}, "", url + "?" + urlParams.toString());
    };

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
