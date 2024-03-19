$(document).ready(function () {
    // Hàm lấy tham số từ URL theo tên tham số
    // VÍ dụ: http://localhost/ct07n_nhom13_source/index.php?page=2 thì getUrlParameter('page') sẽ trả về 2
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
        var results = regex.exec(location.search);
        return results === null
            ? ""
            : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    // Xử lý sự kiện khi trang web được tải
    var initialPage = getUrlParameter("page") || 1; // Lấy số trang từ URL
    fetch_data(initialPage); // Load the initial page when the document is ready

    // Xử lý sự kiện khi người dùng click vào phân trang
    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();
        var page = $(this).attr("href").split("page=")[1]; // Lấy số trang từ URL
        fetch_data(page);
    });

    // Xử lý sự kiện khi người dùng click nút back hoặc next trên trình duyệt
    $(window).on("popstate", function (event) {
        var page = getUrlParameter("page") || 1; // Get the page number from the URL
        fetch_data(page);
    });

    function fetch_data(page) {
        $.ajax({
            url: "process.php", // Đường dẫn đến tập tin xử lý Ajax của bạn
            method: "GET",
            data: {
                page: page,
            },
            dataType: "json", // Chỉ định kiểu dữ liệu trả về từ server là JSON
            success: function (data) {
                // Xử lý dữ liệu JSON trả về

                var students = data.students;
                var cur_page = data.cur_page;
                var page_number = data.page_number; // Tổng số trang

                // Nếu như đang ở index thì để url có dạng /?page= cur_page , còn truy cập trang khác thì xóa đi
                var url = window.location.href;
                if (
                    window.location.pathname == "/ct07n_nhom13_source/index.php"
                ) {
                    url =
                        window.location.href.indexOf("?page=") > 0
                            ? window.location.href.replace(
                                  /(\?page=)[^\&]+/,
                                  "$1" + cur_page
                              )
                            : window.location.href + "?page=" + cur_page;
                }
                window.history.pushState({ path: url }, "", url);

                var html = "";
                // Index đại diện cho vị trí của phần tử trong mảng
                $.each(students, function (index, student) {
                    html += "<tr>";
                    html +=
                        "<td><h2><a href='admin-student-profile.php?id=" +
                        student.id +
                        "' class='avatar text-white'><img src='" +
                        student.image +
                        "' alt='' /></a><a href='admin-student-profile.php?id=" +
                        student.id +
                        "'>" +
                        student.name +
                        "</a></h2></td>";
                    html += "<td>" + student.id + "</td>";
                    html += "<td>" + student.score + "</td>";
                    html += "<td>" + student.email + "</td>";
                    html += "<td>" + student.address + "</td>";
                    html += "<td>" + student.birthdate + "</td>";
                    html += '<td class="text-right">';
                    html +=
                        '<a href="admin-edit-profile-student.php?id=' +
                        student.id +
                        '" class="btn btn-primary btn-sm mb-1 mr-1" title="Edit Student Profile">';
                    html += '<i class="far fa-edit"></i>';
                    html += "</a>";
                    html +=
                        '<a href="admin-manage-student-account.php?id=' +
                        student.id +
                        '" class="btn btn-primary btn-sm mb-1 mr-1" title="Manage Student Account">';
                    html += '<i class="fa fa-unlock-alt"></i>';
                    html += "</a>";
                    html +=
                        '<a href="admin-delete-student.php?id=' +
                        student.id +
                        '" class="btn btn-danger btn-sm mb-1 mr-1" title="Delete Student">';
                    html += '<i class="far fa-trash-alt"></i>';
                    html += "</a>";
                    html += "</td>";
                    html += "</tr>";
                });

                $("tbody").html(html); // Truyền html đã được xử lý vào thẻ tbody

                // Hiển thị trang hiện tại
                $("#current_page").html(cur_page);

                // Hiển thị thanh phân trang
                var pagination = "";
                if (cur_page > 1) {
                    pagination +=
                        '<li class="page-item"><a class="page-link" href="?page=' +
                        (cur_page - 1) +
                        '">Previous</a></li>';
                }

                var $stake = 4;
                var $count = 0;
                for (var i = cur_page; i <= page_number; i++) {
                    $count++;
                    if ($count == $stake) {
                        break;
                    }
                    pagination +=
                        '<li class="page-item"><a class="page-link" href="?page=' +
                        i +
                        '">' +
                        i +
                        "</a></li>";
                }

                if (cur_page < page_number) {
                    pagination +=
                        '<li class="page-item"><a class="page-link" href="?page=' +
                        (cur_page + 1) +
                        '">Next</a></li>';
                }
                $("ul.pagination").html(pagination);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX request failed: ", textStatus, errorThrown);
            },
        });
    }
});
