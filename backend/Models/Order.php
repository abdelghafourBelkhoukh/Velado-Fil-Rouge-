<?php

class Order {
    private $db;
    private $conn;
    public $orderID;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addOrder($data) {
        $sql = "INSERT INTO orders (userID, totalPrice) VALUES (:userID, :totalPrice)";
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindParam(':userID', $data->userID);
        $stmt->bindParam(':totalPrice', $data->totalPrice);
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

    public function getAllOrders() {
        $sql = "SELECT o.id, o.added_at, o.status, o.totalPrice, c.firstname, c.lastname, c.city, c.address, c.country FROM `orders` o INNER JOIN customer c WHERE o.userID = c.id AND o.status = 'In processing' And o.confirmationOrder = 'In processing'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllDelivery() {
        $sql = "SELECT o.id, o.added_at, o.status, o.totalPrice, c.firstname, c.lastname, c.city, c.address, c.country FROM `orders` o INNER JOIN customer c WHERE o.userID = c.id AND o.status = 'In processing' And o.confirmationOrder = 'Accepted'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function updateOrder($data) {
        // var_dump($data);
        // die();
        $sql = "UPDATE orders SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $data->status);
        $stmt->bindParam(':id', $data->id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    public function ConfirmationOrder($data) {
        $sql = "UPDATE orders SET confirmationOrder = :status WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $data['confirmationOrder']);
        $stmt->bindParam(':id', $data['id']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}