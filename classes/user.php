<?php
class User
{
    public $id; // PK Auto Increment nên không cần set giá trị
    public $student_id; // FK
    public $username;
    public $password;
    public $role;


    // Kiểm tra thông tin đăng nhập
    private function validate()
    {
        return $this->username != '' && $this->password != ''; // Nếu username và password khác rỗng thì trả về true
    }

    // Xác thực thông tin đăng nhập
    public static function verify_user($username, $password)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE username=:username";
        $stmt = $conn->connection->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch(); // Trả về 1 mảng chứa thông tin user
        if ($user) { // Nếu tồn tại user
            $hash = $user->password; // Lấy ra password đã hash
            if (password_verify($password, $hash)) {
                return $user;
            };
        }
        return false;
    }

    // Tìm kiếm username trong table user
    public static function find_username($username)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE username=:username";
        $stmt = $conn->connection->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch(); // Trả về 1 mảng chứa thông tin user
        if ($user) { // Nếu tồn tại user
            return true;
        }
        return false;
    }

    public static function find_by_student_id($id)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE student_id=:id";
        $stmt = $conn->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch(); // Trả về 1 mảng chứa thông tin user
        if ($user) { // Nếu tồn tại user
            return $user;
        }
        return false;
    }

    public static function find_all()
    {
        global $conn;
        try {
            $sql = "SELECT * FROM users";
            $stmt = $conn->connection->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function find_by_id($id)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM users WHERE id=:id";
            $stmt = $conn->connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function create()
    {
        global $conn;
        if ($this->validate()) {
            $sql = "INSERT INTO users(username, student_id , password) VALUES (:username, :student_id ,:password)";
            $stmt = $conn->connection->prepare($sql);
            $stmt->bindValue(':username', $this->username);
            $stmt->bindValue(':student_id', $this->student_id);
            $hash = password_hash($this->password, PASSWORD_DEFAULT); // Hash password
            $stmt->bindValue(':password', $hash);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public static function is_exist_student_id($id)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE student_id=:id";
        $stmt = $conn->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch(); // Trả về 1 mảng chứa thông tin user
        if ($user) { // Nếu tồn tại user
            return $user;
        }
        return false;
    }


    // Sửa username dựa trên id, biết id của table user có là foreign key của trường id table students
    public function editUsername($id, $new_username)
    {
        global $conn;
        try {
            $sql = "UPDATE users SET username=:new_username WHERE id=:id";
            $stmt = $conn->connection->prepare($sql);
            $stmt->bindValue(':new_username', $new_username);
            $stmt->bindValue(':id', $id);
            return $stmt->execute(); // Thực hiện câu lệnh SQL
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Sửa password dựa trên id (PK), biết id của table user có là foreign key của trường id table students
    public function editPassword($id, $new_password)
    {
        global $conn;
        try {
            $sql = "UPDATE users SET password=:new_password WHERE id=:id";
            $stmt = $conn->connection->prepare($sql);
            $hash = password_hash($new_password, PASSWORD_DEFAULT); // Hash password
            $stmt->bindValue(':new_password', $hash);
            $stmt->bindValue(':id', $id);
            return $stmt->execute(); // Thực hiện câu lệnh SQL
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Xóa user dựa trên id, biết id của table user có là foreign key của trường id table students
    public function delete()
    {
        global $conn;
        try {
            $sql = "DELETE FROM users WHERE id=:id";
            $stmt = $conn->connection->prepare($sql);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute(); // Thực hiện câu lệnh SQL
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
