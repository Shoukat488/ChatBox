<?php
    session_start();
?>

<script>
    var username = '<?php echo $_SESSION["username"]; ?>';
</script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat Box</title>
    <link rel="stylesheet" type="text/css" href="custom.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/3.0.1/mustache.min.js" type="text/javascript"></script>
    <script src="custom.js" type="text/javascript"></script>
    <style>
     
    </style>
</head>
<body>
<div class="containerMain">
        <div class="chatLogs" id="chatBox">
        </div>
        <div class="chat-form">
        <textarea class="form-control" id="comment" rows="1" placeholder="write something......."></textarea>
        <button type="button" class="btn btn-primary" id="send">Send</button>
        </div>
</div>
</body>
</html>