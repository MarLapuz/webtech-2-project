<?php
error_reporting(0);
session_start();
if (isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) == 'Admin' OR isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) == 'Doctor' OR isset($_SESSION['User_ID']) == ' ' && ($_SESSION['AccountDescription']) == 'Patient'){
    $dbconnect = mysqli_connect("localhost", "root", "");
    mysqli_select_db($dbconnect, "dbhospital");

if(isset($_GET['User_ID'])){
    $User_ID = $_GET['User_ID'];
    mysqli_query($dbconnect, "DELETE from tblaccounts WHERE User_ID='".$User_ID."'");
    echo"<script>alert('User Account Deleted!'); window.location.href='admin.php';</script>";
}
else if(isset($_GET['Schedule_ID'])){
    $Schedule_ID = $_GET['Schedule_ID'];
    mysqli_query($dbconnect, "DELETE from tblschedule WHERE Schedule_ID='".$Schedule_ID."'");
    echo"<script>alert('Appointment Schedule Deleted!'); window.location.href='admin.php';</script>";
}
else if(isset($_GET['Account_ID'])){
    $Account_ID = $_GET['Account_ID'];
    mysqli_query($dbconnect, "DELETE from tblpatient WHERE Account_ID='".$Account_ID."'");
    echo"<script>alert('Patient Record Deleted!'); window.location.href='doctor.php';</script>";
}
else if (isset($_GET['Guardian_ID'])){
    $Guardian_ID = $_GET['Guardian_ID'];
    mysqli_query($dbconnect, "DELETE from tblguardian WHERE Guardian_ID='".$Guardian_ID."'");
    echo"<script>alert('Guardian Record Deleted!'); window.location.href='doctor.php';</script>";
}
}
else{header("location: login.php");}
?>