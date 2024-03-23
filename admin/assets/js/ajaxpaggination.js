$(document).ready(function () {
    let currentPage = 1;
    fetch_data(currentPage);

    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();
        currentPage = $(this).data("page");
        fetch_data(currentPage);
    });

    function createStudentRow(student) {
        return `
            <tr>
                <td>
                    <h2>
                        <a href='admin-student-profile.php?id=${student.id}' class='avatar text-white'>
                            <img src='${student.image}' alt='' />
                        </a>
                        <a href='admin-student-profile.php?id=${student.id}'>${student.name}</a>
                    </h2>
                </td>
                <td>${student.id}</td>
                <td>${student.class_name}</td>
                <td>${student.score}</td>
                <td>${student.email}</td>
                <td>${student.address}</td>
                <td>${student.birthdate}</td>
                <td class="text-right">
                    <a href="admin-edit-profile-student.php?id=${student.id}" class="btn btn-primary btn-sm mb-1 mr-1" title="Edit Student Profile">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="admin-manage-student-account.php?id=${student.id}" class="btn btn-primary btn-sm mb-1 mr-1" title="Manage Student Account">
                        <i class="fa fa-unlock-alt"></i>
                    </a>
                    <a href="admin-delete-student.php?id=${student.id}" class="btn btn-danger btn-sm mb-1 mr-1" title="Delete Student">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        `;
    }

    function fetch_data(page) {
        $.ajax({
            url: "process.php",
            method: "GET",
            data: {
                page: page,
            },
            dataType: "json",
            success: function (data) {
                const students = data.students;
                const cur_page = data.cur_page;
                const page_number = data.page_number;

                const html = students.map(createStudentRow).join("");
                $("#admin-dash").html(html);

                $("#current_page").html(cur_page);

                let pagination = "";
                if (cur_page > 1) {
                    pagination += `<li class="page-item"><a class="page-link" data-page="1" href="#">Start</a></li>`;
                    pagination += `<li class="page-item"><a class="page-link" data-page="${
                        cur_page - 1
                    }" href="#">Previous</a></li>`;
                }

                const $stake = 4;
                let $count = 0;
                for (let i = cur_page; i <= page_number; i++) {
                    $count++;
                    if ($count == $stake) {
                        break;
                    }
                    pagination += `<li class="page-item"><a class="page-link" data-page="${i}" href="#">${i}</a></li>`;
                }

                if (cur_page < page_number) {
                    pagination += `<li class="page-item"><a class="page-link" data-page="${
                        cur_page + 1
                    }" href="#">Next</a></li>`;
                    pagination += `<li class="page-item"><a class="page-link" data-page="${page_number}" href="#">End</a></li>`;
                }
                $("ul.pagination").html(pagination);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX request failed: ", textStatus, errorThrown);
            },
        });
    }
});
