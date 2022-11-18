<?php

include 'connection.php';

error_reporting(0);

$id = $_GET['id'];


$query = " DELETE FROM `q_paper` WHERE id = $id ";

$data = mysqli_query($conn, $query);

if($data){
    echo "<script>alert('Record Deleted Successfully'</script>";

    header('location:yearpaper.php');
   
}else{
        echo "<script>alert('Failed to Delete Record'</script>";
        // header('location:yearpaper.php');
}

?>