<?php



include "../connect.php";



$username = filterRequest("username");

$password = sha1("password");

$email = filterRequest("email");

$phone = filterRequest("phone");
$verfiycode     = rand(10000 , 99999);



$stmt = $con->prepare(" SELECT * FROM `user` WHERE `user_email` = ? OR `user_phone` = ? ");

$stmt->execute(array($email, $phone));

$count = $stmt->rowCount();

if ($count > 0) {

    printFailure("PHONE OR EMAIL exist");

} else {



    $data = array(

        "user_name" => $username,

        "user_password" => $password,

        "user_email" => $email,

        "user_phone" => $phone,

        "user_verficode" => $verfiycode,

    );
    sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $verfiycode") ;
    insertData("user" , $data) ; 



}