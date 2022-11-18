<?php

ob_start();

// $conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
include '../../../connection.php';

if(!$conn){

    echo '<script> alert("Not Connected") </script>';

}

else{

    echo '<script> alert("Connected") </script>';

}





$unique_id = $_POST["unique_id"];

$email = $_POST["email"];

$role = $_POST["role"];

//echo($unique_id.$email.$role);



$query = "INSERT INTO `verification_data`(`unique_id`, `email`, `role`) VALUES ('$unique_id','$email','$role')";



$q = mysqli_query($conn, $query);

echo(mysqli_error($conn));

if($q){

    echo '<h4 style="color: green">Added Successfully</h2>';

}

else{

    echo '<h4 style="color: red">Submission Failed</h2>';

}



?>

