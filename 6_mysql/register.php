<?php

session_start();


$pdo = new PDO('mysql:host=localhost;dbname=baltic', 'root', '');


function registerUser($db)
{
    $usernameDB = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];


    $sql = "INSERT INTO users (username, password, email, name) VALUES (:username, :password, :email, :name)";
    $sth = $db->prepare($sql);
    $sth->bindParam(':username', $usernameDB);
    $sth->bindParam(':password', $password);
    $sth->bindParam(':email', $email);
    $sth->bindParam(':name', $name);


    $sth->execute();
}

registerUser($pdo);

$_SESSION['username']=$usernameDb;


header("Location: ../web_post_get/index.php?message=success");
