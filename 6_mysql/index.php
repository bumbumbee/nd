<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="register.php" method="post" style="display: flex; flex-direction: column; width: 10%">
    Username: <input type="text" name="username" placeholder="Username">
    Password: <input type="password" name="password" placeholder="Password">
    Email: <input type="email" name="email" placeholder="Email">
    Name: <input type="text" name="name" placeholder="Name">
    <input type="submit" value="Submit" name="submit" style="width: 50px; margin-top: 10px">
</form>




</body>
</html>