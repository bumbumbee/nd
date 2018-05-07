<?php session_start();

?>

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
<form action="user.php" method="post" style="display: flex; flex-direction: column; width: 10%">
    Username: <input type="text" name="username" placeholder="Username">
    Password: <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login" name="login" style="width: 50px; margin-top: 10px">
</form>


<?php if(!empty($_SESSION['username'])):
    echo "Welcome back, ".$_SESSION['username'];
    unset($_SESSION['username']);
//    elseif (!empty($_SESSION['usernameDB'])):  // register.php prie sito failo neprijungtas, todel nk nedarys
//    echo "registration successful";
    else: echo "";
    endif;

    // nesamone, reikia keisti (vykdo po nukreipimo is register.php, itraukimo i duombaze atveju viskas ok, perkrovus vis tiek meta pranesima, kad successful)
//if( !empty($_GET['message']) && $_GET['message'] == 'success' ) :
//    echo "registration successful";
// elseif( !empty($_GET['message']) && $_GET['message'] != 'success' ) :
//    echo "error";
//    endif;
//



    ?>

</body>
</html>
