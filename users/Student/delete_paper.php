<?php

include 'config.php';

$id = $_GET['id'];

$query = " DELETE FROM `q_paper` WHERE id = $id ";

mysqli_query($con, $query);

header('location:uploadQuestion.php');

?>