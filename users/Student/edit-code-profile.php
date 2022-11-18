<?php
   // $conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
    include 'connection.php';
    session_start();
    $unique_id=$_SESSION['user']['unique_id'];
    $firstname=$_SESSION['user']['firstname'];
    $current_photo=$_SESSION['user']['photo'];
    $current_photo_link="../../registration/".$current_photo;
    if(isset($_POST['submit'])){
    // $unique_id=$_POST['unique_id'];
    $section=$_POST['section'];
    $semester=$_POST['semester'];
    $phone=$_POST['phone'];
    $photo=$_FILES['photo']['name'];
    if($photo==''){
        $query="UPDATE `student` SET `section`='$section',`semester`='$semester',`phone`='$phone' WHERE `unique_id`='$unique_id'";
    }
    else{
    $url = "images/";
    $u = "_";
    $e = pathinfo($photo, PATHINFO_EXTENSION);
    $furl = $url.$unique_id.$u.$firstname.'.webp';
    $purl= "../../registration/images/".$unique_id.$u.$firstname.'.webp';
    // echo $section.$semester.$phone.$furl;
    unlink($current_photo_link);
    $e = pathinfo($photo, PATHINFO_EXTENSION);
    $upd = move_uploaded_file($_FILES['photo']['tmp_name'], $purl);
    $query="UPDATE `student` SET `section`='$section',`semester`='$semester',`phone`='$phone', `photo`='$furl' WHERE `unique_id`='$unique_id'";
    }
    $sql=mysqli_query($conn,$query);

    // storing user's email id
    $email=$_SESSION['user']['email'];
    // Query to select current user's data
    $q = "SELECT * FROM `student` WHERE email = '$email'";
    $query=mysqli_query($conn,$q);
    $res=mysqli_fetch_array($query);
    // Fetching the result into Session
    $_SESSION['user'] = $res;
    
    if($sql==1){
        echo '<script>alert("Profile Updated");</script>';
        header("location:profile.php");
    }else{
        header("location:profile.php?msg=NotDone");
    }
    }
    else{
        header("location:profile.php");
    }
?>