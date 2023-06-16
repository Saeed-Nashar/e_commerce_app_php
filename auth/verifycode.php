<?php 

include "../connect.php" ;

$email  = filterRequest("email") ; 

$verfiy = filterRequest("verifycode") ; 


$stmt = $con->prepare("SELECT * FROM user WHERE user_email = '$email' AND user_verficode = '$verfiy' ") ; 
 
$stmt->execute() ; 

$count = $stmt->rowCount() ; 

if ($count > 0) {
 
    $data = array("user_approve" => "1") ; 

    updateData("user" , $data , "user_email = '$email'");

}else {
 printFailure("verifycode not Correct") ; 

}
?>