<?php
class Database {
    private $host = "localhost"; // میزبان
    private $user = "root"; // نام کاربری
    private $pass = ""; // رمز عبور
    private $db = "shop"; // نام پایگاه داده
    public $conn;

    public function __construct() {
        // ایجاد اتصال به پایگاه داده
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        // بررسی خطا در اتصال
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error); // اتصال ناموفق
        }
    }

    public function __destruct() {
        // بستن اتصال به پایگاه داده
        $this->conn->close();
    }
}

// ایجاد نمونه‌ای از کلاس Database
$db = new Database();
?>