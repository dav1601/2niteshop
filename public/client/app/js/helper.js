$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    jQuery.loading = function loading() {
        $("#page__loading").removeClass("d-none");
    };
    jQuery.end_loading = function end_loading() {
        $("#page__loading").addClass("d-none");
    };

    const renderErrForm = (text = "") => {
        return `<span class="invalid-feedback d-block" role="alert">
        <strong>${text}</strong></span>`;
    };
    jQuery.btn_loading = function btn_loading(
        el,
        loading = true,
        submit = false,
        clas = ""
    ) {
        let btnSubmit = el;

        if (submit) {
            btnSubmit = el.querySelectorAll('button[type="submit"]');
        }
        let currentHtml = $(btnSubmit).html();
        if (loading) {
            $(btnSubmit).attr("data-old", currentHtml);
            $(btnSubmit)
                .html(`<span class="spinner-border spinner-border-sm pr-2 ${clas} "  role="status" aria-hidden="true"></span>
                Loading...`);
        } else {
            const old = $(btnSubmit).attr("data-old");
            $(btnSubmit).html(old);
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
    jQuery.crf = function crf(number = 0) {
        return new Intl.NumberFormat("en-US").format(number) + "đ";
    };
    jQuery.vaSwal = function vaSwal(title = "", text = "", icon = "success") {
        return Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
        });
    };
    jQuery.vaToast = function vaToast(
        content = "",
        type = "s",
        timeout = 5000
    ) {
        switch (type) {
            case "s":
                return toastr.success(content, "", timeout);
            case "e":
                return toastr.error(content, "", timeout);
        }
        return;
    };
    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
