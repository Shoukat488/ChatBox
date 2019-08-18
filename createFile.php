<?php
    // session_destory();
    // session_start();
    $username = isset($_POST['username'])?$_POST['username']:"";
    
    echo $username ;
    // $username = $username + ".txt";
    $file = fopen($username,'a') or die("Sorry, we can't open file");
    fclose($file);
    
    //echo $username;
    // $JsonFile = json_encode($username,true);
    // echo $JsonFile;
    // $username = $JsonFile;
    // echo $username;


