<?php

class Order {
    private $db;
    private $conn;
    public $orderID;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addOrder($data) {
        $sql = "INSERT INTO orders (userID) VALUES (:userID)";
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindParam(':userID', $data->userID);
        if ($stmt->execute()) {
            $sql = "SELECT id FROM orders  ORDER BY ID DESC LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $this->orderID = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $this->orderID;
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
        $sql = "UPDATE cart SET status = :status, orderID = :orderID WHERE customerID = :userID AND status = 'cart'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':userID', $data->userID);
        $stmt->bindParam(':orderID', $this->orderID[0]['id']);
        
        if ($stmt->execute()) {
            $this->orderID = '';
            return true;
        } else {
            return false;
        }
    }
}