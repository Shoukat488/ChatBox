<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body{
        background:rgb(6, 6, 53);
        color: #ffffff;
        }
    </style>
</head>
<body>
 
        <div class="containerLogin">
            <form class="form" action="login.php" method="POST">
          Username <input type="text" class="form-control" name="username" id="username">
          Password <input type="password" class="form-control" name="password" id="password">
           <button type="submit" class="btn btn-primary" name ="submit" id="login" style="margin-top: 10px">Login</button>
           <span class="sign"><a name="goForSignUp" href="">sign up</a></span> 
            </form>
            <?php
            if(isset($_SESSION['status']))
            if($_SESSION['status'] =='false'){
               echo '<span style="color: crimson">Invalid username and password</span>';
            }
             ?>
           
       </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>