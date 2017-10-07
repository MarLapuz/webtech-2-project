<?php
error_reporting(0);
session_start();
if (isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) == 'Patient'){
  $dbconnect = mysqli_connect("localhost", "root", "");
  mysqli_select_db($dbconnect, "dbhospital");
    
    $query = mysqli_query($dbconnect, "SELECT * FROM tblschedule WHERE Account_ID='".$_SESSION['User_ID']."'");
    $query1 = mysqli_query($dbconnect, "SELECT * FROM tblaccounts WHERE User_ID='".$_SESSION['User_ID']."'");
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
            .modal .modal-dialog { 
                width: 100%; 
            }
            .modal-body {
                max-width: 100%;
            }
            .bg-1 { 
             background-color: #68DCFA;
             color: #ffffff;
            }       
            .hideme
           {
            opacity:0;
           }
        </style>
    </head>
        <body  style="background-image: url(patientbackground.jpg);"><header style="background-color:#68DCFA; color:white;"><img src="call.png" style="height:15px;">Call Us: (+639) 123 456 7890 &nbsp;&nbsp;&nbsp; <img src="mail.png" style="height:15px;"> Email Us: HMS@gmail.com  
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
        <div id="clockbox" style="font:11pt Arial; color:white; float:right; padding: 5px 8px 0px 0px;"></div>
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
        </header>
        <div class="bg-1">
        <div class="container text-center">
          <div class="container" align="center">
                    <h1 style="font-size:32pt; color:white;"><?php echo ucfirst($_SESSION['AccountDescription']); echo '&nbsp;'; echo       ucfirst($_SESSION['Username']);?></h1>
                </div>
          <img src="accountlogo.png" class="img-circle" alt="Bird" width="200" height="200">
          <h3>WE ARE GLAD THAT YOU ARE WITH US!</h3>
        </div>
        </div><br/>
       
          <div align="center" class="container hideme">
            <div class="page-header">
              <h1 style="font-size:30pt; color:white;">Profile Account</h1>
            </div>
          <div class="row">
          </div></div>
          
          <div align="center" class="container hideme"><?php
                    while ($row = mysqli_fetch_array($query1)){
                        ?>
          <a href="update.php?User_ID=<?=$row['User_ID']?>"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#account">Update Account</button></a><?php }?>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">View Schedule of Appointment</button>


          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Appointment Schedule</h4>
                </div>
                <div class="modal-body">
                <table class="table  table-hover" style="text-align:center;">
                <thead class="thead-inverse">
                  <tr>
                    <th style="font-size:13pt; text-align:center;"><b>Schedule_ID</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Patient First Name</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Patient Last Name</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Appointment Schedule Date</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Appointment Schedule Time</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Doctor</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Message Of Doctor</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Action</b></th>
                  </tr>
                </thead>
                <tbody>
                       <?php
                           while ($row = mysqli_fetch_array($query)){
                               ?>
                               <tr>
                                   <td><?=$row['Schedule_ID']?></td>
                                   <td><?=$row['PatientFirstName']?></td>
                                   <td><?=$row['PatientLastName']?></td>
                                   <td><?=$row['Date']?></td>
                                   <td><?=$row['Time']?></td>
                                   <td><?=$row['Doctor']?></td>
                                   <td><?=$row['MessageOfDoctor']?></td>
                                   <td>
                                       <a href="delete.php?Schedule_ID=<?=$row['Schedule_ID']?>">[DELETE]</a>
                                   </td>
                                   <tr>
                       <?php
                       }
                           ?>
                 </tr>
               </tbody>
               </table>
               </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
             </div>
            </div>
           </div><br/><br/><br/><br/>
        
           <div class="row" style="color:white;">
          <div class="col-sm-3">
            <div class="well hideme" style="background-color:#5bc0de; border:0px; border-radius:10px;">
              <h3>24/7 Service</h3>
              Serving and helping patients at all times
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well hideme" style="background-color:#428bca; border:0px; border-radius:10px;">
              <h3>Qualified Doctors</h3>
              Doctors of the hospital have high skills involved
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well hideme" style="background-color:#5bc0de; border:0px; border-radius:10px;">
              <h3>Client care</h3>
              You are always cared for your health
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well hideme" style="background-color:#428bca; border:0px; border-radius:10px;">
              <h3>Hospital Discount</h3>
              10%    
             <br/><br/>
            </div>
          </div>
        </div>
        
        <script>
        $(document).ready(function() {
    
        $(window).scroll( function(){
        
            $('.hideme').each( function(i){
                
                var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();
                
                if( bottom_of_window > bottom_of_object ){
                    $(this).animate({'opacity':'1'},500);
                }
               }); 
           });
       });
       </script>
        
       <div class="container-fluid bg-3 text-center hideme" style="color:white;"> 
       <h1 style="font-size:30pt; color:white;">Improving life for comfortability</h1><br/>
       <div class="row ">
         <div class="col-sm-4 hideme">
           <h4>WE CARE</h4>
           <img src="doc3.png" alt="Image">
         </div>
         <div class="col-sm-4 hideme">
           <h4>WE GUIDE</h4>
           <img src="doc2.png" alt="Image">
         </div>
         <div class="col-sm-4 hideme"> 
           <h4>WE SAVE</h4>
           <img src="doc1.png" alt="Image">
         </div>
       </div>
     </div><br/>
            
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
else{header("location: login.php");}
?>