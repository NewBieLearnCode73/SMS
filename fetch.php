<?php
require_once("inc/init.php");

// Sắp xếp và tiềm kiếm dữ liệu được xử lí ở đây
$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = $_POST['search']['value']; // get the search value

$query =
    "SELECT students.*, classes.class_name 
FROM students 
INNER JOIN classes ON students.id = classes.student_id 
WHERE 
students.name LIKE :searchValue 
OR students.id LIKE :searchValue 
OR students.email LIKE :searchValue 
OR students.address LIKE :searchValue 
OR students.birthdate LIKE :searchValue 
OR classes.class_name LIKE :searchValue
ORDER BY students.id ASC
";


if ($length != -1) {
    $query .= "LIMIT :start, :length";
}

$statement = $conn->connection->prepare($query);
$statement->bindValue(':searchValue', '%' . $searchValue . '%', PDO::PARAM_STR);
$statement->bindValue(':start', (int)$start, PDO::PARAM_INT);
$statement->bindValue(':length', (int)$length, PDO::PARAM_INT);
$statement->execute();

$data = array();
$filtered_rows = $statement->rowCount();

// Cập nhật lại địa chỉ ảnh SỬ DỤNG với reference
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $row['image'] = $row['image'] ? 'uploads' . DS . $row['image'] : 'uploads/placeholderuser.png';
    $sub_array = array();
    $sub_array[] = "<h2><a href='admin-student-profile.php?id={$row['id']}' class='avatar text-white'><img src='{$row['image']}' alt='' /></a><a href='admin-student-profile.php?id={$row['id']}'>{$row['name']}</a></h2>";
    $sub_array[] = $row['id'];
    $sub_array[] = $row['class_name'];
    $sub_array[] = $row['score'];
    $sub_array[] = $row['email'];
    $sub_array[] = $row['address'];
    $sub_array[] = $row['birthdate'];
    $sub_array[] = "<a href=\"admin-edit-profile-student.php?id={$row['id']}\" class=\"btn btn-primary btn-sm mb-1 mr-1\" title=\"Edit Student Profile\">    <i class=\"far fa-edit\"></i></a><a href=\"admin-manage-student-account.php?id={$row['id']}\" class=\"btn btn-primary btn-sm mb-1 mr-1\" title=\"Manage Student Account\">    <i class=\"fa fa-unlock-alt\"></i></a><a href=\"admin-delete-student.php?id={$row['id']}\" class=\"btn btn-danger btn-sm mb-1 mr-1\" title=\"Delete Student\">    <i class=\"far fa-trash-alt\"></i></a>";
    $data[] = $sub_array;
}

function get_total_all_records()
{
    global $conn;
    $statement = $conn->connection->prepare("SELECT * FROM students");
    $statement->execute();
    return $statement->rowCount();
}

$total_rows = $conn->connection->query('SELECT COUNT(*) FROM students')->fetchColumn();

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $total_rows,
    "recordsFiltered" => get_total_all_records(),
    "data" => $data
);

echo json_encode($output);
