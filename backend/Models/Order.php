<?php

class Order {
    private $db;
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addOrder($data) {
        $sql = "INSERT INTO orders (userID) VALUES (:userID)";
        $stmt = $this->conn->prepare($sql);
        // var_dump($data);
        // die();
        $stmt->bindParam(':userID', $data->userID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteOrder($id) {
        $sql = "DELETE FROM orders WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getOrder($id) {
        $sql = "SELECT * FROM orders WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function UpdateStatus($data) {
        $status = 'order';
        // var_dump($data);
        // var_dump($status);
        // die();
        $sql = "UPDATE cart SET status = :status WHERE customerID = :userID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':userID', $data->userID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}