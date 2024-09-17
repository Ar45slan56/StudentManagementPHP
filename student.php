<?php
include_once 'Database.php';

class Student {
    private $conn;
    private $table_name = "students";

    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, phone=:phone, address=:address";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":address", $this->address);

        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $exception) {
            echo "Create Error: " . $exception->getMessage();
        }
        return false;
    }

    public function read() {
        $query = "SELECT id, name, email, phone, address FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
            return $stmt;
        } catch (PDOException $exception) {
            echo "Read Error: " . $exception->getMessage();
        }
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name=:name, email=:email, phone=:phone, address=:address WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":address", $this->address);

        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $exception) {
            echo "Update Error: " . $exception->getMessage();
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $exception) {
            echo "Delete Error: " . $exception->getMessage();
        }
        return false;
    }
}
?>
