<?php
// $conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
include '../connection.php';
if(isset($_POST['submit'])){
    $role = "student";
    $unique_id = $_POST['unique_id'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $query = "UPDATE `student` SET `password`='$password' WHERE unique_id='$unique_id'";
    $run = mysqli_query($conn, $query);
    $status_change = "UPDATE `login` SET `password`='$password' WHERE email='$email'";
    if($run){
        echo "YES";

        $run1 = mysqli_query($conn, $query1);
        $schange = mysqli_query($conn, $status_change);
        echo '<script>
                        alert("Password Changed"); 
              </script>';
        sleep(4);
        header('Refresh: 3; URL=http://collegespace.epizy.com/index.html?msg=PasswordChanged');
    }
    else{
        mysqli_error($conn, $query);
        echo '<script>
                        alert("An Error Occured");
              </script>';
        header('Refresh: 3; URL=http://collegespace.epizy.com/index.html?msg=Error');
    }
}
?>