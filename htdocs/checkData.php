<?php
require_once('../config/db.php');


//CHECKING THE EMAIL ADDRESS AVAILABILITY	
if(isset($_POST["email"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    
    
    $emailchk = stripslashes($_POST['email']);
    $sqlstatement1 = "SELECT count(*) AS email_cnt FROM students WHERE email= ?";
    $statement1 = $db->prepare($sqlstatement1);
    $statement1->execute(array($emailchk));
    $row1 = $statement1->fetchObject();
    $email_count = $row1->email_cnt;

    if($email_count > 0){
    	echo "Email already taken";
        die('<img src="images/not-available.png" />');
    }else{
        die('<img src="images/available.png" />');
    }
}


// CHECKING THE USERNAME AVAILABILITY
if(isset($_POST["uname"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    
    
    $username = stripslashes($_POST['uname']);
    $sqlstatement = "SELECT count(*) AS cnt FROM login_authentication WHERE username= ?";
    $statement = $db->prepare($sqlstatement);
    $statement->execute(array($username));
    $row = $statement->fetchObject();
    $user_count = $row->cnt;

    if($user_count > 0){
    	echo "Username already taken";
        die('<img src="images/not-available.png" />');
    }else{
        die('<img src="images/available.png" />');
    }
}




?>