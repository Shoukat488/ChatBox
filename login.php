<?php
    session_start();
    if (isset($_POST['submit']))
    {
         $username = $_POST['username'];
         $password = $_POST['password'];
         $flag = 0;
        $loginFile = fopen('loginData.json','r') or die("File can't open");

        if($loginFile)
        {
            $Data = fread($loginFile, filesize('loginData.json'));
            $data = json_decode($Data);
            foreach( $data as $obj ){
                if ( ($username == $obj->username) && ($password == $obj->password ))
                {
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $flag = 1;
                    header("location:main.php");

                }
//                echo $obj->username;
                }
                
        }
        if($flag == 0)
        {
            header("location:login.html");
        }

    }



