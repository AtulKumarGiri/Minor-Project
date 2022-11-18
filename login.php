<?php
session_start();
//$conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
$conn = mysqli_connect("sql103.epizy.com", "epiz_30798259", "0fc8viOKUIdn", "epiz_30798259_tihcollegespace");
if(!$conn){
    //echo '<script> alert("Server Down"); </script>';
    echo '<h1>Sorry ! Server has been temporarily down.</h1><br><h2>Please Try again Later</h2>';
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $q = "SELECT * FROM `login` WHERE email = '$email' and password = '$pass'";
    $query = mysqli_query($conn, $q);
    if(!$query){
        echo '<script> alert("Invalid Credentials"); </script>';
    }
    $_SESSION['admin'] = false;
    $_SESSION['teacher'] = false;
    $_SESSION['student'] = false;
    
    
    if(mysqli_num_rows($query) > 0){
        $_SESSION['uid'] = $uid;
        $_SESSION['login'] = true;
        while($row = mysqli_fetch_array($query)){
            $role = $row['role'];
        }
        if($role == "admin"){
            $_SESSION['admin'] = true;
            $q = "SELECT * FROM `admin` WHERE email = '$email' and password = '$pass'";
            $query=mysqli_query($conn,$q);
            $res=mysqli_fetch_array($query);
            $_SESSION['user'] = $res;
            header("location:users/admin/index.php");
        }
        elseif($role == "teacher"){
            $_SESSION['teacher'] = true;
            $_SESSION['teacher'] = true;
            $q = "SELECT * FROM `teacher` WHERE email = '$email' and password = '$pass'";
            $query=mysqli_query($conn,$q);
            $res=mysqli_fetch_array($query);
            $_SESSION['user'] = $res;
            header("location:users/Teacher/index.php");
        }
        elseif($role == "student"){
            $_SESSION['student'] = true;
            $q = "SELECT * FROM `student` WHERE email = '$email' and password = '$pass'";
            $query=mysqli_query($conn,$q);
            $res=mysqli_fetch_array($query);
            $_SESSION['user'] = $res;
            header("location:users/Student/index.php");
        }
        
    }
    else{
        echo '<script> alert("Invalid Credentials"); </script>';
    }
}

?>