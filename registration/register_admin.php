<?php
// $conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
include '../connection.php';
if(isset($_POST['submit'])){
    $role = "admin";
    $unique_id = $_POST['unique_id'];
    $firstname = $_POST['firstname'];
    $midname = $_POST['midname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = $_FILES['photo']['name'];
    $url = "images/";
    $u = "_";
    $e = pathinfo($photo, PATHINFO_EXTENSION);
    $furl = $url.$unique_id.$u.$firstname.'.webp';
    $e = pathinfo($photo, PATHINFO_EXTENSION);
    $upd = move_uploaded_file($_FILES['photo']['tmp_name'], $furl);
    echo $upd;
    $query = "INSERT INTO `admin`(`unique_id`, `firstname`, `midname`, `lastname`, `gender`,`phone`, `email`, `password`, `photo`) VALUES ('$unique_id','$firstname','$midname','$lastname','$gender','$phone','$email','$password','$furl')";
    $query1 = "INSERT INTO `login`(`email`, `password`, `role`) VALUES ('$email','$password','$role')";
    $run = mysqli_query($conn, $query);
    $status_change = "UPDATE `verification_data` SET `status`='1' WHERE email='$email'";
    if($run){
        echo "YES";
        
        $run1 = mysqli_query($conn, $query1);
        $schange = mysqli_query($conn, $status_change);
        echo '<script>
                        alert("Successfully Registered"); 
              </script>';
        sleep(4);
        header('Refresh: 3; URL=http://collegespace.epizy.com/index.html?msg=Registered');
    }
    else{
        mysqli_error($conn, $query);
        echo '<script>
                        alert("Registration Failed");
              </script>';
        header('Refresh: 3; URL=http://collegespace.epizy.com/index.html?msg=NotRegistered');
    }
}
?>