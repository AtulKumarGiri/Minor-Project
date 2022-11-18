
<?php
session_start();
// $conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");

$conn = mysqli_connect("sql103.epizy.com", "epiz_30798259", "0fc8viOKUIdn", "epiz_30798259_tihcollegespace");
if(!$conn){
    echo '<script> alert("Not Connected") </script>';
}
else{
    echo '<script> alert("Connected") </script>';
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $role = $_POST['role'];
    //echo('<script> alert("Logged in as "+$email) </script>');
    $check = "SELECT * FROM verification_data where email='$email'";
    $q = mysqli_query($conn,$check);
    $arr = mysqli_fetch_array($q);
    $_SESSION['user'] = $arr;
    $unique_id = $arr['unique_id'];
    if($arr['status'] != 0 && $arr['role'] == $role){
        echo '<script> alert("Email Already Registered! Please Go To Login Section.") </script>';
        header("refresh:1;url=https://tihcollegespace.epizy.com");
    }
    else if($arr['role'] == $role){
        $_SESSION['valid'] = true;
        include "datamail.php";
         
    }
    else {
        ?>
            <script> alert("Email is not registered as a <?php echo $role; ?>"); </script>
        <?php
        //echo '<script> alert("Email is not registered as a '.$role'") </script>';
       // echo "Email is not registered as a $role";
    } 
}
?>
