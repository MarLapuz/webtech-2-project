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
                background-color: white;
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
           .carousel-inner img {
             width: 100%; /* Set width to 100% */
             min-height: 200px;
           }
           @media (max-width: 600px) {
             .carousel-caption {
               display: none; 
             }
           }
            .hideme
           {
            opacity:0;
           }
  </style>
</head>
    
    <body style="background-color:whitesmoke;"><header style="background-color:#68DCFA; color:white; padding: 5px 0px 0px 0px;"><img src="call.png" style="height:15px;">Call Us: (+639) 123 456 7890 &nbsp;&nbsp;&nbsp; <img src="mail.png" style="height:15px;"> Email Us: HMS@gmail.com  
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
                    <li><a style="text-decoration:none; color:white;" href=""><b>SERVICES</b></a></li>
                    <li><a style="text-decoration:none; color:white;" href="home.php"><b>HOME</b></a></li><br/>
                    <b style="color:white; font-size:18pt;">Welcome <?php echo ucfirst($_SESSION['AccountDescription']); echo '&nbsp;'; echo ucfirst($_SESSION['Username']);?></b>
                </ul>
            </nav>
        </header>
        
            <div align="center" class="page-header">
              <h1 style="font-size:30pt; color:#08BDEA;">HOSPITAL MANAGEMENT SYSTEM</h1>
                
            </div>
        
        <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
        
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="services1.jpg" alt="Image">
                  <div class="carousel-caption">
                    <h1 style="color:#68DCFA;">WE GIVE OUR BEST FOR YOUR HEALTH</h1>
                    Lorem ipsum...
                  </div>      
                </div>
        
                <div class="item">
                  <img src="services2.jpg" alt="Image">
                  <div class="carousel-caption">
                    <h1 style="color:#68DCFA;">OUR HEALTH CARE IS HIGHLY RECOMMENDED</h1>
                    Lorem ipsum...
                  </div>  
                    
                </div><div class="item">
                  <img src="services3.jpg" alt="Image">
                  <div class="carousel-caption">
                    <h1 style="color:#68DCFA;">SAVING PEOPLE'S LIVES</h1>
                    Lorem ipsum...
                  </div>      
                </div>
              </div>
        
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
                    <div align="center">
                      <h1 style="font-size:25pt; color:#08BDEA;">ABOUT US</h1>
                      <img src="beat.png" style="height:50px; float:center;">
                    </div>
          <div class="col-sm-4">
            <div class="well" style="border-radius:10px; background-color:#68DCFA;">
              <h4 style="color:white;">At Heart Haven Hospital we intend to help our patient to improve both the quality and duration of their lives.        </h4>
            </div>
            <div class="well" style="border-radius:10px; background-color:#68DCFA;">
                <h4 style="color:white;">We strive to make our patient feel comforatble and safe at the same time.</h4>
            </div>
            <div class="well" style="border-radius:10px; background-color:#68DCFA;">
                <h4 style="color:white;">Our Hospital is willing to help those in need in time of calamaties or emergencies.</h4>
            </div>
          </div>
        </div>
        <hr>
        </div>

        <div class="container text-center">    
            <h2 style="color:#08BDEA;">OUR SERVICES</h2>
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
          <br/><br/>
          <div class="row">
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:180px; border-radius:10px;">
              <img src="logo1.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h3 style="color:white;">General Health Checkup</h3>
                </div>
            </div>
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:180px; border-radius:10px;">
              <img src="logo2.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h3 style="color:white;">Dental Service</h3>
                </div>
            </div>
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:180px; border-radius:10px;">
              <img src="logo3.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h3 style="color:white;">Preventative Care</h3>
                </div>
            </div>
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:180px; border-radius:10px;">
              <img src="logo4.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h3 style="color:white;">Surgery</h3>
                </div>
            </div> 
          </div><br/>
            <div class="row">
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:180px; border-radius:10px;">
              <img src="logo5.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h3 style="color:white;">X-ray</h3>
                </div>
            </div>
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:180px; border-radius:10px;">
              <img src="logo6.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h3 style="color:white;">Emergency Service</h3>
                </div>
            </div>
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:180px; border-radius:10px;">
              <img src="logo7.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h3 style="color:white;">Rehabilitation Care</h3>
                </div>
            </div>
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:180px; border-radius:10px;">
              <img src="logo8.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h3 style="color:white;">Pharmacy</h3>
                </div>
            </div>
          </div>
          <hr/>
        </div>
        
        <div class="container text-center">    
          <h2 style="color:#08BDEA;">SERVICES PRICE</h2>
          <br/>
          <div class="row">
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:280px; border-radius:10px;"><br/>
                    <h4 style="color:white;">VISION CORRECTION</h4>
                    <h3 style="color:white;">$200.00</h3>
              <img src="eye.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h4 style="color:white;">SCHEDULE AN APPOINTMENT NOW</h4>
                </div>
            </div>
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:280px; border-radius:10px;"><br/>
                    <h4 style="color:white;">LAB TEST</h4>
                    <h3 style="color:white;">$200.00</h3>
              <img src="lab.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h4 style="color:white;">SCHEDULE AN APPOINTMENT NOW</h4>
                </div>
            </div>
           <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:280px; border-radius:10px;"><br/>
                    <h4 style="color:white;">GENERAL CHECKUP</h4>
                    <h3 style="color:white;">$300.00</h3>
              <img src="pulse.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h4 style="color:white;">SCHEDULE AN APPOINTMENT NOW</h4>
                </div>
            </div>
            <div class="col-sm-3 hideme">
                <div align="center" style="background-color:#08BDEA; width:100%; height:280px; border-radius:10px;"><br/>
                    <h4 style="color:white;">VACCINATION</h4>
                    <h3 style="color:white;">$100.00</h3>
              <img src="inject.png" class="img-responsive" style="height:100px; padding-top:10px;" alt="Image">
                    <h4 style="color:white;">SCHEDULE AN APPOINTMENT NOW</h4>
                </div>
            </div>
          </div>
        </div><hr/><br/>
        
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