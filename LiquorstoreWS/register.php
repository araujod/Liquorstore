<?php
require_once 'include/db_functions.php';
$db = new DB_Functions();

/**
 * Endpoint : http://<domain>/liquorstoreWS/register.php
 * Method   : POST
 * Params   : phone, name, birthdate, address, email
 * Result   : JSON
 */

$response = array();
if(isset($_POST['phone']) &&
   isset($_POST['name']) && 
   isset($_POST['birthdate']) &&
   isset($_POST['address']) &&
   isset($_POST['email']))
{
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    if($db->checkExistsUser($email))
    {
        $response["error_msg"] = "User $email already exists";
        echo json_encode($response);
    }
    else{
        // Create new user
        $user = $db->registerNewUser($phone, $name,$birthdate,$address,$email);
        if($user){
            $response["phone"] = $user["Phone"];
            $response["name"] = $user["Name"];
            $response["birthdate"] = $user["Birthdate"];
            $response["address"] = $user["Address"];
            $response["email"] = $user["email"];
            echo json_encode($response);
        }
        else
        {
            $response["error_msg"] = "Unknow erro occurred in registration!!!";
            echo json_encode($response);
        }
    }
}
else{
    
        $response["error_msg"] = "Required parameter (phone, name, birthdate, address, email) is missing!";
        echo json_encode($response);
    
}
?>