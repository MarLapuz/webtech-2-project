<?php
error_reporting(0);
session_start();
if (isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) == 'Patient'){
    $dbconnect = mysqli_connect("localhost", "root", "");
    mysqli_select_db($dbconnect, "dbhospital");
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
    if (empty($_POST["Gender"])) {
    $error = "<script type ='text/javascript'> alert ('Please select your gender. Thank you!')</script>";
	echo $error;
  }
    if (strlen ($_POST["PhoneNumber"]) != 11) {
    $error = "<script type ='text/javascript'> alert ('Please input 11 digits only for your phone number. Thank you!')</script>";
	echo $error;
  }
    if ($_POST["Status"] === 'Select Status') {
    $error = "<script type ='text/javascript'> alert ('Please select your status. Thank you!')</script>";
	echo $error;
  }
    if ($_POST["symptoms"] === 'Select Symptom') {
    $error = "<script type ='text/javascript'> alert ('What symptoms do you feel?')</script>";
	echo $error;
  }
    if (empty($_POST["Ggender"])) {
    $error = "<script type ='text/javascript'> alert ('Please select your guardian's gender. Thank you!')</script>";
	echo $error;
  }
    if (strlen ($_POST["GPhoneN"]) != 11) {
    $error = "<script type ='text/javascript'> alert ('Please input 11 digits only for your guardian's phone number. Thank you!')</script>";
	echo $error;
  }
  else {
 $con = mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    
  mysqli_select_db($con, "dbhospital") or die(mysqli_error());
      
        $Patient_ID =$_SESSION['Patient_ID'];
        $Account_ID =$_SESSION['User_ID'];
        $Fname = ucfirst($_POST['Fname']);
        $Lname = ucfirst($_POST['Lname']);
        $Gender = $_POST['Gender'];
        $Age = $_POST['Age'];
        $PhoneN = $_POST['PhoneNumber'];
        $Status = $_POST['Status'];
        $Occupation = ucwords($_POST['Occupation']);
        $address = ucwords($_POST['Address']);
        $symptoms = $_POST['symptoms'];
        $Guardian_ID =$_POST['Guardian_ID'];
        $GuardianName = ucwords($_POST['GuardianName']);
        $Ggender = $_POST['Ggender'];
        $GPhoneN = $_POST['GPhoneN'];
        $Goccupation = ucwords($_POST['Goccupation']);
        $relation = ucfirst($_POST['relation']);
        $Gaddress = ucwords($_POST['Gaddress']);
        $DateSubmitted = date('F j, Y');
        $TimeSubmitted = date('h:i:s A');
        $GuardianOf = ucfirst($_POST['Fname'])." ".ucfirst($_POST['Lname']);

 $sql = "INSERT INTO tblpatient (Patient_ID,Account_ID, Fname, Lname, Gender, Age, PhoneNumber, Status, Occupation, Address, Symptom, DateSubmitted, TimeSubmitted) VALUES ('".$Patient_ID."', '".$Account_ID."', '".$Fname."', '".$Lname."', '".$Gender."', '".$Age."', '".$PhoneN."', '".$Status."', '".$Occupation."', '".$address."', '".$symptoms."', '".$DateSubmitted."', '".$TimeSubmitted."')";
      
 $sql1 = "INSERT INTO tblguardian (GuardianName, Gender, PhoneNumber, Occupation, GuardianOf, RelationToPatient, Address) VALUES ('".$GuardianName."',  '".$Ggender."', '".$GPhoneN."', '".$Goccupation."', '".$GuardianOf."', '".$relation."', '".$Gaddress."')";
     
 if ($con->query($sql) && ($con->query($sql1)) === TRUE) {
    $nurse1 = array('Nurse Kylie' => 'nurse1', 'Nurse Julia' => 'nurse2');
    $nurse1Rd = array_rand($nurse1,1);
    $nurse2 = array('Nurse Liza' => 'nurse3', 'Nurse Pia' => 'nurse4');
    $nurse2Rd = array_rand($nurse2,1);
    $nurse3 = array('Nurse Arci' => 'nurse5', 'Nurse Jessy' => 'nurse6' , 'Nurse Anne' => 'nurse7');
    $nurse3Rd = array_rand($nurse3,1);

    if ($symptoms == 'Abdominal Pain' || $symptoms == 'Back Pain' || $symptoms == 'Chest Pain' || $symptoms == 'Body Pain' || $symptoms == 'Dermatormal Pain' || $symptoms == 'Chronic Pelvic Pain' || $symptoms == 'Earache' || $symptoms == 'Headache' || $symptoms == 'Toothache')

    echo "<script type ='text/javascript'> alert ('Your Appointment is now booked! We will be informing you soon for your appointment. The appointment was checked by $nurse1Rd.');
    window.location.href='home.php';
    </script>";

    if ($symptoms == 'Chils' || $symptoms == 'Fever' || $symptoms == 'Numb' || $symptoms == 'Light-headed' || $symptoms == 'Dizzy' || $symptoms == 'Nausated' || $symptoms == 'Sick' || $symptoms == 'Sleepy' || $symptoms == 'Tired' || $symptoms ==  'Weak') {

      echo "<script type ='text/javascript'> alert ('Your Appointment is now booked! We will be informing you soon for your appointment. The appointment was checked by $nurse2Rd.');
    window.location.href='home.php';
    </script>"; }

   if ($symptoms == "I can\'t Breathe normally" || $symptoms == "I can\'t Hear normally" || $symptoms == "I can\'t Move one side" || $symptoms == "I can\'t See normally" || $symptoms == "I can\'t Remember normally" || $symptoms == "I can\'t Sleep normally" || $symptoms == "I can\'t Smell things normally" || $symptoms == "I can\'t Speak normally" || $symptoms == "I can\'t Swallow normally" || $symptoms == "I can\'t Taste properly" || $symptoms == "I can\'t Walk normally" || $symptoms == 'Others') {

     echo "<script type ='text/javascript'> alert ('Your Appointment is now booked! We will be informing you soon for your appointment. The appointment was checked by $nurse3Rd.');
    window.location.href='home.php';
    </script>";
  }
}
else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
}}
?> 
<?php 
if($_SESSION['User_ID']){
    $dbconnect = mysqli_connect("mysql.hostinger.ph", "u668189280_heart", "markhel418");
    mysqli_select_db($dbconnect, "u668189280_heart");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HEART HAVEN HOSPITAL</title>
        <link rel="stylesheet" type="text/css" href="master.css">
        <link rel="stylesheet" type="text/css" href="slider.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <style>
             body{
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                font-size: 12pt;
            }
        </style>
    </head>
    <body style="background-image: url(fillupbackground.jpg);"><header style="background-color:#68DCFA; color:white; padding: 5px 0px 0px 0px;"><img src="call.png" style="height:15px;">Call Us: (+639) 123 456 7890 &nbsp;&nbsp;&nbsp; <img src="mail.png" style="height:15px;"> Email Us: HMS@gmail.com  
        <script>
        tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        tmonth=new         Array("January","February","March","April","May","June","July","August","September","October","November","December");

        function GetClock(){
        var d=new Date();
        var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
        if(nyear<1000) nyear+=1900;
        var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

        if(nhour==0){ap=" AM";nhour=12;}
         else if(nhour<12){ap=" AM";}
         else if(nhour==12){ap=" PM";}
         else if(nhour>12){ap=" PM";nhour-=12;}

        if(nmin<=9) nmin="0"+nmin;
        if(nsec<=9) nsec="0"+nsec;

        document.getElementById('clockbox').innerHTML="Today is "+tday[nday]+", "+tmonth[nmonth]+" "+ndate+",         "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
        }

        window.onload=function(){
        GetClock();
        setInterval(GetClock,1000);
        }
        </script>
        <div id="clockbox" style="font:11pt Arial; color:white; float:right; padding: 0px 8px 0px 0px;"></div>
        </header>
        <header>
            <nav><ul>
                <li style="float:left; padding: 12px 0px 0px 8px;"><img src="Heart%20logo.png" style="height:30px;">
                <li style="float:left; color:white;" ><h3>HEART HAVEN HOSPITAL</h3></li>
                    <li><a style="text-decoration:none; color:white;" href="logout.php"><b>LOGOUT</b></a></li>
                    <li><a style="text-decoration:none; color:white;" href="patientaccount.php"><b>ACCOUNT</b></a></li>
                    <li><a style="text-decoration:none; color:white;" href="services.php"><b>SERVICES</b></a></li>
                    <li><a style="text-decoration:none; color:white;" href="home.php"><b>HOME</b></a></li><br/>
                </ul>
            </nav>
        </header><br/>
        <div align="center">
            <h3 style="color:white; font-family:monospace; font-size:30pt;">PERSONAL INFORMATION</h3>
              <script type="text/javascript">
              function allLetter(aform){
                var fname = aform['Fname'];
                var lname = aform['Lname'];
                var occu = aform['Occupation'];
                var gname = aform['GuardianName'];
                var goccu = aform['Goccupation'];
                var grelation = aform['relation'];
                if (!/^[a-zA-Z]+$/.test(fname.value))
                  {
                    alert('Please input alphabet only for your first name.');
                    fname.value = "";
                    fname.focus();
                    return false;
                  }
                if (!/^[a-zA-Z]+$/.test(lname.value))
                  {
                    alert('Please input alphabet only for your last name.');
                    lname.value = "";
                    lname.focus();
                    return false;
                  }
                if (!/^[a-zA-Z]+$/.test(occu.value))
                  {
                    alert('Please input alphabet only for your occupation.');
                    occu.value = "";
                    occu.focus();
                    return false;
                  }
                if (!/^[a-zA-Z]+$/.test(gname.value))
                  {
                    alert("Please input alphabet only for your guardian's name.");
                    gname.value = "";
                    gname.focus();
                    return false;
                  }
                if (!/^[a-zA-Z]+$/.test(goccu.value))
                  {
                    alert("Please input alphabet only for your guardian's occupation.");
                    goccu.value = "";
                    goccu.focus();
                    return false;
                  }
                if (!/^[a-zA-Z]+$/.test(grelation.value))
                  {
                    alert('Please input alphabet only for your relation to patient.');
                    grelation.value = "";
                    grelation.focus();
                    return false;
                  }
                  alert('Thank you for submitting the correct information!')
              }
            </script>

        <form action="webtech.php" method="post" name="aform" onsubmit="return allLetter(this)" >
            <fieldset class="fieldset">
                <label for="Fname">First Name:</label>
            <input type="text" name="Fname" placeholder="First Name" required/><br/><br/>
                <label for="Lname">Last Name:</label>
            <input type="text" name="Lname" placeholder="Last Name" required/><br/><br/>
                <label for="Gender">Gender:</label>
            <input type="radio" name="Gender" value="Male"/>Male
            <input type="radio" name="Gender" value="Female"/>Female<br/><br/>
                <label for="Age">Age:</label>
            <input type="number" min="1" max="150" class="age" name="Age" placeholder="Age" required/><br/><br/>
                <label for="PhoneNumber">Phone Number:</label>
            <input type="text" placeholder="(Enter 11 digits only)" name="PhoneNumber" required/><br/><br/>
                <label for="Status">Marital Status:</label>
            <select name="Status">
                <option>Select Status</option>
                <option>Single</option>
                <option>Married</option>
                <option>Divorced</option>
            </select><br/><br/>
                <label for="Occupation">Occupation:</label>
            <input type="text" name="Occupation" placeholder="Occupation" required/><br/><br/>
                <label for="Address">Address:</label>
           <textarea rows="4" cols="40" name="Address" placeholder="Complete Address" required></textarea><br/><br/>
                <label for="symptoms">Symptom:</label>
                <select name="symptoms" required>
                <option value="">Select Symptom</option>
               <optgroup label="Pain">
                   <option>Abdominal Pain</option>
                   <option>Back Pain</option>
                   <option>Chest Pain</option>
                   <option>Body Pain</option>
                   <option>Dermatormal Pain</option>
                   <option>Chronic Pelvic Pain</option>
                   <option>Earache</option>
                   <option>Headache</option>
                   <option>Toothache</option>
               </optgroup>
               <optgroup label="I feel:">
                   <option>Chils</option>
                   <option>Fever</option>
                   <option>Numb</option>
                   <option>Light-headed</option>
                   <option>Dizzy</option>
                   <option>Nausated</option>
                   <option>Sick</option>
                   <option>Sleepy</option>
                   <option>Tired</option>
                   <option>Weak</option>
               </optgroup>
               <optgroup label="I can\'t:">
                   <option>I can\'t Breathe normally</option>
                   <option>I can\'t Hear normally</option>
                   <option>I can\'t Move one side</option>
                   <option>I can\'t See normally</option>
                   <option>I can\'t Remember normally</option>
                   <option>I can\'t Sleep normally</option>
                   <option>I can\'t Smell things normally</option>
                   <option>I can\'t Speak normally</option>
                   <option>I can\'t Swallow normally</option>
                   <option>I can\'t Taste properly</option>
                   <option>I can\'t Walk normally</option>
               </optgroup>
                <optgroup label="Other Specify">
                   <option>Others</option>
                </optgroup>
           </select>
            </fieldset><br/><br/>
            
            <h3 style="color:white; font-family:monospace; font-size:30pt;">GUARDIAN INFORMATION</h3>
            <div align="center">
                <fieldset class="fieldset">
                    
                    <label for="GuardianName">Guardian Name:</label>
                    <input type="text" style="width:205px;" name="GuardianName" placeholder="Guardian's Complete Name" required/><br/><br/>
                    <label for="Ggender">Gender:</label>
                    <input type="radio" name="Ggender" value="Male"/>Male
                    <input type="radio" name="Ggender" value="Female"/>Female<br/><br/>
                    <label for="GPhoneN">Phone Number:</label>
                    <input type="text" placeholder="(Enter 11 digits only)" name="GPhoneN" required/><br/><br/>
                    <label for="Goccupation">Occupation:</label>
                    <input type="text" name="Goccupation" placeholder="Guardian's Occupation" required/><br/><br/>
                    <label for="relation">Relation to Patient:</label>
                    <input type="text" name="relation" placeholder="Relation to Patient" required/><br/><br/>
                    <label for="Gaddress">Address:</label>
                    <textarea rows="4" cols="40" name="Gaddress" placeholder="Guardian's Complete Address" required></textarea><br/><br/>
                    
                </fieldset>
            </div><br/><br/>
            <div align="center">
                         <input type="submit" style="background:#08BDEA; color: black; border: 10px solid; border-color:#08BDEA; border-radius: 10px; font-family: sans-serif; font-size: 20px;" name="submit" value="Submit"/>
            </div><br/>    
        </form>
        </div>
        <table align="center" width="100%;" cellpadding="20" style="color:white; text-align:center; font-family:'Oswald', sans-serif; background-color:#121212;">
            <tr><th colspan="2"></th></tr>
            <tr><th>
            <td align="left" style="text-align:center;">
            <img src="Heart%20logo.png" style="height:30px;"><h1>HEART HAVEN HOSPITAL</h1><br/></td>
            <td align="right" style="padding-bottom:30px; padding-top:30px; text-align:center;">
            <b style="font-size:20px; color:#73DEF8;">Keep In Touch</b><br/>
            <img src="contact.png" style="height:25px;">&nbsp;<b>Contact:</b>&nbsp;(+639) 123 456 7890<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(510)-210-5225<br/><br/>
            <b style="font-size:20px; color:#73DEF8;">Come and visit us</b><br/>
            <img src="loc1.png" style="height:25px;">&nbsp;<b>Address:</b>&nbsp;Holy Angel University Sto. Rosario St. Santo Rosario St, Angeles, Pampanga<br/><br/>
            <a href="https://www.facebook.com/"><img src="fblogo.png" class="logo"></a>&nbsp;
            <a href="https://twitter.com/"><img src="twitterlogo.png" class="logo"></a>&nbsp;
            <a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&followup=https%3A%2F%2Faccounts.google.com%2FManageAccount#identifier"><img src="gmaillogo.png" class="logo"></a>&nbsp;
            </td></tr>
            </table>
        <?php
        }
         else{
            header("location: login.php");
             }
            ?>
    </body>
        <footer>&#9400; 2017 All Rights Reserved | CABUSO | LAPUZ | WD - 201 </footer>
</html>
<?php
        }
         else{
            header("location: login.php");
             }
            ?>