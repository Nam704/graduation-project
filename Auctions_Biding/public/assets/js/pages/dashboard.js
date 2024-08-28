!(function (r) {
    "use strict";

    // Hàm khởi tạo đối tượng Dashboard
    function Dashboard() {
        this.$body = r("body");
        this.charts = [];
    }

    // Hàm khởi tạo các biểu đồ
    Dashboard.prototype.initCharts = function () {
        // Cấu hình mặc định cho ApexCharts
        window.Apex = {
            chart: { parentHeightOffset: 0, toolbar: { show: !1 } },
            grid: { padding: { left: 0, right: 0 } },
            colors: ["#3e60d5", "#47ad77", "#fa5c7c", "#ffbc00"],
        };

        // Hàm tạo biểu đồ doanh thu
        function createRevenueChart() {
            var colors = ["#3e60d5", "#47ad77", "#fa5c7c", "#ffbc00"];
            var dataColors = r("#revenue-chart").data("colors");
            var chartOptions = {
                series: [
                    {
                        name: "Revenue",
                        data: [440, 505, 414, 526, 227, 413, 201],
                    },
                    {
                        name: "Sales",
                        data: [320, 258, 368, 458, 201, 365, 389],
                    },
                    {
                        name: "Profit",
                        data: [320, 458, 369, 520, 180, 369, 160],
                    },
                ],
                chart: { height: 377, type: "bar" },
                plotOptions: { bar: { columnWidth: "60%" } },
                stroke: { show: !0, width: 2, colors: ["transparent"] },
                dataLabels: { enabled: !1 },
                colors: dataColors ? dataColors.split(",") : colors,
                xaxis: {
                    categories: [
                        "Sunday",
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                    ],
                },
                yaxis: { title: { text: "$ (thousands)" } },
                legend: { offsetY: 7 },
                grid: { padding: { bottom: 20 } },
                fill: { opacity: 1 },
                tooltip: {
                    y: {
                        formatter: function (value) {
                            return "$ " + value + " thousands";
                        },
                    },
                },
            };
            new ApexCharts(
                document.querySelector("#revenue-chart"),
                chartOptions
            ).render();
        }

        // Hàm tạo biểu đồ doanh số hàng năm
        function createYearlySalesChart() {
            var colors = ["#3e60d5", "#47ad77", "#fa5c7c", "#ffbc00"];
            var dataColors = r("#yearly-sales-chart").data("colors");
            var chartOptions = {
                series: [
                    { name: "Mobile", data: [25, 15, 25, 36, 32, 42, 45] },
                    { name: "Desktop", data: [20, 10, 20, 31, 27, 37, 40] },
                ],
                chart: { height: 250, type: "line", toolbar: { show: !1 } },
                colors: dataColors ? dataColors.split(",") : colors,
                stroke: { curve: "smooth", width: [3, 3] },
                markers: { size: 3 },
                xaxis: {
                    categories: [
                        "2017",
                        "2018",
                        "2019",
                        "2020",
                        "2021",
                        "2022",
                        "2023",
                    ],
                },
                legend: { show: !1 },
            };
            new ApexCharts(
                document.querySelector("#yearly-sales-chart"),
                chartOptions
            ).render();
        }

        // Hàm tạo biểu đồ chia sẻ thị trường
        function createUSShareChart() {
            var chartOptions = {
                series: [44, 55, 13, 43],
                chart: { width: 80, type: "pie" },
                legend: { show: !1 },
                colors: ["#1a2942", "#f13c6e", "#3bc0c3", "#d1d7d973"],
                labels: ["Team A", "Team B", "Team C", "Team D"],
            };
            new ApexCharts(
                document.querySelector("#us-share-chart"),
                chartOptions
            ).render();
        }

        // Gọi các hàm tạo biểu đồ
        createRevenueChart();
        createYearlySalesChart();
        createUSShareChart();
    };

    // Hàm khởi tạo Dashboard
    Dashboard.prototype.init = function () {
        this.initCharts();
    };

    // Khởi tạo đối tượng Dashboard
    r.Dashboard = new Dashboard();
    r.Dashboard.Constructor = Dashboard;
})(window.jQuery);

// Khởi tạo Dashboard khi tài liệu sẵn sàng
(function (t) {
    "use strict";
    t(document).ready(function () {
        t.Dashboard.init();
    });
})(window.jQuery);
