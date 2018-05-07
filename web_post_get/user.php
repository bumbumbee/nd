<?php

session_start();

$name = $_POST['username'];
$pass = $_POST['password'];
$_SESSION['username'] = $name;
header("Location: index.php");



