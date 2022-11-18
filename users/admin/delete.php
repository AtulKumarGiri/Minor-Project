<?php
$id=$_GET['id'];
// echo $id;
// $conn = mysqli_connect("sql302.epizy.com","epiz_30514950","LYBnFW3UacatKl","epiz_30514950_tihcollegespace");
include '../../connection.php';
$q="delete from message where id='$id'";

$x=mysqli_query($conn,$q);

if($x==1)
{
     echo ' <script type="text/javascript">
    alert("Successfully!!! Deleted :)");
    location="message_show.php";
    </script>'; 
    
}
else
{
     echo ' <script type="text/javascript">
    alert("Failed to Delete :(");
    location="message_show.php";
    </script>'; 
    
}

?>