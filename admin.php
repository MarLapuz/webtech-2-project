<?php
error_reporting(0);
session_start();
if (isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) == 'Admin'){
    $dbconnect = mysqli_connect("localhost", "root", "");
    mysqli_select_db($dbconnect, "dbhospital");
    $query = mysqli_query($dbconnect, "SELECT * FROM tblaccounts ORDER BY User_ID ASC");
    $query1 = mysqli_query($dbconnect, "SELECT * FROM tblpatient ORDER BY Lname ASC");
    $query2 = mysqli_query($dbconnect, "SELECT * FROM tblguardian ORDER BY GuardianName ASC");
    $query3 = mysqli_query($dbconnect, "SELECT COUNT(1) FROM tblaccounts");
    $query4 = mysqli_query($dbconnect, "SELECT * FROM tblschedule");
    $count = mysqli_fetch_array($query3);
    $total = $count[0];
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
        </style>
    </head>
    <body  style="background-image: url(adminbackground.jpg);"><header style="background-color:#68DCFA; color:white;"><img src="call.png" style="height:15px;">Call Hospital: (+639) 123 456 7890 &nbsp;&nbsp;&nbsp; <img src="mail.png" style="height:15px;"> Email Hospital: HMS@gmail.com  
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
        
         <div class="jumbotron" style="background-color:#68DCFA;">
         <div class="container text-center" style="color:white;">
         <h1 style="font-size:32pt;">Welcome <?php echo ucfirst($_SESSION['AccountDescription']); echo '&nbsp;'; echo ucfirst($_SESSION['Username']);?></h1>      
         <h4>HEALTH IS THE PRIORITY</h4>
         </div>
         </div>
        
          <div class="container">
            <div class="page-header">
              <h1 style="font-size:30pt; color:white;">Dashboard</h1>
            </div>
          <div class="row">
          <div class="col-sm-3" style="background-color:#66ccff; border-radius:10px;"><img src="income.png" style="height:123px; float:right; padding-top:20px; padding-right:20px; padding-bottom:10px;"><h3>&nbsp;&nbsp;&nbsp;<b>$$$</b><br/>Income harvest</h3></div>
          <div class="col-xs-1"></div>
          <div class="col-sm-3" style="background-color:#00ffcc; border-radius:10px;"><img src="check.png" style="height:90px; float:right; padding-top:20px; padding-right:10px; padding-left:50px;"><h3>Task Completed</h3>
              <div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width:62%;"></div>
              </div></div>
            <div class="col-xs-1"></div>
          <div class="col-sm-3" style="background-color:#cc99ff; border-radius:10px;"><img src="members.png" style="height:120px; float:right; padding-top:20px; padding-right:20px;"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $total; ?></b></h1><h3>&nbsp;&nbsp;Member/s</h3></div>
          </div></div><br/>
          
          <div class="container">
          <div class="row">
          <div class="col-sm-1"><br/><br/><br/><br/>
          <div id="chart" style="background-color:white; border-radius:10px; padding-left:50px;">Charts will render here
          </div></div>
          <div align="right"id="chart-container" style="background-color:white; border-radius:10px; padding-right:80px;">Charts will render here</div>
          
         <script>
        FusionCharts.ready(function () {
        var salesChart = new FusionCharts({
        type: 'msarea',
        renderAt: 'chart',
        width: '450',
        height: '300',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Hospital Income",
                "subCaption": "Previous week vs current week",
                "xAxisName": "Day",
                "yAxisName": "Sales (In USD)",
                "numberPrefix": "$",
                "paletteColors": "#0075c2,#1aaf5d",
                "bgColor": "#ffffff",
                "showBorder": "0",
                "showCanvasBorder": "0",
                "plotBorderAlpha": "10",
                "usePlotGradientColor": "0",
                "legendBorderAlpha": "0",
                "legendShadow": "0",
                "plotFillAlpha": "60",
                "showXAxisLine": "1",
                "axisLineAlpha": "25",                
                "showValues": "0",
                "captionFontSize": "14",
                "subcaptionFontSize": "14",
                "subcaptionFontBold": "0",
                "divlineColor": "#999999",                
                "divLineIsDashed": "1",
                "divLineDashLen": "1",
                "divLineGapLen": "1",
                "showAlternateHGridColor": "0",
                "toolTipColor": "#ffffff",
                "toolTipBorderThickness": "0",
                "toolTipBgColor": "#000000",
                "toolTipBgAlpha": "80",
                "toolTipBorderRadius": "2",
                "toolTipPadding": "5",
            },
            
            "categories": [
                {
                    "category": [
                        {
                            "label": "Mon"
                        }, 
                        {
                            "label": "Tue"
                        }, 
                        {
                            "label": "Wed"
                        }, 
                        {
                            "label": "Thu"
                        }, 
                        {
                            "label": "Fri"
                        }, 
                        {
                            "label": "Sat"
                        }, 
                        {
                            "label": "Sun"
                        }
                    ]
                }
            ],
            
            "dataset": [
                {
                    "seriesname": "Previous Week",
                    "data": [
                        {
                            "value": "13000"
                        }, 
                        {
                            "value": "14500"
                        }, 
                        {
                            "value": "13500"
                        }, 
                        {
                            "value": "15000"
                        }, 
                        {
                            "value": "15500"
                        }, 
                        {
                            "value": "17650"
                        }, 
                        {
                            "value": "19500"
                        }
                    ]
                }, 
                {
                    "seriesname": "Current Week",
                    "data": [
                        {
                            "value": "8400"
                        }, 
                        {
                            "value": "9800"
                        }, 
                        {
                            "value": "11800"
                        }, 
                        {
                            "value": "14400"
                        }, 
                        {
                            "value": "18800"
                        }, 
                        {
                            "value": "24800"
                        }, 
                        {
                            "value": "30800"
                        }
                    ]
                }
            ]
        }
    })
    .render();
});
             
        FusionCharts.ready(function () {
        var revenueChart = new FusionCharts({
        type: 'doughnut2d',
        renderAt: 'chart-container',
        width: '450',
        height: '450',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Split Graph of Frequently Encountered Diseases ",
                "subCaption": "Last 3 Months",
                "paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
                "bgColor": "white",
                "showBorder": "0",
                "use3DLighting": "0",
                "showShadow": "0",
                "enableSmartLabels": "0",
                "startingAngle": "310",
                "showLabels": "0",
                "showPercentValues": "1",
                "showLegend": "1",
                "legendShadow": "0",
                "legendBorderAlpha": "0",
                "defaultCenterLabel": "Total of 522 persons",
                "centerLabel": "People encountered $label: $value",
                "centerLabelBold": "1",
                "showTooltip": "0",
                "decimals": "0",
                "captionFontSize": "14",
                "subcaptionFontSize": "14",
                "subcaptionFontBold": "0"
            },
            "data": [
                {
                    "label": "Cancer",
                    "value": "285"
                }, 
                {
                    "label": "Alzheimer's Disease",
                    "value": "86"
                }, 
                {
                    "label": "Animal-Related Disease",
                    "value": "54"
                }, 
                {
                    "label": "Genetics and Stroke",
                    "value": "97"
                }
            ]
        }
    }).render();
});
          </script><br/>
          </div></div><br/><hr/>
           
          <div class="container">
            <div class="page-header">
              <h1 style="font-size:30pt; color:white; ">Doctor Appointment Schedule</h1>
            </div>
          <div class="row">
          </div></div><br/>
        
          <div class="container" align="center">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#view3">View Doctor's Appointment Schedule</button><br/><br/>
          <div id="view3" class="collapse" style="background-color:white; border-radius:10px;"><br/>
          <table class="table table-hover" style="text-align:center;">
            <thead>
              <tr>
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
                    while ($row = mysqli_fetch_array($query4)){
                        ?>
                        <tr>
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
          </div></div><br/>
        
          <div class="container">
            <div class="page-header">
              <h1 style="font-size:30pt; color:white; ">Records</h1>
            </div>
          <div class="row">
          </div></div><br/>
        
          <div align="center">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#view1">View Patients Profile</button>&nbsp;&nbsp;
          <br/><br/>
          <div id="view1" class="collapse" style="background-color:white; border-radius:10px;"><br/>
          <h2>Patients Profile</h2>       
          <table class="table table-hover" style="text-align:center;">
            <thead>
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
                            <td><?=$row['Patient_ID']?></td>
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
                                <a href="delete.php?Account_ID=<?=$row['Account_ID']?>">[DELETE]</a>
                            </td>
                            <tr>
                <?php
                }
                    ?>
                      </tr></tbody>
          </table>
          </div></div>
        
        <div align="center">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#view2">View Guardians Profile</button>
        <br/><br/>
        <div id="view2" class="collapse" style="background-color:white; border-radius:10px;"><br/>
        <h2>Guardians Profile</h2>       
        <table class="table table-hover" style="text-align:center;">
          <thead>
            <tr>
                    <th style="font-size:13pt; text-align:center;"><b>Guardian_ID</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Guardian Name</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Gender</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Phone #</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Occupation</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Address</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Guardian of</b></th>
                    <th style="font-size:13pt; text-align:center;"><b>Relation to Patient</b></th>
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
                    </tr></tbody>
        </table>
        </div></div>
        
        <div class="container">
              <div class="page-header">
                  <h1 style="font-size:30pt; color:white;">User Accounts</h1>
              </div>
          <div class="row">
          </div></div><br/>
          
          <div class="container" align="center">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#view">View User Accounts</button>&nbsp;&nbsp;
          <br/><br/>
          <div id="view" class="collapse" style="background-color:white; border-radius:10px;"><br/>
          <h2>User Accounts</h2> <a href="add.php">[ADD NEW USER]<br/>[PATIENT/DOCTOR/ADMIN]</a>    
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