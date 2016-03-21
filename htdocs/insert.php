<?php
require_once('../config/db.php');
// Get values from form
$fname=$POST['fname'];
$mname=$POST['mname'];
$lname=$POST['lname'];
$nname=$POST['nname'];
$gender=$POST['gender'];
$dob=$POST['element_9'];
$lang=$POST['lang'];
$slang=$POST['slang'];
$campus=$POST['campus'];
$cpath=$POST['cpath'];
$st_address=$POST['st_address'];
$city=$POST['city'];
$state=$POST['state'];
$zip=$POST['zip'];
$phone=$POST['element_7']; //phone number
$email=$POST['email'];
$erelat=$POST['econtact_relat']; //Emergency Information Begin
$efname=$POST['efname'];
$elname=$POST['elname'];
$ephn1=$POST['element_12'];
$ephn2=$POST['element_13'];
$eemail=$POST['eemail']; //Emergency Information End
$medical=$POST['medical'];
$uname=$POST['uname'];
$pw=$POST['pw'];

//DB insert st are here

$stmt = $db->prepare('INSERT INTO Persons (firstname, lastname, age) VALUES (:first_name, :last_name, :age)');

$stmt->execute(array(':first_name' => $first_name, ':last_name' => $last_name, ':age' => $age));

//Send a confirmation email
$to = "youremail@gmail.com";
$subject = "Future Tutorials Contact Form Test";
$message = " Name: " . $name . "\r\n City: " . $city . "\r\n Phone: " . $phone . "\r\n Email: " . $email;


$from = "FutureTutorials";
$headers = "From:" . $from . "\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";

if(@mail($to,$subject,$message,$headers))
{
  print "<script>document.location.href='http://demo.ftutorials.com/html5-contact-form/success.html';</script>";
  // Created by Future Tutorials
}else{
  echo "Error! Please try again.";
}



?>
