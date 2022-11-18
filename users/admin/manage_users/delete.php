<?php

ob_start();

// $conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
include '../../../connection.php';
if(!$conn){

    echo '<script> alert("Not Connected") </script>';

}

$email = $_GET["email"];

$role = $_GET["role"];



echo($email.$role);

$query1 = "DELETE FROM `login` WHERE email = '$email'";

if($role == "teacher"){

    $query2 = "DELETE FROM `teacher` WHERE email = '$email'";

}

else{

    $query2 = "DELETE FROM `student` WHERE email = '$email'";

}

$query3 = "DELETE FROM `verification_data` WHERE email = '$email'";





$q1 = mysqli_query($conn, $query1);

if($q1 == 1) {

    //echo "deleted from login";

    $q2 = mysqli_query($conn, $query2);

    if($q2 == 1){

        //echo "deleted from ".$role;

        $q3 = mysqli_query($conn, $query3);

        if($q3 == 1){

            //echo "deleted from verification";

            echo '<script> alert("User deleted"); </script>';

            header("Refresh:1 ../index.php");

        }

        else{

            echo "not deleted from verification".mysqli_error($conn);

        }

    }

    else{

        echo "not deleted from ".$role.mysqli_error($conn);

    }

}

else{

    echo "not deleted from login".mysqli_error($conn);

    

}









