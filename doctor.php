<?php
error_reporting(0);
session_start();
if (isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) == 'Doctor'){
  $dbconnect = mysqli_connect("localhost", "root", "");
  mysqli_select_db($dbconnect, "dbhospital");
    $query = mysqli_query($dbconnect, "SELECT * FROM tblaccounts ORDER BY User_ID ASC");
    $query1 = mysqli_query($dbconnect, "SELECT * FROM tblpatient ORDER BY Patient_ID ASC");
    $query2 = mysqli_query($dbconnect, "SELECT * FROM tblguardian ORDER BY Guardian_ID ASC");
    $query3 = mysqli_query($dbconnect, "SELECT * FROM tblschedule");
    $query4 = mysqli_query($dbconnect, "SELECT * FROM tblaccounts WHERE User_ID='".$_SESSION['User_ID']."'");
    $query = mysqli_query($dbconnect, "SELECT * FROM tblaccounts WHERE AccountDescription='Patient' ORDER BY User_ID ASC");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HEART HAVEN HOSPITAL</title>
        <link rel="stylesheet" type="text/css" href="master.css">
        <link rel="stylesheet" type="text/css" href="slider.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="fusionchart/js/fusioncharts.js"></script>
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
    <body  style="background-image: url(doctorbackground.jpg);"><header style="background-color:#68DCFA; color:white;"><img src="call.png" style="height:15px;">Call Hospital: (+639) 123 456 7890 &nbsp;&nbsp;&nbsp; <img src="mail.png" style="height:15px;"> Email Hospital: HMS@gmail.com  
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
            <nav>
                <ul>
                <li style="float:left; padding: 12px 0px 0px 8px;"><img src="Heart%20logo.png" style="height:30px;">
                <li style="float:left; color:white;" ><h3>HEART HAVEN HOSPITAL</h3></li>
                    <li><a style="text-decoration:none; color:white;" href="logout.php"><b>LOGOUT</b></a></li>
                </ul>
            </nav>
        </header>
          
       <div class="bg-1">
       <div class="container text-center">
        <div class="container" align="center">
                   <h1 style="font-size:32pt; color:white;">Welcome <?php echo ucfirst($_SESSION['AccountDescription']); echo '&nbsp;';      echo ucfirst($_SESSION['Username']);?></h1>
        </div>
         <img src="doctorlogo.png" class="img-circle" alt="Bird" width="200" height="200">
         <h3>WE CARE FOR LIFE</h3>
       </div></div><br/>
        
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
        
         <div class="container text-center hideme">    
       <div class="row">
         <div class="col-sm-3 well" style="background-color:#428bca; border:0px; border-radius:10px;">
           <div class="well">
            <?php echo ucfirst($_SESSION['AccountDescription']); echo '&nbsp;'; echo ucfirst($_SESSION['Username']);?>
             <img src="doctoraccountlogo.png" class="img-circle" height="65" width="65" alt="Avatar">
           </div>
           <div class="well">
            <a href="#">SKILLS:</a>
            
               <span class="label label-primary">Self-confidence</span>
               <span class="label label-primary">Humility</span>
               <span class="label label-primary">Appreciation for others</span>
               <span class="label label-primary">Mentoring</span>
               <span class="label label-primary">Life balance</span>
               <span class="label label-primary">Vision</span>
             
           </div>
           <div class="well">
            <strong>NOTE:</strong>
            Bring your documents for laboratory test.
           </div>
             
             <div><?php while ($row = mysqli_fetch_array($query4)){?>
                 <a href="update.php?User_ID=<?=$row['User_ID']?>"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#account">Update Account</button></a><?php }?><br/><br/>
                 <a href="addpatient.php"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#account">ADD PATIENT</button></a>
           </div><br/>
         </div>
         <div class="col-sm-7">
         
           <div class="row">
             <div class="col-sm-12">
               <div class="panel panel-default text-left">
                 <div class="panel-body" style="text-align:center">
                  <b>WE CARE | WE GUIDE | WE SAVE</b>
                 </div>
               </div>
             </div>
           </div>
           
           <div class="row">
             <div class="col-sm-1">
               
             </div>
             <div class="col-sm-9">
               <div class="well">
                Concoctions always portend a crisis, and safety from the disease; but crudities, or inconcoctions are soon converted into bad translations, or a defect or want of crisis, or pain, or a duration of the disease, or death, or a relapse.
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-sm-1">
               
             </div>
             <div class="col-sm-9">
               <div class="well">
                I will apply dietetic measures for the benefit of the sick according to my ability and judgment; I will keep them from harm and injustice.
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-sm-1">
               
             </div>
             <div class="col-sm-9">
               <div class="well">
                What I may see or hear in the course of the treatment or even outside of the treatment in regard to the life of men, which on no account one must spread abroad, I will keep to myself, holding such things shameful to be spoken about.
               </div>
             </div>
           </div>   
         </div>
         <div class="col-sm-2 well" style="background-color:#428bca; border:0px; border-radius:10px;">
             <h5 style="color:white;">TO DO LIST:</h5>
           <div class="well">
             <span class="glyphicon glyphicon-time"></span> CHECK SCHEDULES
           </div>      
           <div class="well">
            UPDATE YOUR PATIENT/S
           </div>
           <div class="well">
            RESPECT AND HELP EVERYONE
           </div>
         </div>
       </div>
     </div>        
        
          <div class="container">
              <div class="page-header">
                  <h1 style="font-size:30pt; color:white;">Appointment Schedules</h1>
              </div>
          <div class="row" align="center">
          </div></div><br/>
        
          <div class="container" align="center">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#view3">View Appointment Schedules</button><br/><br/>
          <div id="view3" class="collapse" style="background-color:white; border-radius:10px;"><br/>
          <table class="table table-hover" style="text-align:center;">
            <thead>
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
                    while ($row = mysqli_fetch_array($query3)){
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
          </div></div>
          
          <div class="container">
            <div class="page-header">
              <h1 style="font-size:30pt; color:white; ">Records</h1>
            </div>
          <div class="row" align="center">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#view2">View Records</button>
          </div></div><br/>
        
          
          <div align="center" id="view2" class="collapse" style="background-color:white; border-radius:10px;"><br/>
          <h2>Patients Profile</h2>       
          <table class="table  table-hover" style="text-align:center;">
          <thead class="thead-inverse">
            <tr>
              <th style="font-size:13pt; text-align:center;"><b>Patient ID</b></th>  
              <th style="font-size:13pt; text-align:center;"><b>L.Name</b></th>
              <th style="font-size:13pt; text-align:center;"><b>F.Name</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Gender</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Age</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Phone #</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Status</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Occupation</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Address</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Symptom/s</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Appointment Date Submitted</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Appointment Time Submitted</b></th>
              <th style="font-size:13pt; text-align:center;"><b>Action</b></th>
            </tr>
          </thead>
          <tbody>           
            <?php
                    while ($row = mysqli_fetch_array($query1)){
                        ?>
                        <tr>
                            <td><?=$row['Account_ID']?></td>
                            <td><?=$row['Lname']?></td>
                            <td><?=$row['Fname']?></td>
                            <td><?=$row['Gender']?></td>
                            <td><?=$row['Age']?></td>
                            <td><?=$row['PhoneNumber']?></td>
                            <td><?=$row['Status']?></td>
                            <td><?=$row['Occupation']?></td>
                            <td><?=$row['Address']?></td>
                            <td><?=$row['Symptom']?></td>
                            <td><?=$row['DateSubmitted']?></td>
                            <td><?=$row['TimeSubmitted']?></td>
                            <td>
                                <a href="contactpatient.php?Account_ID=<?=$row['Account_ID']?>">[CONTACT]</a>
                                <a href="delete.php?Account_ID=<?=$row['Account_ID']?>">[DELETE]</a>
                            </td>
                            <tr>
                <?php
                }
                    ?>
                      </tr>
             </tbody>
           </table><hr/>
                         
           <h2>Guardians Profile</h2>
           <table class="table  table-hover" style="text-align:center;">
             <thead class="thead-default">
               <tr>
                <th style="font-size:13pt; text-align:center;"><b>Guardian_ID</b></th> 
                <th style="font-size:13pt; text-align:center;"><b>Guardian Name</b></th>
                <th style="font-size:13pt; text-align:center;"><b>Gender</b></th>
                <th style="font-size:13pt; text-align:center;"><b>Phone #</b></th>
                <th style="font-size:13pt; text-align:center;"><b>Occupation</b></th>
                <th style="font-size:13pt; text-align:center;"><b>Address</b></th>
                <th style="font-size:13pt; text-align:center;"><b>Guardian of</b></th>
                <th style="font-size:13pt; text-align:center;"><b>Relation to Patient</b></th>
                <th style="font-size:13pt; text-align:center;"><b>Action</b></th>
               </tr>
             </thead>
             <tbody>
               <?php
                  while ($row = mysqli_fetch_array($query2)){
                      ?>
                      <tr>
                          <td><?=$row['Guardian_ID']?></td>
                          <td><?=$row['GuardianName']?></td>
                          <td><?=$row['Gender']?></td>
                          <td><?=$row['PhoneNumber']?></td>
                          <td><?=$row['Occupation']?></td>
                          <td><?=$row['Address']?></td>
                          <td><?=$row['GuardianOf']?></td>
                          <td><?=$row['RelationToPatient']?></td>
                          <td>
                                <a href="delete.php?Guardian_ID=<?=$row['Guardian_ID']?>">[DELETE]</a>
                            </td>
                          <tr>
              <?php
              }
                  ?>
                    </tr>
             </tbody>
           </table>
        </div>
           <div class="container">
              <div class="page-header">
                  <h1 style="font-size:30pt; color:white;">Patient Accounts</h1>
              </div>
          <div class="row" align="center">
          </div></div><br/>
        
          <div class="container" align="center">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#view4">View Patient Accounts</button><br/><br/>
          <div id="view4" class="collapse" style="background-color:white; border-radius:10px;"><br/>
          <table class="table table-hover" style="text-align:center;">
            <thead>
              <tr>
                      <th style="font-size:13pt; text-align:center;"><b>User_ID</b></th>
                      <th style="font-size:13pt; text-align:center;"><b>Username</b></th>
                      <th style="font-size:13pt; text-align:center;"><b>Password</b></th>
                      <th style="font-size:13pt; text-align:center;"><b>Account Description</b></th>
                      <th style="font-size:13pt; text-align:center;"><b>Action</b></th>
              </tr>
            </thead>
            <tbody>
                           <?php
                    while ($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?=$row['User_ID']?></td>
                            <td><?=$row['Username']?></td>
                            <td><?=md5($row['Password'])?></td>
                            <td><?=$row['AccountDescription']?></td>
                            <td>
                                <a href="update.php?User_ID=<?=$row['User_ID']?>">[UPDATE]</a>
                                <a href="delete.php?User_ID=<?=$row['User_ID']?>">[DELETE]</a>
                            </td>
                            <tr>
                <?php
                }
                    ?>
                      </tr></tbody>
          </table>
          </div></div><br/>
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
        }
         else{
            header("location: login.php");
             }
            ?>