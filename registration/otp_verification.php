<?php
session_start();
    
    // $conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
    include '../connection.php';
    $otp = $_POST['otp'];
    $email = $_SESSION['user']['email'];
    $check1 = "SELECT * FROM verification_data where email='$email'" ;
    $q1 = mysqli_query($conn,$check1);
    $arr1 = mysqli_fetch_array($q1);
    // echo("otp is".$arr1['otp']);
    // echo '<script>alert("$otp");</script>';
    
   if($arr1['otp'] == $otp  && $_SESSION['user']['role'] == "teacher"){
   // if(mysqli_num_rows($q1) > 0 && $_SESSION['user']['role'] == "teacher") {
        echo "teacher";
    }
    //else if(mysqli_num_rows($q1) > 0 && $_SESSION['user']['role'] == "student") {
    else if($arr1['otp'] == $otp && $_SESSION['user']['role'] == "student") {
        echo "student";
    }
    else if($arr1['otp'] == $otp && $_SESSION['user']['role'] == "admin") {
        echo "admin";
    }
    else{
        echo '<label color="red">Please enter a valid otp</label>';
    }

?>