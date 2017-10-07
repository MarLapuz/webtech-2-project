<?php
session_start();
if (isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) == 'Doctor'){
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
                background-color: #98E9F5;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                float: center;
                font-size: 12pt;
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
    <body style="background-image: url(loginbackground.png);"><header style="background-color:#68DCFA; color:white; padding: 5px 0px 0px 0px;"><img src="call.png" style="height:15px;">Call Us: (+639) 123 456 7890 &nbsp;&nbsp;&nbsp; <img src="mail.png" style="height:15px;"> Email Us: HMS@gmail.com  
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
        <div align="center" style=" padding-top:70px;">
    
        <b class="login" style="font-size:20pt;">ADD NEW PATIENT</b><br/>
        <fieldset class="fieldset" style="background-color:transparent;">
        <form action="signup.php" method="POST"><br/>
		Username:&nbsp;&nbsp;&nbsp;<input type="text" class="input" name="Username" placeholder="Username" required/>
        <br><br>
		Password:&nbsp;&nbsp;&nbsp;<input type="password" class="input password" name="Password" placeholder="Password" required/><br/><br/>
        <input type="checkbox" id="showHide" />
        <label for="showHide" id="showHideLabel">Show Password</label><br/>
        Account Description:&nbsp;<b style="font-size:15pt;">PATIENT</b>
        <br><br>
        
        <input type="submit" class="button" style="width:115px;" value="ADD PATIENT">
        </form>
            <script>$(document).ready(function() {
                             $("#showHide").click(function() {
                               if ($(".password").attr("type") == "password") {
                                 $(".password").attr("type", "text");

                               } else {
                                 $(".password").attr("type", "password");
                               }
                             });
                           });
            </script>
            <br/>
                <a href="login.php"><input type="submit" class="button" value="Back"/></a>
            </fieldset>
    
        </div><br/><br/><br/><br/><br/><br/><br/>
        <table align="center" width="100%;" cellpadding="20" style="color:white; text-align:center; font-family:'Oswald', sans-serif; background-color:#121212;">
            <tr><th colspan="2"></th></tr>
            <tr><th>
            <td align="left" style="text-align:center;">
            <img src="Heart%20logo.png" style="height:30px;"><h1>HEART HAVEN HOSPITAL</h1><br/></td>
            <td align="right" style="padding-bottom:30px; padding-top:30px; text-align:center;">
            <b style="font-size:20px; color:#73DEF8;">For Emergency</b><br/>
            <img src="contact.png" style="height:25px;">&nbsp;<b>Contact:</b>&nbsp;(+639) 123 456 7890<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(510)-210-5225<br/><br/>
            <b style="font-size:20px; color:#73DEF8;">Come and visit us</b><br/>
            <img src="loc1.png" style="height:25px;">&nbsp;<b>Address:</b>&nbsp;Holy Angel University Sto. Rosario St. Santo Rosario St, Angeles, Pampanga<br/><br/>
            <a href="https://www.facebook.com/"><img src="fblogo.png" class="logo"></a>&nbsp;
            <a href="https://twitter.com/"><img src="twitterlogo.png" class="logo"></a>&nbsp;
            <a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&followup=https%3A%2F%2Faccounts.google.com%2FManageAccount#identifier"><img src="gmaillogo.png" class="logo"></a>&nbsp;
            </td></tr>
            </table>
    </body>
        <footer>&#9400; 2017 All Rights Reserved | CABUSO | LAPUZ | WD - 201 </footer>
</html>
<?php 
$dbconnect = mysqli_connect("localhost", "root", "");
mysqli_select_db($dbconnect, "dbhospital");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["AccountDescription"] == "-----") {
    $message = "<script type ='text/javascript'> alert ('Please fill-up all fields.')</script>";
	echo $message;
    }
    
    else {
    $query = mysqli_query($dbconnect, "SELECT Username, AccountDescription FROM tblaccounts WHERE Username='".$_POST['Username']."' AND AccountDescription ='".$_POST['AccountDescription']."'");
        
    if(mysqli_num_rows($query) >0){
        echo "<script type ='text/javascript'> alert ('Account already used. Please use another username.')</script>";
    }
            
    else {
 $con = mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
     
 mysqli_select_db($con, "dbhospital") or die(mysqli_error());
 $User_ID = $_POST['User_ID'];
 $Username = $_POST['Username']; 
 $Password = $_POST['Password'];
 $AccountDescription = "Patient";

 $sql = "INSERT INTO tblaccounts (User_ID,Username,Password,AccountDescription) VALUES ('".$User_ID."' , '".$Username."','".$Password."','".$AccountDescription."')";

if ($con->query($sql) === TRUE) {
    echo "<script type ='text/javascript'> alert ('Patient Added!'); window.location.href='doctor.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
    }
}
}}
?> 