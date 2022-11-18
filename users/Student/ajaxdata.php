<?php
include("config.php");
$semdata = $_POST['semdata'];
if($semdata == "semester")
{
 $id = $_POST['semid'];
 $semester = $con->query("SELECT * FROM semesters WHERE streams_id='$id'");
 while ($sem = $semester->fetch_assoc()) 
 {
     $data[] = $sem;
 }
 echo json_encode($data);
}
else if($semdata == "subject")
{
 $id = $_POST['semid'];
 $semester = $con->query("SELECT * FROM subjects WHERE semesters_id='$id'");
 while ($sem = $semester->fetch_assoc()) 
 {
     $data[] = $sem;
 }
 echo json_encode($data);
}
?>