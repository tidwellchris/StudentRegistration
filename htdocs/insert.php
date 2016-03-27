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

// FIRST INSERT STATEMENT VARIABLES, ALSO RESUSABLE FOR THE OTHER INSERT STATEMENTS
// GENERATE NEW STUDENT ID
$sql1 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'students'";
$sql1st = $db->prepare($sql1);
$sql1st->execute();
$obj1 = $sql1st->fetchObject();
$newsid = $obj1->auto_increment;

// FIRST DB INSERT STATEMENT
// $stmt = $db->prepare('INSERT INTO students (student_id, last_name, first_name, middle_name, gender, common_name, birthdate, language, custom_11, email, 										phone, last_updated, custom_10) VALUES (:newsid, :lname, :fname, :mname, :gender, :nname, :dob, :lang, :slang, :email, :phone, :now, :cpath)');

// $stmt->execute(array(':newsid' => $newsid, ':lname' => $lname, ':fname' => $fname, ':mname' => $mname, ':gender' => $gender, ':nname' => $nname, ':dob' => 					$dob, ':lang' => $lang, ':slang' => $slang, ':email' => $email, ':phone' => $phone, ':now' => $now, ':cpath' => $cpath));

//COLLECT NEW VARIABLES FOR SECOND INSERT STATEMENTS, ALSO REUSABLE OF COURSE
//NEW STUDENT ENROLLMENT ID
$sql2 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_enrollment' ";
$sql2st = $db->prepare($sql2);
$sql2st->execute();
$obj2 = $sql2st->fetchObject();
$stenid = $obj2->auto_increment;

// FIND THE CORRECT SCHOOL YEAR
$sql3 = "SELECT max(syear) FROM school_years";
$sql3st = $db->prepare($sql3);
$sql3st->execute();
$obj3 = $sql3st->fetchObject();
$syear = $obj3->auto_increment;

// GET THE CURRENT YEAR
$sql4 = "SELECT year(curdate())";
$sql4st = $db->prepare($sql4);
$sql4st->execute();
$obj4 = $sql4st->fetchObject();
$syear = $obj4->auto_increment;

// GET THE CURRENT DATE
$sql5 = "SELECT curdate()";
$sql5st = $db->prepare($sql5);
$sql5st->execute();
$obj5 = $sql5st->fetchObject();
$syear = $obj5->auto_increment;

// GET THE CURRENT STUDENT ID WE CREATED IN THE FIRST STATEMENT

//$stid = $db->prepare("SELECT student_id FROM students WHERE last_name=':lname' AND Birthdate=':dob'");
//$stid-> execute(array(':lname' => $lname, ':dob' => $dob));  
// $schcalstmt = $db->prepare("SELECT calendar_id FROM school_calendars WHERE school_id = ':campus' AND default_calendar ='Y'");
// $schcalstmt -> execute(array(':campus' => $campus));
// $schcal = $schcalstmt->fetch(PDO::FETCH_ASSOC);


//mysql_close($db);


echo "This is the Campus Value ======> $campus";
//echo "What is this ohhhh ----> $schcal SCHOOL CALENDAR";

echo "this is the next id -> $newsid ";
// echo "This is now -> $now";
// echo "this is the phone number - > $phone ";
// echo "This is the DOB ---> $dob";
//First DB Insert Statement




$newsid = null
//$db = null;

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
