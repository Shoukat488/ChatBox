<?php
session_start();
$status = isset($_POST['status'])?$_POST['status']:"";
$username = $_SESSION['username'];
$username = $username .'live.txt';
echo $status;


$file = fopen($username,'w');

fputs($file,$status);
fclose($file);
?>