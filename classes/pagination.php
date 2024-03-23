<?php
// Tổng số bản ghi = tổng số trang * số bản ghi mỗi trang
// ==> Số trang = tổng số bản ghi / số bản ghi mỗi trang

// 
class Pagination
{
    private $conn, $table, $total_records, $limit = 5, $current_page;

    // PDO connection
    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
        $this->set_total_records();
    }

    // LẤY TỔNG SỐ BẢN GHI
    public function get_total_records()
    {
        return $this->total_records;
    }

    // Lấy tổng số bản ghi
    public function set_total_records()
    {

        $sql = "SELECT id FROM " . $this->table;
        $stmt = $this->conn->connection->prepare($sql);
        $stmt->execute();
        $this->total_records = $stmt->rowCount();
    }

    public function set_current_page($page)
    {
        $this->current_page = $page;
    }

    // Set số bản ghi mỗi trang
    public function set_limit($limit)
    {
        $this->limit = $limit;
    }

    // Lấy số bản ghi mỗi trang
    public function get_limit()
    {
        return $this->limit;
    }

    // Lấy trang hiện tại
    public function current_page()
    {
        if (isset($this->current_page)) {
            return $this->current_page;
        }

        if (isset($_GET['page'])) {
            if ((int)$_GET['page'] < 1) {
                return 1;
            } else if ((int)$_GET['page'] > $this->get_pagination_number()) {
                return $this->get_pagination_number();
            } else {
                return (int)$_GET['page'];
            }
        } else {
            return 1;
        }
    }


    // Lấy dữ liệu từ database
    // 
    public function get_full($table_join = null, $table_join_cells = null, $table_join_cell_con = null, $table_con = null)
    {
        $start = 0;
        if (
            $this->current_page() > 1
        ) {
            $start = ($this->current_page() * $this->limit) - $this->limit;
        }

        // Prepare the SQL query
        if ($table_join) {
            $stmt = $this->conn->connection->prepare("SELECT $this->table.*, $table_join_cells FROM $this->table 
        LEFT JOIN $table_join ON $this->table.$table_con = $table_join.$table_join_cell_con
        LIMIT $start, $this->limit");
        } else {
            $stmt = $this->conn->connection->prepare("SELECT * FROM $this->table LIMIT $start, $this->limit");
        }

        $stmt->execute();

        // Set the fetch mode to Student class
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Student');

        return $stmt->fetchAll();
    }


    // Lấy số tổng số trang (Sẽ hiện ở dưới bảng)
    public function get_pagination_number()
    {
        return ceil($this->total_records / $this->limit); // Làm tròn trên
    }
}
