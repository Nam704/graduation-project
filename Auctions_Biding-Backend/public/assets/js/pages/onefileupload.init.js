!(function (e) {
    "use strict";

    function t() {
        this.$body = e("body");
    }

    t.prototype.init = function () {
        Dropzone.autoDiscover = false;

        e('[data-plugin="dropzone"]').each(function () {
            var form = e(this);
            var actionUrl = form.attr("action");
            var previewsContainer = form.data("previewsContainer");
            var previewTemplate = form.data("uploadPreviewTemplate");

            var dropzoneConfig = {
                url: actionUrl,
                maxFiles: 1, // Giới hạn chỉ 1 file
                maxFilesize: 2, // Kích thước tối đa của file (MB)
                addRemoveLinks: true,
                dictDefaultMessage: "Drop files here or click to upload.",
                dictRemoveFile: "Remove file",
                dictMaxFilesExceeded: "You can only upload one file.",

                init: function () {
                    this.on("addedfile", function (file) {
                        console.log("File added: " + file.name);
                    });

                    this.on("success", function (file) {
                        console.log("File uploaded: " + file.name);
                    });
                },
            };

            if (previewsContainer) {
                dropzoneConfig.previewsContainer = previewsContainer;
            }

            if (previewTemplate) {
                dropzoneConfig.previewTemplate = e(previewTemplate).html();
            }

            // Khởi tạo Dropzone cho form
            form.dropzone(dropzoneConfig);
        });
    };

    e.FileUpload = new t();
    e.FileUpload.Constructor = t;
})(window.jQuery);

(function () {
    "use strict";
    window.jQuery.FileUpload.init();
})();
