$(document).ready(function () {
    "use strict"; // Kích hoạt chế độ 'strict' để tránh các lỗi tiềm ẩn

    // Khởi tạo bảng với ID "basic-datatable"
    $("#basic-datatable").DataTable({
        keys: !0, // Kích hoạt tính năng điều hướng bằng phím
        language: {
            // Tùy chỉnh các nhãn ngôn ngữ
            paginate: {
                // Tùy chỉnh nút phân trang
                previous: "<i class='ri-arrow-left-s-line'>", // Thay đổi biểu tượng nút 'Trang trước'
                next: "<i class='ri-arrow-right-s-line'>", // Thay đổi biểu tượng nút 'Trang sau'
            },
        },
        drawCallback: function () {
            // Hàm gọi lại sau khi bảng được vẽ lại
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
            // Thêm class "pagination-rounded" để làm tròn góc các nút phân trang
        },
    });

    // Khởi tạo bảng với ID "datatable-buttons" và thêm các nút tùy chọn
    var a = $("#datatable-buttons").DataTable({
        lengthChange: !1, // Ẩn tùy chọn thay đổi số lượng dòng hiển thị
        buttons: ["copy", "print"], // Thêm các nút "Sao chép" và "In"
        language: {
            // Tùy chỉnh các nhãn ngôn ngữ
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });

    // Khởi tạo bảng với ID "selection-datatable" và cho phép chọn nhiều dòng
    $("#selection-datatable").DataTable({
        select: { style: "multi" }, // Kích hoạt chế độ chọn nhiều dòng
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });

    // Đính kèm container của các nút vào bảng "datatable-buttons"
    a.buttons()
        .container()
        .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

    // Khởi tạo bảng với ID "alternative-page-datatable" với kiểu phân trang đầy đủ
    $("#alternative-page-datatable").DataTable({
        pagingType: "full_numbers", // Hiển thị đầy đủ các nút phân trang (số trang, trang trước, trang sau)
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });

    // Khởi tạo bảng với ID "scroll-vertical-datatable" với cuộn dọc
    $("#scroll-vertical-datatable").DataTable({
        scrollY: "350px", // Thiết lập chiều cao cuộn dọc là 350px
        scrollCollapse: !0, // Cho phép thu gọn bảng nếu chiều cao nội dung nhỏ hơn
        paging: !1, // Vô hiệu hóa phân trang
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });

    // Khởi tạo bảng với ID "scroll-horizontal-datatable" với cuộn ngang
    $("#scroll-horizontal-datatable").DataTable({
        scrollX: !0, // Kích hoạt cuộn ngang
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });

    // Khởi tạo bảng với ID "complex-header-datatable" với các cột phức tạp
    $("#complex-header-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
        columnDefs: [{ visible: !1, targets: -1 }], // Ẩn cột cuối cùng
    });

    // Khởi tạo bảng với ID "row-callback-datatable" và thay đổi màu nền dòng
    $("#row-callback-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
        createdRow: function (a, e, l) {
            // Thay đổi màu nền cột thứ 5 nếu giá trị lớn hơn $150,000
            if (+e[5].replace(/[\$,]/g, "") > 150000) {
                $("td", a).eq(5).addClass("text-danger");
            }
        },
    });

    // Khởi tạo bảng với ID "state-saving-datatable" với chế độ lưu trạng thái
    $("#state-saving-datatable").DataTable({
        stateSave: !0, // Lưu trạng thái bảng (ví dụ: phân trang, tìm kiếm)
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });

    // Khởi tạo bảng với ID "fixed-columns-datatable" với cột cố định
    $("#fixed-columns-datatable").DataTable({
        scrollY: 300, // Thiết lập chiều cao cuộn dọc là 300px
        scrollX: !0, // Kích hoạt cuộn ngang
        scrollCollapse: !0, // Cho phép thu gọn bảng nếu chiều cao nội dung nhỏ hơn
        paging: !1, // Vô hiệu hóa phân trang
        fixedColumns: !0, // Kích hoạt cột cố định
    });

    // Thêm class cho dropdown chọn số lượng dòng hiển thị
    $(".dataTables_length select").addClass("form-select form-select-sm");

    // Thêm class cho nhãn chọn số lượng dòng hiển thị
    $(".dataTables_length label").addClass("form-label");
});

// Khởi tạo bảng với ID "fixed-header-datatable" và kích hoạt header cố định
$(document).ready(function () {
    var a = $("#fixed-header-datatable").DataTable({
        responsive: !0, // Kích hoạt tính năng responsive
        // scrollX: !0, // Kích hoạt cuộn ngang
        language: {
            paginate: {
                previous: "<i class='ri-arrow-left-s-line'>",
                next: "<i class='ri-arrow-right-s-line'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });

    // Kích hoạt header cố định cho bảng "fixed-header-datatable"
    new $.fn.dataTable.FixedHeader(a);
});
