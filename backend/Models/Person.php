<?php
require_once '../../Models/Database.php';

class Person extends Database
{
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $type;
    public $city;
    public $country;
    public $address;
    public $zip;
    public $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function Register($data){
        $sql = "INSERT INTO customer (firstName, lastName, email, password , city, country, address, zip ,type) VALUES (:firstName, :lastName, :email, :password, :city, :country, :address, :zip, :type)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    
    
    public function Login($data){
        $sql = "SELECT * FROM customer WHERE email = :email AND password = :password";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute($data)) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function Create($data){
        $sql = "INSERT INTO customer (firstname, lastname, email, password , city, country, address, zip ,type) VALUES (:firstname, :lastname, :email, :password, :city, :country, :address, :zip, :type)";
        $stmt = $this->conn->prepare($sql);
        //bind all data
        $stmt->bindParam(':firstname', $data['firstname']);
        $stmt->bindParam(':lastname', $data['lastname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password',md5($data['password']));
        $stmt->bindParam(':city', $data['city']);
        $stmt->bindParam(':country', $data['country']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':zip', $data['zip']);
        $stmt->bindParam(':type', $data['type']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteUser($id){
        $sql = "DELETE FROM customer WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ReadUsers(){
        $sql = "SELECT * FROM customer";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($row) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function UpdateUser($data){
        if ($data['password'] == '') {
            $sql = "UPDATE customer SET firstname = :firstname, lastname = :lastname, email = :email, city = :city, country = :country, address = :address, zip = :zip, type = :type WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
        } else {
            $sql = "UPDATE customer SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, city = :city, country = :country, address = :address, zip = :zip, type = :type WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':password', md5($data['password']));
        }
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':firstname', $data['firstname']);
        $stmt->bindParam(':lastname', $data['lastname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':city', $data['city']);
        $stmt->bindParam(':country', $data['country']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':zip', $data['zip']);
        $stmt->bindParam(':type', $data['type']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function RegisterDeliverer($data){
        $password = md5($data['password']);
        $sql = "INSERT INTO deliverers (firstname, lastname, email, tel, city, password) VALUES (:firstname, :lastname, :email, :tel, :city, :password)";
        $stmt = $this->conn->prepare($sql);
        //bind
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':firstname', $data['firstname']);
        $stmt->bindParam(':lastname', $data['lastname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':tel', $data['tel']);
        $stmt->bindParam(':city', $data['city']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ReadDeliverers(){
        $sql = "SELECT * FROM deliverers";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($row) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function DeleteDeliverer($id){
        $sql = "DELETE FROM deliverers WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateDeliverer($data){
        if ($data['password'] == '') {
            $sql = "UPDATE deliverers SET firstname = :firstname, lastname = :lastname, email = :email, tel = :tel, city = :city WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
        } else {
            $sql = "UPDATE deliverers SET firstname = :firstname, lastname = :lastname, email = :email, tel = :tel, city = :city, password = :password WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':password', md5($data['password']));
        }
            //bind
            $stmt->bindParam(':id', $data['id']);
            $stmt->bindParam(':firstname', $data['firstname']);
            $stmt->bindParam(':lastname', $data['lastname']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':tel', $data['tel']);
            $stmt->bindParam(':city', $data['city']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>