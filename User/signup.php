<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);


// set user property values
$user->name = $_POST['name'];
$user->email=$_POST['email'];
$user->mobile_no=$_POST['mobile_no'];
$user->password = base64_encode($_POST['password']);
 
// create the user
if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
        "username" => $user->username
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "User already exists!"
    );
}
print_r(json_encode($user_arr));
?>