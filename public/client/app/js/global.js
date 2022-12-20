$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    jQuery.getChecked = function getChecked($class = "") {
        var filter = [];
        $("." + $class + ":checked").each(function () {
            filter.push($(this).val());
        });
        return filter;
    };
    jQuery.getCookie = function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(";").shift();
    };

    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
});
