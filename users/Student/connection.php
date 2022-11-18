<?php
$host = 'sql302.epizy.com';
$username = 'epiz_30514950';
$pass = 'LYBnFW3UacatKl';
$db = 'epiz_30514950_tihcollegespace';

// $db = new mysqli($host,$username,$pass,$db);

// $conn = mysqli_connect($host,$username,$pass,$db);

$conn = mysqli_connect("sql103.epizy.com", "epiz_30798259", "0fc8viOKUIdn", "epiz_30798259_tihcollegespace");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
  }

?>