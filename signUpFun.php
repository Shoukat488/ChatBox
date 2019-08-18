<?php
  session_start();

  if(isset($_POST['login']))
  {
    header("location: login1.php");
  }
  if(isset($_POST['signup']))
  { 
      $fullName = $_POST['fullname'];
      $email = $_POST['email'];
      $createPass = $_POST['createPass'];
      $confirmPass = $_POST['confirmPass'];
      
      if($createPass===$confirmPass)
      {
           $_SESSION['pass'] = 'true';
            $username = '';
            for($i = 0 ; $i < strlen($email) ; $i++)
          {
              if($email[$i]=='@')
              break;
              $username = $username.$email[$i];
          }
          $data = ', { "username": "'.$username.'", "name": "'.$fullName.'", "password": "' .$createPass. '" }]';
          $dataFile = fopen('loginData.json','r+');
          $Data = fread($dataFile, filesize('loginData.json'));
          echo $data;
          fseek($dataFile,-1,SEEK_END);
          fwrite($dataFile,$data);
          fclose($dataFile);
          
          //creating file if doesn't exit
          $newfile = $username.'.txt';
          $file =  fopen($newfile,'a');
          if($file)
          {
            $liveFile = $username.'live.txt';
            $file = fopen($liveFile,'a');
          }
          fclose($file);
          header("location: login1.php");
      }
      else{
      $_SESSION['pass'] = 'false';
      header("location: signup.php");

      }
  }

// echo $_SESSION['pass'];
?>
