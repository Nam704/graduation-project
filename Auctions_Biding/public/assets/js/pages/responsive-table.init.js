// !(function (t) {
//     "use strict";
//     function e() {}
//     (e.prototype.init = function () {
//         document.addEventListener("DOMContentLoaded", function () {
//             t(".table-rep-plugin").responsiveTable("update"),
//                 t(".btn-toolbar [data-toggle=dropdown]").attr(
//                     "data-bs-toggle",
//                     "dropdown"
//                 );
//         });
//     }),
//         (t.ResponsiveTable = new e()),
//         (t.ResponsiveTable.Constructor = e);
// })(window.jQuery),
//     (function () {
//         "use strict";
//         window.jQuery.ResponsiveTable.init();
//     })();
// Sử dụng IIFE (Immediately Invoked Function Expression) để tạo một không gian tên riêng biệt, tránh xung đột biến toàn cục
!(function (t) {
    "use strict";

    // Định nghĩa hàm khởi tạo (constructor) e
    function e() {}

    // Thêm phương thức init vào prototype của e
    e.prototype.init = function () {
        // Lắng nghe sự kiện DOMContentLoaded (khi toàn bộ DOM đã tải xong)
        document.addEventListener("DOMContentLoaded", function () {
            // Tìm tất cả các phần tử có class .table-rep-plugin và cập nhật tính năng bảng đáp ứng
            t(".table-rep-plugin").responsiveTable("update");

            // Thay đổi thuộc tính data-toggle thành data-bs-toggle cho các phần tử dropdown (tương thích với Bootstrap 5)
            t(".btn-toolbar [data-toggle=dropdown]").attr(
                "data-bs-toggle",
                "dropdown"
            );
        });
    };

    // Tạo một đối tượng mới từ hàm e và gán vào t.ResponsiveTable
    t.ResponsiveTable = new e();

    // Gán hàm khởi tạo e vào thuộc tính Constructor của t.ResponsiveTable
    t.ResponsiveTable.Constructor = e;
})(window.jQuery), // Truyền jQuery vào IIFE để sử dụng alias "t"
    // Tạo một IIFE khác để khởi chạy hàm init
    (function () {
        "use strict";

        // Khởi tạo chức năng bảng đáp ứng bằng cách gọi phương thức init
        window.jQuery.ResponsiveTable.init();
    })();
