!(function (t) {
    "use strict";
    function o() {}
    (o.prototype.init = function () {
        t("#inline-editable").Tabledit({
            inputClass: "form-control form-control-sm",
            editButton: !1,
            deleteButton: !1,
            columns: {
                identifier: [0, "id"],
                editable: [
                    [1, "col1"],
                    [2, "col2"],
                    [3, "col3"],
                    [4, "col4"],
                    [6, "col6"],
                ],
            },
        }),
            t("#btn-editable").Tabledit({
                buttons: {
                    edit: {
                        class: "btn btn-success",
                        html: '<span class="mdi mdi-pencil"></span>',
                        action: "edit",
                    },
                },
                inputClass: "form-control form-control-sm",
                deleteButton: !1,
                saveButton: !1,
                autoFocus: !1,
                columns: {
                    identifier: [0, "id"],
                    editable: [
                        [1, "col1"],
                        [2, "col2"],
                        [3, "col3"],
                        [4, "col4"],
                        [6, "col6"],
                    ],
                },
            });
    }),
        (t.EditableTable = new o()),
        (t.EditableTable.Constructor = o);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.EditableTable.init();
    })();
/*
!(function (t) {
    "use strict";

    // Hàm khởi tạo đối tượng EditableTable
    function EditableTable() {}

    // Hàm khởi tạo các bảng có thể chỉnh sửa
    EditableTable.prototype.init = function () {
        // Khởi tạo bảng có id là "inline-editable"
        t("#inline-editable").Tabledit({
            inputClass: "form-control form-control-sm",
            editButton: !1,
            deleteButton: !1,
            columns: {
                identifier: [0, "id"],
                editable: [
                    [1, "col1"],
                    [2, "col2"],
                    [3, "col3"],
                    [4, "col4"],
                    [6, "col6"],
                ],
            },
        });

        // Khởi tạo bảng có id là "btn-editable"
        t("#btn-editable").Tabledit({
            buttons: {
                edit: {
                    class: "btn btn-success",
                    html: '<span class="mdi mdi-pencil"></span>',
                    action: "edit",
                },
            },
            inputClass: "form-control form-control-sm",
            deleteButton: !1,
            saveButton: !1,
            autoFocus: !1,
            columns: {
                identifier: [0, "id"],
                editable: [
                    [1, "col1"],
                    [2, "col2"],
                    [3, "col3"],
                    [4, "col4"],
                    [6, "col6"],
                ],
            },
        });
    };

    // Khởi tạo đối tượng EditableTable
    t.EditableTable = new EditableTable();
    t.EditableTable.Constructor = EditableTable;
})(window.jQuery);

// Khởi tạo EditableTable khi tài liệu sẵn sàng
(function () {
    "use strict";
    window.jQuery.EditableTable.init();
})();

*/
