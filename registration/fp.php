

<?php

session_start();

// $conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
include '../connection.php';

if(!$conn){

    echo '<script> alert("Not Connected") </script>';

}

else{

    echo '<script> alert("Connected") </script>';

}



if(isset($_POST['submit'])){

    $email = $_POST['email'];

    $role = $_POST['role'];

//echo($email.$role);

//echo('<script> alert("Logged in as "+$email) </script>');

    $check = "SELECT * FROM verification_data where email='$email'";

    $q = mysqli_query($conn,$check);

    $arr = mysqli_fetch_array($q);

    //echo($arr['role']);

    $_SESSION['user'] = $arr;

    $unique_id = $arr['unique_id'];

    if($arr['role'] == $role){

        $_SESSION['val'] = true;

        include "fp_mail.php";

        echo("sent");



    }

    else {

        

        echo('<script> alert("Email is not registered as a <?php echo $role; ?>"); </script>');

        header("refresh:1;url=http://collegespace.epizy.com/index.html");

        //echo '<script> alert("Email is not registered as a '.$role'") </script>';

        // echo "Email is not registered as a $role";

    } 

}



?>

