<?php

// Bảng classes liên kết với bảng students thông qua bảng student_id
class Classes
{
    public $class_id;

    public $class_name;

    public $student_id;

    // Đẩy thông tin vào database
    public function create()
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("INSERT INTO classes(class_name, student_id) VALUES (:class_name, :student_id)");
            $stmt->bindValue(':class_name', $this->class_name);
            $stmt->bindValue(':student_id', $this->student_id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Find all classes
    public static function find_all()
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("SELECT * FROM classes");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Classes');
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Tìm kiếm tất cả sinh viên trong một lớp với tham số là class_name
    public static function find_students_by_class_name($class_name)
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("SELECT * FROM students WHERE student_id = (SELECT student_id FROM classes WHERE class_name = :class_name)");
            $stmt->bindValue(':class_name', $class_name);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Students');
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // TÌm kiếm lớp của sinh viên theo student_id
    public static function find_class_by_student_id($student_id)
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("SELECT * FROM classes WHERE student_id = :student_id");
            $stmt->bindValue(':student_id', $student_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Classes');
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Trả ra số lượng sinh viên trong các lớp hiện có trên database
    public static function find_all_class_name()
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("SELECT count(class_name) as class_count, class_name FROM classes GROUP BY class_name ORDER BY class_name DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Classes');
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Tìm kiếm class_name theo student_id
    public static function find_class_name_by_student_id($student_id)
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("SELECT class_name FROM classes WHERE student_id = :student_id");
            $stmt->bindValue(':student_id', $student_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Classes');
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Update lại classes của sinh viên
    public static function update_class($student_id, $class_name)
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("UPDATE classes SET class_name = :class_name WHERE student_id = :student_id");
            $stmt->bindValue(':class_name', $class_name);
            $stmt->bindValue(':student_id', $student_id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Xóa lớp của sinh viên
    public static function delete_class($student_id)
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("DELETE FROM classes WHERE student_id = :student_id");
            $stmt->bindValue(':student_id', $student_id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
