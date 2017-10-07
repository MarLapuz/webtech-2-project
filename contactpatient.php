<?php
error_reporting(0);
session_start();
if (isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) || ($_GET['Account_ID'])){

    $dbconnect = mysqli_connect("mysql.hostinger.ph", "u668189280_heart", "markhel418") or die("Error connecting to database: ".mysql_error());
    mysqli_select_db($dbconnect, "u668189280_heart") or die(mysqli_error());
    
    $query = mysqli_query($dbconnect, "SELECT * FROM tblpatient WHERE Account_ID='".$_GET['Account_ID']."'");
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HEART HAVEN HOSPITAL</title>
        <link rel="stylesheet" type="text/css" href="master.css">
        <link rel="stylesheet" type="text/css" href="slider.css">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <style>
            body{
                background-color: #98E9F5;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                float: center;
            }
            .login{
                font-weight: bold;
                color: black;
                font-family: monospace; 
            }
            .input{
                background: transparent;
                border: 1px solid;
                border-color: white;
                font-size: 12pt;
            }
            .button{
                color: white;
                border-style: solid;
                border-width: medium;
                width: 80px;
                height: 30px;
                background-color: #08BDEA;
                border-color: #08BDEA;
                font-family: monospace;
            } 
        </style>
    </head>
    <body style="background-image: url(contactpatientbackground.jpg);"><header style="background-color:#68DCFA; color:white; padding: 5px 0px 0px 0px;"><img src="call.png" style="height:15px;">Call Hospital: (+639) 123 456 7890 &nbsp;&nbsp;&nbsp; <img src="mail.png" style="height:15px;"> Email Hospital: HMS@gmail.com  
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
                </ul>
            </nav>
        </header>
        <div align="center">
            <br/><br/><br/><br/><br/><br/><br/>
                <fieldset class="fieldset" style="background-color:transparent;">
                    <form action="" method="post">
                    <input type="hidden" value="<?=($_GET['Account_ID'])?$_GET['Account_ID']:''?>" style="border-radius:5px;">
                    <h1 class="login">Contact Patient</h1>
                    Patient's First Name:
                    <input type="text" class="input" name="PatientFirstName" value="&nbsp;<?=$row['Fname']?>" readonly><br/><br/>
                    Patient's Last Name:
                    <input type="text" class="input" name="PatientLastName" value="&nbsp;<?=$row['Lname']?>" readonly><br/><br/>
                    Patient Phone Number:
                    <input type="text" class="input" name="PatientNumber" value="&nbsp;<?=$row['PhoneNumber']?>" readonly><br/><br/>
                    Appointment Schedule:
                    <input type="date" class="input" name="date" value="date" required><br/>
                    <div style="padding-top:10px; padding-left:122px;">
                    <input type="time" class="input" name="time" value="time" style="padding-left:" required></div><br/><br/>
                    Message:
                    <textarea rows="4" cols="30" name="message" placeholder="Message Here" required></textarea><br/><br/>
                    
                    <input type="submit" class="button" name="submit" value="Submit">
                       
                    </form><br/>
                    <a href="doctor.php"><input type="submit" class="button" name="cancel" value="Cancel"></a> 
            </fieldset>
            
        </div><br/><br/><br/><br/><br/><br/><br/><br/>
            <table align="center" width="100%;" cellpadding="20" style="color:white; text-align:center; font-family:'Oswald', sans-serif; background-color:#121212;">
            <tr><th colspan="2"></th></tr>
            <tr><th>
            <td align="left" style="text-align:center; padding-top:30px; padding-bottom:30px;">
            <img src="Heart%20logo.png" style="height:30px;"><h1>HEART HAVEN HOSPITAL</h1><br/>
            <a href="https://www.facebook.com/"><img src="fblogo.png" class="logo"></a>&nbsp;
            <a href="https://twitter.com/"><img src="twitterlogo.png" class="logo"></a>&nbsp;
            <a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&followup=https%3A%2F%2Faccounts.google.com%2FManageAccount#identifier"><img src="gmaillogo.png" class="logo"></a>&nbsp;
                </td></tr>
            </table>
    </body>
        <footer>&#9400; 2017 All Rights Reserved | CABUSO | LAPUZ | WD - 201 </footer>
</html>

<?php 
      if(isset($_POST['PatientFirstName']) AND ($_POST['PatientLastName']) AND ($_POST['PatientNumber']) AND ($_POST['date']) AND ($_POST['time']) AND ($_POST['message'])){
          
        $Account_ID=$_GET['Account_ID'];
        $Schedule_ID=$_GET['Account_ID'];
        $PatientFirstName = $_POST['PatientFirstName'];
        $PatientLastName = $_POST['PatientLastName'];
        $PatientNumber = $_POST['PatientNumber'];
        $date = date('m-d-Y', strtotime($_POST['date']));
        $time = date('h:i A', strtotime($_POST['time']));
        $message = ucwords($_POST['message']);
        $Doctor = ucfirst($_SESSION['Username']);
        
  
  mysqli_query($dbconnect,"INSERT INTO tblschedule (Account_ID, PatientFirstName, PatientLastName, PatientNumber, Date, Time, Doctor, MessageOfDoctor) VALUES ('".$Account_ID."', '".$PatientFirstName."', '".$PatientLastName."', '".$PatientNumber."', '".$date."', '".$time."', '".$Doctor."', '".$message."')");  
          echo"<script>alert('Appointment Schedule Sent!'); window.location.href='doctor.php'; </script>"; 
    }
}
else{
    header("location: login.php");
}
?>