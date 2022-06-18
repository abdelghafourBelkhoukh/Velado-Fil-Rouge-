<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


// include database and object files
require_once '../../Models/Database.php';
require_once '../../Models/Person.php';


class PersonController
{
    // database connection and table name
    private $conn;
    public $person;
    
    // object propertie
    public function __construct($db)
    {
        $this->person = new Person($db);
    }

    public function Register()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $newData = array(
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'email' => $data['email'],
                'password' => md5($data['password']),
                'city' => $data['city'],
                'country' => $data['country'],
                'address' => $data['address'],
                'zip' => $data['zip'],
                'type' => $data['type']
            );
        // create person
        if ($this->person->Register($newData)) {

            echo json_encode(array("message" => "Person was created."));
        } else {
            echo json_encode(array("message" => "Unable to create person."));
        }
    }

    public function Login()
    {
        $data = json_decode(file_get_contents("php://input"), true);


        $newData = array(
                'email' => $data['email'],
                'password' => md5($data['password']),
                'role' => $data['role']
            );



        //check if user exists

        if ($userData = $this->person->Login($newData)) {
            echo json_encode(array(
                "UserData" => $userData,
                "message" => "User found.",
                "success" => true
            ));
        } else {
            echo json_encode(array("message" => "User not found.", "success" => false));
        }
    }


}



$database = new Database();
$db = $database->dbConnection();
$personController = new PersonController($db);

//switch case to determine which method http request it is
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'register':
                    $personController->Register();
                    break;
                default:
                    $personController->Login();
                    break;
            }
        }
        break;
    default:
        echo json_encode(array("message" => "Invalid request method."));
        break;
    }
