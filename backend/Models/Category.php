<?php
require_once '../../Models/Database.php';

class Category extends Database{
    public $id;
    public $name;
    public $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function Create($data){
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function Read(){
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return false;
        }
    }

    public function Update($data){
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function Delete($data){
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        //bind
        $stmt->bindParam(':id', $data);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ReadOne($data){
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute($data)) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return false;
        }
    }
}