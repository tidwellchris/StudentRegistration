<?php
require_once('../config/db.php');
// Get values from form
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$nname=$_POST['nname'];
$gender=$_POST['gender'];
$dob=$_POST['element_9_3'] . '-' . $_POST['element_9_1'] . '-' . $_POST['element_9_2'];
$lang=$_POST['lang'];
$slang=$_POST['slang'];
$campus=$_POST['campus'];
$cpath=$_POST['cpath'];
$st_address=$_POST['st_address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$phone=$_POST['element_7_1'] . '-' . $_POST['element_7_2'] . '-' . $_POST['element_7_3']; //phone number
$email=$_POST['email'];
$erelat=$_POST['econtact_relat']; //Emergency Information Begin
$efname=$_POST['efname'];
$elname=$_POST['elname'];
$ephn1=$_POST['element_12_1'] . '-' . $_POST['element_12_2'] . '-' . $_POST['element_12_3'];
$ephn2=$_POST['element_13_1'] . '-' . $_POST['element_13_2'] . '-' . $_POST['element_13_3'];
$eemail=$_POST['eemail']; //Emergency Information End
$medical=$_POST['medical'];
$uname=$_POST['uname'];
$pw=$_POST['pw'];


//Strip stripslashes
$fname=stripslashes($fname);
$mname=stripslashes($mname);
$lname=stripslashes($lname);
$nname=stripslashes($nname);
$gender=stripslashes($gender);
$dob=stripslashes($dob);
$lang=stripslashes($lang);
$slang=stripslashes($slang);
$campus=stripslashes($campus);
$cpath=stripslashes($cpath);
$st_address=stripslashes($st_address);
$city=stripslashes($city);
$state=stripslashes($state);
$zip=stripslashes($zip);
$phone=stripslashes($phone); //phone number
$email=stripslashes($email);
$erelat=stripslashes($erelat); //Emergency Information Begin
$efname=stripslashes($efname);
$elname=stripslashes($elname);
$ephn1=stripslashes($ephn1);
$ephn2=stripslashes($ephn2);
$eemail=stripslashes($eemail); //Emergency Information End
$medical=stripslashes($medical);
$uname=stripslashes($uname);
//$pw=stripslashes['pw'];
//$read = mysql_result(mysql_query("SELECT read FROM users WHERE id = $id"),0);
//First DB Insert Statement Values
$sid= mysql_result(mysql_query("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'students'"),0);
mysql_close($link);

echo "this is the next id -> $sid ";
echo "this is the phone number - > $phone ";
echo "This is the DOB ---> $dob";
//First DB Insert Statement

//$stmt = $db->prepare('INSERT INTO students () VALUES ()');

//$stmt = $db->prepare('INSERT INTO Persons (firstname, lastname, age) VALUES (:first_name, :last_name, :age)');

//$stmt->execute(array(':first_name' => $first_name, ':last_name' => $last_name, ':age' => $age));

//$db->disconnect();
//Send a confirmation email in complete loop
// $to = "youremail@gmail.com";
// $subject = "You Have Successfully Registered";
// $message = " Hi " . $fname . "\r\n City: " . $city . "\r\n Phone: " . $phone . "\r\n Email: " . $email;
//
//
// $from = "info@gsoponline.org";
// $headers = "From:" . $from . "\r\n";
// $headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
//
// if(@mail($to,$subject,$message,$headers))
// {
//   print "<script>document.location.href='http://demo.ftutorials.com/html5-contact-form/success.html';</script>";
//   // Created by Future Tutorials
// }else{
//   echo "Error! Please try again.";
// }
//
//

?>
