$(function () {
    var isAdvancedUpload = (function () {
        var div = document.createElement("div");
        return (
            ("draggable" in div || ("ondragstart" in div && "ondrop" in div)) &&
            "FormData" in window &&
            "FileReader" in window
        );
    })();

    let draggableFileArea = document.querySelector(".drag-file-area");
    let browseFileText = document.querySelector(".browse-files");
    let uploadIcon = document.querySelector(".upload-icon");
    let dragDropText = document.querySelector(".dynamic-message");
    let fileInput = document.querySelector(".default-file-input");
    let fileFlag = 0;

    fileInput.addEventListener("change", (e) => {});

    if (isAdvancedUpload) {
        [
            "drag",
            "dragstart",
            "dragend",
            "dragover",
            "dragenter",
            "dragleave",
            "drop",
        ].forEach((evt) =>
            draggableFileArea.addEventListener(evt, (e) => {
                e.preventDefault();
                e.stopPropagation();
            })
        );

        ["dragover", "dragenter"].forEach((evt) => {
            draggableFileArea.addEventListener(evt, (e) => {
                e.preventDefault();
                e.stopPropagation();
                uploadIcon.innerHTML = "file_download";
                dragDropText.innerHTML = "Drop your file here!";
            });
        });

        draggableFileArea.addEventListener("drop", (e) => {
            console.log(e);
        });
    }
});
