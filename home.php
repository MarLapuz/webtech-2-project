<?php
error_reporting(0);
session_start();
if (isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) == 'Patient'){
    $dbconnect = mysqli_connect("localhost", "root", "");
    mysqli_select_db($dbconnect, "dbhospital");
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
            .input{
                background: transparent;
                font-weight: bold;
                color: white;
                font-family: sans-serif; 
                border: 3px solid rgba(255,255,255,0.6); 
                font-size: 100%;
            }
        </style>
    </head>
    <body><header style="background-color:#68DCFA; color:white; padding: 5px 0px 0px 0px;"><img src="call.png" style="height:15px;">Call Us: (+639) 123 456 7890 &nbsp;&nbsp;&nbsp; <img src="mail.png" style="height:15px;"> Email Us: HMS@gmail.com  
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
                    <b style="color:white; font-size:18pt;">Welcome <?php echo ucfirst($_SESSION['AccountDescription']); echo '&nbsp;'; echo ucfirst($_SESSION['Username']);?></b>
                </ul>
            </nav>
        </header>
        <div class="slider">
            <figure>
            <div class="slide">
                <img src="doctor1.jpg">
                <p style="font-size: 30px; padding-left:98px; color: white;">WELCOME TO OUR HEALTH CARE</p><br/><br/>
                <p style="font-size 20px; padding-left: 20px;">YOUR HEALTH IS PRIORITIZED</p>
            </div>
            
            <div class="slide">
                <img src="doctor2.jpg">
                <p style="padding-left:110px; color:white;">WE PROTECT YOU</p><br/><br/><br/>
                <p style="font-size 20px; padding-left: 150px;">WE SAVE LIVES</p>
            </div>
            
            <div class="slide">
                <img src="doctor3.jpg"><br/><br/>
                <p style="padding-left:98px;">WE CAN ASSURE YOUR HEALTH</p><br/><br/><br/>
                <p style="font-size 20px; padding-left: 200px;">FOR A GOOD CONDITION</p>
            </div>
                
            <div class="slide">
                <img src="doctor4.jpg"><br/><br/><br/><br/>
                <p style="font-size 20px; padding-left:220px;">YOU ARE THE HEART OF OUR CARE</p>
                </div>
                
            <div class="slide">
                <img src="doctor5.jpg">
                <p style="padding-left:98px;">OUR GUIDANCE WILL HELP YOU</p><br/><br/><br/>
                <p style="font-size 20px; padding-left: 200px;">FOR EVERY DAY LIVING</p>
                </div>
            </figure>
        </div>
        
        <div class="column-left">
            <h3>OPEN HOURS</h3>
            <img src="clock.png" style="height:50px;">
            <h2 style="font-size:15px; padding-right:30px;">MONDAY-FRIDAY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7AM-10PM</h2>
            <h2 style="font-size:15px; padding-right:12px;">SATURDAY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9AM-10PM</h2>
            <h2 style="font-size:15px; padding-right:15px;">SUNDAY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLOSED</h2><br/>
        </div>
        <div class="column-center">
            <h3>APPOINTMENT</h3>
            <img src="appointment.png" style="height:50px;">
            <h2 style="font-size:15px;">APPOINTMENTS ARE AVAILABLE,CALL US</h2>
            <h2 style="font-size:15px;">TODAY OR BOOK A APPOINTMENT</h2>
            <form action="webtech.php">
            <input type="submit" class="input" value="BOOK NOW"><br/><br/>
            </form>
        </div>
        <div class="column-right">
            <h3>ONLINE PAYMENT</h3>
            <img src="money.png" style="height:58px;">
            <h2 style="font-size:15px;">PAYMENT VIA ONLINE METHOD</h2>
            <h2 style="font-size:15px;">WITHOUT ANY CHARGES</h2><br/><br/>   
        </div>
        <div class="context"><br/>
            <h1 style="color:#08BDEA;">WELCOME</h1> 
            <h1 style="color:red;">TO OUR HEALTH CARE!</h1>
            <img src="beat.png" style="height:50px; float:center;"><br/>
            <b style="color:black; font-size:15px; font-family:sans-serif;"><b style="color:#08BDEA;">Heart Haven Hospital</b> is where your health is being cared the most. The hospital provides you everything that you need and we assure you that you will be always comfortable with us. The hospital started at April 1998 and it was knowned ever sinced and already saving thousand of lives for a long time. The hospital is serving people who are in need and helping them as they encounter some problems about their own personal health. We can make your life more peaceful and comfortable with the help of our skilled doctors and vigorous nurses. We are glad that your are being part of us! We will help you 24/7 in case of emergencies or personal problems.</b><br/>
            <img src="doc1.png" class="img1" style="float:left; padding-left:25px;">
            <img src="doc2.png" class="img2" style="display:inline-block; padding-left:10px;">
            <img src="doc3.png" class="img3" style="float:right; padding-right:25px;"><br/>
            <b style="color:black; font-size:15px; font-family:sans-serif;">The Hospital provides many kinds of services that patients can inquire and these services are all performed by highly recommended skilled doctors and nurses. All you need about health care is provided by the hospital that may help you. The doctors and nurses are readily available here for admitting and attending on their patients. As this hospital, there are very well-equipped facilities and expert doctors. The hospital is considered as the best place for effective treatment.</b>
        <br/><br/><br/>
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
    </body>
        <footer>&#9400; 2017 All Rights Reserved | CABUSO | LAPUZ | WD - 201 </footer>
</html>
<?php
        }
         else{
            header("location: login.php");
             }
            ?>