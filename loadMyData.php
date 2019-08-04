<?php
$dataForMe = isset($_POST['dataForMe'])?$_POST['dataForMe']:"";
$dataForYou = isset($_POST['dataForYou'])?$_POST['dataForYou']:"";

echo $dataForMe;
echo $dataForYou;

$meFile = fopen('sender.txt','w') or die("Unable to open");

// fputs($dataForMe,$meFile);
?>
