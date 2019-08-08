<?php
  session_start();

  // if(isset($_POST['login']))
  // {
  //   header("location: login1.php");
  // }
  if(isset($_POST['signup']))
  {
      $fullName = $_POST['fullname'];
      $email = $_POST['email'];
      $createPass = $_POST['createPass'];
      $confirmPass = $_POST['confirmPass'];

      if($createPass===$confirmPass)
      {
        $_SESSION['pass'] = 'true';
      }
      else{
        $_SESSION['pass'] = 'false';
      $username = '';

      for($i = 0 ; $i < strlen($email) ; $i++)
      {
          if($email[$i]=='@')
          break;
          $username =+ $email[$i];
      }
      $data = $username+' : { "username": '+$username+'; "name: '+$fullName+' ; password: ' ++ ' '
      $createFile = fopen('loginData.json','a');

      }
  }


?>
