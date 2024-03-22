<?php
class Student
{
    // Properties
    public $id;
    public $name;
    public $birthdate;
    public $address;
    public $email;
    public $image;
    public $score;

    public $upload_directory = "uploads";

    // find_all
    public static function find_all()
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("SELECT * FROM students");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Student');
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // find_by_id
    public static function find_by_id($id)
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("SELECT * FROM students WHERE id = :id LIMIT 1");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Student');
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // create
    public function create()
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("INSERT INTO students( name, birthdate, address, email, image, score) VALUES ( :name, :birthdate, :address, :email, :image, :score)");
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':birthdate', $this->birthdate);
            $stmt->bindValue(':address', $this->address);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':image', $this->image);
            $stmt->bindValue(':score', $this->score);
            if ($stmt->execute()) {
                $this->id = $conn->connection->lastInsertId();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    // update for admin
    public function update_by_admin()
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("UPDATE students SET name=:name, birthdate=:birthdate, address=:address, email=:email, image=:image, score=:score WHERE id=:id");
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':birthdate', $this->birthdate);
            $stmt->bindValue(':address', $this->address);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':image', $this->image);
            $stmt->bindValue(':score', $this->score);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // update for student not include name and score and user_id
    public function update_by_student()
    {
        global $conn;
        try {
            $stmt = $conn->connection->prepare("UPDATE students SET  birthdate=:birthdate, address=:address, email=:email, image=:image WHERE id=:id");
            $stmt->bindValue(':birthdate', $this->birthdate);
            $stmt->bindValue(':address', $this->address);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':image', $this->image);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function delete_student_and_account()
    {
        global $conn;
        try {
            // Nếu như tham chiếu được đến username thông qua cột id của bảng students với cột student_id của bảng users thì xóa user
            $user = User::find_by_student_id($this->id);
            if ($user) {
                $user->delete(); // Xóa user
            }
            if (Classes::find_class_by_student_id($this->id)) {
                Classes::delete_class($this->id);
            }

            $stmt = $conn->connection->prepare("DELETE FROM students WHERE id=:id");
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Picture path
    public function picture_path()
    {
        if (!empty($this->image)) {
            return $this->upload_directory . DS . $this->image;
        }
        return "uploads/placeholderuser.png";
    }

    // delete image
    public function delete_image()
    {
        if (!empty($this->image)) {
            $target_path = SITE_ROOT  . DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }
}
