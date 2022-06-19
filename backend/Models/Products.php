<?php
//connection to database
require_once '../../Models/Database.php';


//class products

class Products extends Database{
    public $name;
    public $price;
    public $description;
    public $image;
    public $category;
    public $quantity;
    public $conn;
    public $bestSells = 0;
    public $bestOffer = 0;
    public $bestProduct = 0;

    public function __construct($db){
        $this->conn = $db;
    }

    public function create($data, $image){
        // var_dump($data);
        // die();
        $sql = "INSERT INTO products (name, price, description, image, category, quantity, rank) VALUES (:name, :price, :description, :image, :category, :quantity , :rank)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':quantity', $data['quantity']);
        $stmt->bindParam(':rank', $data['rank']);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function read(){
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }

    public function read_one($id){
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }

    public function update($data,$image){
        // var_dump($data);
        // var_dump($image);
        // die();

        if($image === null){
            $sql = "UPDATE products SET name = :name, price = :price, description = :description, category = :category, rank = :rank WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
        }else{
            $sql = "UPDATE products SET name = :name, price = :price, description = :description, image = :image, category = :category, rank = :rank WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':image', $image);
        }

        $stmt->bindParam(':rank', $data['rank']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':id', $data['id']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($id){
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateQuantity($data){
       
        $sql = "UPDATE products SET quantity = :quantity WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $data['id']);
        $stmt->bindparam(':quantity', $data['quantity']) ;

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}







?>