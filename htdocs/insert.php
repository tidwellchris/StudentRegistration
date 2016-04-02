<?php
require_once('../config/db.php');
date_default_timezone_set("America/New_York");

// GET VAULES FROM THE FORM POST
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


// STRIP SLASHES BECAUSE WE DO NOT TRUST ANYONE
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
$pwhsd=md5('$pw');
/*******************************************************************************************
*  FIRST INSERT STATEMENT AND VARIABLES BEGIN                                              *
*******************************************************************************************/
// GENERATE NEW STUDENT ID                      
$sql1 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'students'";
$sql1st = $db->prepare($sql1);
$sql1st->execute();
$obj1 = $sql1st->fetchObject();
$newsid = $obj1->auto_increment;

// GET THE CURRENT DTTM AT THIS MOMENT
$now = date("Y-m-d h:i:s");

// FIRST DB INSERT STATEMENT
$sqll = "INSERT INTO students (student_id, last_name, first_name, middle_name, gender, common_name, birthdate, language, custom_11, email, phone, last_updated, custom_10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
$stmtl = $db->prepare($sqll);
$stmtl->execute(array($newsid, $lname, $fname, $mname, $gender, $nname, $dob, $lang, $slang, $email, $phone, $now, $cpath));

echo "1 statement completed";
/*******************************************************************************************
*  FIRST INSERT STATEMENT AND VARIABLES END                                                *
*******************************************************************************************/

/*******************************************************************************************
*  SECOND INSERT STATEMENT AND VARIABLES BEGIN                                             *
*******************************************************************************************/
//COLLECT NEW VARIABLES FOR SECOND INSERT STATEMENTS, ALSO REUSABLE OF COURSE
//NEW STUDENT ENROLLMENT ID
$sql2 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_enrollment' ";
$sql2st = $db->prepare($sql2);
$sql2st->execute();
$obj2 = $sql2st->fetchObject();
$stenid = $obj2->auto_increment;

// FIND THE CORRECT SCHOOL YEAR
$sql3 = "SELECT max(syear) AS syear FROM school_years";
$sql3st = $db->prepare($sql3);	
$sql3st->execute();
$obj3 = $sql3st->fetchObject();
$syear = $obj3->syear;

// GET THE CURRENT YEAR
$curyear = date("Y");

// GET THE CURRENT DATE
$currdate = date("Y-m-d");

// GET THE CURRENT STUDENT ID WE CREATED IN THE FIRST STATEMENT
//$newsid

// ENROLLMENT CODE IS ALWAYS 2
$enrcd = 2;

//GET THE CORRECT CALENDAR FROM THE STUDENTS SCHOOL
$sql7 = "SELECT calendar_id AS cal_id FROM school_calendars WHERE school_id = ? AND default_calendar = ?";
$sql7st = $db->prepare($sql7);
$sql7st->execute(array($campus, 'y'));
$calenid = $sql7st->fetchColumn();
//echo "Calendar ID = = = > $calenid";

// GET THE CURRENT DATE AND TIMESTAMPS
// $now

// SECOND INSERT STATEMENT
$sql8 = "INSERT INTO student_enrollment (id, syear, school_id, student_id, grade_id, start_date , enrollment_code , next_school, calendar_id, last_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt8 = $db->prepare($sql8);
$stmt8->execute(array($stenid, $syear, $campus, $newsid, $curyear, $currdate, $enrcd, $campus, $calenid, $now));
echo "2 statement completed";
/*******************************************************************************************
*  SECOND INSERT STATEMENT AND VARIABLES END                                               *
*******************************************************************************************/

/*******************************************************************************************
*  THIRD INSERT STATEMENT AND VARIABLES BEGIN                                              * 
*******************************************************************************************/
// DEFINE ANY VARIABLE NEEDED

// NEXT ID KEY FOR PEOPLE 
$sql9 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'people' ";
$sql9st = $db->prepare($sql9);
$sql9st->execute();
$obj9 = $sql9st->fetchObject();
$plpid = $obj9->auto_increment;

// PROFILE ID
$proid = 4;

// THIRD INSERT STATEMENT
$sql10 = "INSERT INTO people (staff_id, current_school_id, first_name, last_name, home_phone, cell_phone, email, profile, profile_id, last_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt10 = $db->prepare($sql10);
$stmt10->execute(array($plpid, $campus, $efname, $elname, $ephn1, $ephn2, $eemail, $proid, $now ));
echo "3 statement completed";
/*******************************************************************************************
*  THIRD INSERT STATEMENT AND VARIABLES END                                                *
*******************************************************************************************/

/*******************************************************************************************
*  FOURTH INSERT STATEMENT AND VARIABLES BEGIN                                             * 
*******************************************************************************************/
// DEFINE ANY VARIABLE NEEDED

// NEXT ID KEY FOR STUDENT ADDRESS 
$sql11 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_address' ";
$sql11st = $db->prepare($sql11);
$sql11st->execute();
$obj11 = $sql11st->fetchObject();
$stadd1 = $obj11->auto_increment;

// DEFINE THE TYPE OF ADDRESS
$type1 = 'Home Address';

// FOURTH INSERT STATEMENT
$sql12 = "INSERT INTO student_address (id, student_id, syear, school_id, street_address_1, city, state, zipcode, type, last_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt12 = $db->prepare($sql12);
$stmt12->execute(array($stadd1, $newsid, $syear, $st_address, $city, $state, $zip, $type1, $now));

echo "4 statement completed";
/*******************************************************************************************
*  FOURTH INSERT STATEMENT AND VARIABLES END                                               *
*******************************************************************************************/

/*******************************************************************************************
*  FIFTH INSERT STATEMENT AND VARIABLES BEGIN                                              * 
*******************************************************************************************/
// DEFINE ANY VARIABLE NEEDED

// NEXT ID KEY FOR STUDENT ADDRESS 
$sql13 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_address' ";
$sql13st = $db->prepare($sql13);
$sql13st->execute();
$obj13 = $sql13st->fetchObject();
$stadd2 = $obj13->auto_increment;

// DEFINE THE TYPE OF ADDRESS
$type2 = 'Mail';



// FIFTH INSERT STATEMENT
$sql14 = "INSERT INTO student_address (id, student_id, syear, school_id, street_address_1, city, state, zipcode, type, last_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt14 = $db->prepare($sql14);
$stmt14->execute(array($stadd2, $newsid, $syear, $st_address, $city, $state, $zip, $type2, $now));

echo "5 statement completed";
/*******************************************************************************************
*  FIFTH INSERT STATEMENT AND VARIABLES END                                                *
*******************************************************************************************/

/*******************************************************************************************
*  SIXTH INSERT STATEMENT AND VARIABLES BEGIN                                              * 
*******************************************************************************************/
// DEFINE ANY VARIABLE NEEDED

// NEXT ID KEY FOR STUDENT ADDRESS 
$sql15 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_address' ";
$sql15st = $db->prepare($sql15);
$sql15st->execute();
$obj15 = $sql15st->fetchObject();
$stadd3 = $obj15->auto_increment;

// DEFINE THE TYPE OF ADDRESS
$type3 = 'Primary';

// SIXTH INSERT STATEMENT
$sql16 = "INSERT INTO student_address (id, student_id, syear, school_id, street_address_1, city, state, zipcode, type, people_id last_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt16 = $db->prepare($sql16);
$stmt16->execute(array($stadd3, $newsid, $syear, $st_address, $city, $state, $zip, $type3, $plpid $now));

echo "6 statement completed";
/*******************************************************************************************
*  SIXTH INSERT STATEMENT AND VARIABLES END                                                *
*******************************************************************************************/


/*******************************************************************************************
*  SEVENTH INSERT STATEMENT AND VARIABLES BEGIN                                            * 
*******************************************************************************************/
// DEFINE ANY VARIABLE NEEDED

// NEXT ID KEY FOR STUDENT ADDRESS 
$sql17 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_address' ";
$sql17st = $db->prepare($sql17);
$sql17st->execute();
$obj17 = $sql17st->fetchObject();
$stadd4 = $obj17->auto_increment;

// DEFINE tHE TYPE OF ADDRESS
$type4 = 'Secondary';

// SEVENTH INSERT STATEMENT
$sql18 = "INSERT INTO student_address (id, student_id, syear, school_id, street_address_1, city, state, zipcode, type, people_id last_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt18 = $db->prepare($sql18);
$stmt18->execute(array($stadd4, $newsid, $syear, $st_address, $city, $state, $zip, $type4, $plpid $now));

echo "7 statement completed";
/*******************************************************************************************
*  SEVENTH INSERT STATEMENT AND VARIABLES END                                              *
*******************************************************************************************/

/*******************************************************************************************
*  EIGHTH INSERT STATEMENT AND VARIABLES BEGIN                                             * 
*******************************************************************************************/
// DEFINE ANY VARIABLE NEEDED

// NEXT ID KEY FOR STUDENT ADDRESS 
$sql19 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_medical_alerts' ";
$sql19st = $db->prepare($sql19);
$sql19st->execute();
$obj19 = $sql19st->fetchObject();
$stmedalrt = $obj19->auto_increment;

// EIGHTH INSERT STATEMENT
$sql20 = "INSERT INTO student_medical_alerts (id, student_id, title, alert_date, last_updated) VALUES (?, ?, ?, ?, ?)";
$stmt20 = $db->prepare($sql20);
$stmt20->execute(array($stmedalrt, $newsid, $medical, $currdate, $now));

echo "8 statement completed";
/*******************************************************************************************
*  EIGHTH INSERT STATEMENT AND VARIABLES END                                               *
*******************************************************************************************/

/*******************************************************************************************
*  NINTH INSERT STATEMENT AND VARIABLES BEGIN                                              * 
*******************************************************************************************/
// DEFINE ANY VARIABLE NEEDED

// NEXT ID KEY FOR STUDENT ADDRESS 
$sql21 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'login_authentication' ";
$sql21st = $db->prepare($sql21);
$sql21st->execute();
$obj21 = $sql21st->fetchObject();
$login = $obj21->auto_increment;

// PROFILE ID
$login_pro = 3;


// NINTH INSERT STATEMENT
$sql22 = "INSERT INTO login_authentication (id, user_id, profile_id, username, password, last_updated) VALUES (?, ?, ?, ?, ?, ?)";
$stmt22 = $db->prepare($sql22);
$stmt22->execute(array($login, $newsid, $login_pro, $uname, $pwhsd, $now));

echo "9 statement completed";
/*******************************************************************************************
*  NINTH INSERT STATEMENT AND VARIABLES END                                                *
*******************************************************************************************/



//mysql_close($db);


echo "This is the Campus Value ======> $campus";
//echo "What is this ohhhh ----> $schcal SCHOOL CALENDAR";

//echo "this is the next id -> $newsid ";
// echo "This is now -> $now";
// echo "this is the phone number - > $phone ";
// echo "This is the DOB ---> $dob";
//First DB Insert Statement




$db = null;
$db->disconnect();


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
