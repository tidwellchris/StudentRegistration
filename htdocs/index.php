<?PHP
//require_once('recaptchaLib.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>GSOP Student Registration</title>
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <meta name="HandheldFriendly" content="true">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
  <!--<link href="CSS/style.css" rel="stylesheet" type="text/css" media="screen" /> -->
  <link href="CSS/view.css" rel="stylesheet" type="text/css" media="screen" />
  <script type="text/javascript" src="objects/view.js"></script>
  <script type="text/javascript" src="objects/calendar.js"></script>
  
</head>

<!-- FAVICON -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>

<!-- CHECK TO SEE IF JS IS ACTIVE ON THE BROWSER -->
<noscript>
<bold> JavaScript is turned off in your web browser. Turn it on to take full advantage of this site, then refresh the page. </bold>
</noscript>

<script type="text/javascript" src="objects/jquery-2.2.2.js"></script>
<!-- JS EMAIL CHECK -->
<script type="text/javascript">
$(document).ready(function() {
    var x_timer;    
    $("#email").keyup(function (e){
        clearTimeout(x_timer);
        var email_result = $(this).val();
        x_timer = setTimeout(function(){
            check_email_ajax(email_result);
        }, 1000);
    }); 

function check_email_ajax(email){
    $("#email-result").html('<img src="images/ajax-loader.gif" />');
    $.post('checkData.php', {'email':email}, function(data) {
      $("#email-result").html(data);
    });
}
});
</script>

<!--JS USERNAME CHECK -->
<script type="text/javascript">
$(document).ready(function() {
    var x_timer;    
    $("#uname").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_username_ajax(user_name);
        }, 1000);
    }); 

function check_username_ajax(uname){
    $("#user-result").html('<img src="images/ajax-loader.gif" />');
    $.post('checkData.php', {'uname':uname}, function(data) {
      $("#user-result").html(data);
    });
}
});
</script>



<body id="main_body" >

  <img id="top" src="images/top.png" alt="">
  <div id="form_container">

    <h1><a>GSOP Registration</a></h1>
    <form id="form_1115316" class="appnitro"  method="post" action="insert.php">
          <div class="form_description">
       <!--<h2>GSOP Student Registration</h2> -->    
       <tr><right><img id="logo" src="images/gsop.png" ></right></tr>
      <p>New Student Registration Form</p>
    </div>
      <ul >

          <li id="li_1" >
    <label class="description" for="fname">*First Name </label>
    <div>
      <input id="fname" name="fname" class="element text medium" type="text" maxlength="50" value=""/ required>
    </div><p class="guidelines" id="guide_1"><small>Enter Your First Name</small></p>
    </li>    <li id="li_2" >
    <label class="description" for="mname">Middle Name</label>
    <div>
      <input id="mname" name="mname" class="element text medium" type="text" maxlength="50" value=""/>
    </div><p class="guidelines" id="mname"><small>Enter Your Middle Name</small></p>
    </li>    <li id="li_3" >
    <label class="description" for="lname">*Last Name </label>
    <div>
      <input id="lname" name="lname" class="element text medium" type="text" maxlength="50" value=""/ required>
    </div><p class="guidelines" id="guide_3"><small>Enter Your Last Name</small></p>
    <li id="li_19" >
    <label class="description" for="nname">Nick Name </label>
    <div>
    <input id="nname" name="nname" class="element text medium" type="text" maxlength="50" value=""/>
  </div><p class="guidelines" id="guide_1"><small>Nick Name</small></p>


    </li>    <li id="li_18" >
    <label class="description" for="gender">*Gender</label>
    <div>
    <select class="element select medium" id="gender" name="gender" required>
      <option value="" selected="selected"></option>
<option value="Male" >Male</option>
<option value="Female" >Female</option>

    </select>
    </div>
    </li>    <li id="li_9" >
    <label class="description" for="element_9">*Date of Birth </label>
    <span>
      <input id="element_9_1" name="element_9_1" class="element text" size="2" maxlength="2" value="" type="text" required> -
      <label for="element_9_1">MM</label>
    </span>
    <span>
      <input id="element_9_2" name="element_9_2" class="element text" size="2" maxlength="2" value="" type="text" required> -
      <label for="element_9_2">DD</label>
    </span>
    <span>
       <input id="element_9_3" name="element_9_3" class="element text" size="4" maxlength="4" value="" type="text" required>
      <label for="element_9_3">YYYY</label>
    </span>

    <span id="calendar_9">
      <img id="cal_img_9" class="datepicker" src="images/calendar.gif" alt="Pick a date.">
    </span>
    <script type="text/javascript">
      Calendar.setup({
      inputField   : "element_9_3",
      baseField    : "element_9",
      displayArea  : "calendar_9",
      button     : "cal_img_9",
      ifFormat   : "%B %e, %Y",
      onSelect   : selectDate
      });
    </script>

    </li>    <li id="li_14" >
    <label class="description" for="lang">*Primary Language </label>
    <div>
      <input id="lang" name="lang" class="element text medium" type="text" maxlength="30" value=""/ required>
    </div>
    </li>    <li id="li_15" >
    <label class="description" for="slang">Secondary Language </label>
    <div>
      <input id="slang" name="slang" class="element text medium" type="text" maxlength="30" value=""/>
    </div>
    </li>    <li id="li_21" >
    <label class="description" for="campus" required>*Campus </label>
    <div>
    <select class="element select medium" id="campus" name="campus">
      <option value="" selected="selected"></option>
<option value="1" >Georgia School of Preaching</option>

    </select>
  </div><p class="guidelines" id="campus"><small>Indicate Georgia School of Preaching for now</small></p>
    </li>    <li id="li_20" >
    <label class="description" for="cpath">*Course Path </label>
    <div>
    <select class="element select medium" id="cpath" name="cpath" required>
      <option value="" selected="selected"></option>
<option value="Preaching Certificate" >Preaching Certificate</option>
<option value="Biblical Studies Certificate" >Biblical Studies Certificate</option>
<option value="Audit" >Audit</option>

    </select>
    </div>
    </li>    <li id="li_4" >
    <label class="description" for="st_address">*Address </label>
    <div>
      <input id="st_address" name="st_address" class="element text medium" type="text" maxlength="60" value=""/ required>
    </div><p class="guidelines" id="st_address"><small>Street Address</small></p>
    </li>    <li id="li_5" >
    <label class="description" for="city">*City </label>
    <div>
      <input id="city" name="city" class="element text medium" type="text" maxlength="50" value=""/ required>
    </div><p class="guidelines" id="city"><small>City</small></p>
    </li>    <li id="li_19" >
    <label class="description" for="state">*State </label>
    <div>
    <select class="element select medium" id="state" name="state" required>
      <option value="" selected="selected"></option>
        <option value="AK">AK</option>
        <option value="AL">AL</option>
        <option value="AR">AR</option>
        <option value="AZ">AZ</option>
        <option value="CA">CA</option>
        <option value="CO">CO</option>
        <option value="CT">CT</option>
        <option value="DC">DC</option>
        <option value="DE">DE</option>
        <option value="FL">FL</option>
        <option value="GA">GA</option>
        <option value="HI">HI</option>
        <option value="IA">IA</option>
        <option value="ID">ID</option>
        <option value="IL">IL</option>
        <option value="IN">IN</option>
        <option value="KS">KS</option>
        <option value="KY">KY</option>
        <option value="LA">LA</option>
        <option value="MA">MA</option>
        <option value="MD">MD</option>
        <option value="ME">ME</option>
        <option value="MI">MI</option>
        <option value="MN">MN</option>
        <option value="MO">MO</option>
        <option value="MS">MS</option>
        <option value="MT">MT</option>
        <option value="NC">NC</option>
        <option value="ND">ND</option>
        <option value="NE">NE</option>
        <option value="NH">NH</option>
        <option value="NJ">NJ</option>
        <option value="NM">NM</option>
        <option value="NV">NV</option>
        <option value="NY">NY</option>
        <option value="OH">OH</option>
        <option value="OK">OK</option>
        <option value="OR">OR</option>
        <option value="PA">PA</option>
        <option value="RI">RI</option>
        <option value="SC">SC</option>
        <option value="SD">SD</option>
        <option value="TN">TN</option>
        <option value="TX">TX</option>
        <option value="UT">UT</option>
        <option value="VA">VA</option>
        <option value="VT">VT</option>
        <option value="WA">WA</option>
        <option value="WI">WI</option>
        <option value="WV">WV</option>
        <option value="WY">WY</option>

    </select>
    </div>
    </li>    <li id="li_6" >
    <label class="description" for="zip">*Zip Code </label>
    <div>
      <input id="zip" name="zip" class="element text medium" type="text" maxlength="255" value=""/ required>
    </div>
    </li>    <li id="li_7" >
    <label class="description" for="element_7">*Primary Phone Number </label>
    <span>
      <input id="element_7_1" name="element_7_1" class="element text" size="3" maxlength="3" value="" type="text" required> -
      <label for="element_7_1">###</label>
    </span>
    <span>
      <input id="element_7_2" name="element_7_2" class="element text" size="3" maxlength="3" value="" type="text" required> -
      <label for="element_7_2">###</label>
    </span>
    <span>
       <input id="element_7_3" name="element_7_3" class="element text" size="4" maxlength="4" value="" type="text" required>
      <label for="element_7_3">####</label>
    </span>

    </li>    <li id="li_8" >
    <label class="description" for="email">*Primary Email </label>
    <div>
      <input id="email" name="email" class="element text medium" type="text" maxlength="50" value=""/ required><span id="email-result"></span>
    </div>
    </li>    <li id="li_22" >
    <label class="description" for="econtact_relat">*Emergency Contact Relationship </label>
    <div>
    <select class="element select medium" id="econtact_relat" name="econtact_relat" required>
      <option value="" selected="selected"></option>
<option value="Father" >Father</option>
<option value="Mother" >Mother</option>
<option value="Step Father" >Step Father</option>
<option value="Step Mother" >Step Mother</option>
<option value="Grandfather" >Grandfather</option>
<option value="Grandmother" >Grandmother</option>
<option value="Legal Guardian" >Legal Guardian</option>
<option value="Other Family Member" >Other Family Member</option>
<option value="Friend" >Friend</option>
<option value="Husband" >Husband</option>
<option value="Wife" >Wife</option>
<option value="Other" >Other</option>

    </select>
    </div>
    </li>    <li id="li_10" >
    <label class="description" for="efname">*Emergency Contact First Name </label>
    <div>
      <input id="efname" name="efname" class="element text medium" type="text" maxlength="30" value=""/ required>
    </div>
    </li>    <li id="li_11" >
    <label class="description" for="elname">*Emergency Contact Last Name </label>
    <div>
      <input id="elname" name="elname" class="element text medium" type="text" maxlength="30" value=""/ required>
    </div>
    </li>    <li id="li_12" >
    <label class="description" for="element_12">*Emergency Contact Phone Number </label>
    <span>
      <input id="element_12_1" name="element_12_1" class="element text" size="3" maxlength="3" value="" type="text" required> -
      <label for="element_12_1">###</label>
    </span>
    <span>
      <input id="element_12_2" name="element_12_2" class="element text" size="3" maxlength="3" value="" type="text" required> -
      <label for="element_12_2">###</label>
    </span>
    <span>
       <input id="element_12_3" name="element_12_3" class="element text" size="4" maxlength="4" value="" type="text" required>
      <label for="element_12_3">####</label>
    </span>

    </li>    <li id="li_13" >
    <label class="description" for="element_13">*Emergency Contact Phone Number 2 </label>
    <span>
      <input id="element_13_1" name="element_13_1" class="element text" size="3" maxlength="3" value="" type="text" required> -
      <label for="element_13_1">###</label>
    </span>
    <span>
      <input id="element_13_2" name="element_13_2" class="element text" size="3" maxlength="3" value="" type="text" required> -
      <label for="element_13_2">###</label>
    </span>
    <span>
       <input id="element_13_3" name="element_13_3" class="element text" size="4" maxlength="4" value="" type="text" required>
      <label for="element_13_3">####</label>
    </span>

    </li>    <li id="li_16" >
    <label class="description" for="eemail">Emergency Contact Email </label>
    <div>
      <input id="eemail" name="eemail" class="element text medium" type="text" maxlength="50" value=""/ required>
    </div>
    </li>    <li id="li_17" >
    <label class="description" for="medical">Any Medical Condition </label>
    <div>
      <input id="medical" name="medical" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li>
  </li>    <li id="li_19" >
  <label class="description" for="uname">*Desired Username</label>
  <div>
    <input id="uname" name="uname" class="element text medium" type="text" maxlength="50" value="" / required> <span id="user-result"></span>
  </div><p class="guidelines" id="uname"><small>Desired Username</small></p>
  </li>    <li id="li_20" >
<label class="description" for="pw">*Password</label>
<div>
  <input type ="password" id="pw" name="pw" class="element text medium" type="text" maxlength="50" value=""/ required>
</div><p class="guidelines" id="pw"><small>Password</small></p>
<div class="g-recaptcha" data-sitekey="6LdB-BwTAAAAAHAJwn8Mh21iKgfJ88IFkBft_kAI"></div>

       <li class="buttons">
          <input type="hidden" name="form_id" value="1115316" />
        <input class="sendButton" type="submit" name="Submit" value="Submit">
        <!--<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" /> -->
    </li>
      </ul>
    </form>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <div id="footer">
      <a href="http://www.gsoponline.org">GA School of Preaching</a>
    </div>
  </div>
  <img id="bottom" src="images/bottom.png" alt="">
  
  </body>
</html>

