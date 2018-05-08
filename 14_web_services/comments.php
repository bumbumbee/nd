<?php

// phpMyAdmin lenteles comments kodas:
//CREATE TABLE comments (
//    id INT AUTO_INCREMENT PRIMARY KEY,
//author VARCHAR(30) NOT NULL,
//comment TEXT,
//created_at TIMESTAMP
//)

require ("../../../vendor/autoload.php");



function getDb(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "baltic";
    $dsn = "mysql:host=$host;dbname=$db";
    return new PDO($dsn, $user, $password);
}

$author="";
$comment="";
$created_at="";


function createFakers(){
    $faker = Faker\Factory::create();

    $sql = "
INSERT INTO comments (author, comment, created_at) VALUES (:author, :comment, :created_at)
";

    $sth = getDB()->prepare($sql);
    $sth->bindParam(':author', $author);
    $sth->bindParam(':comment', $comment);
    $sth->bindParam(':created_at', $created_at);

    // generuoja komentarus/autorius:
    for ($i=0; $i < 10; $i++) {
        $author=$faker->name;
        $comment=$faker->realText($maxNbChars = 200, $indexSize = 2);
        $created_at=$faker->date($format = 'Y-m-d', $max = 'now');
        $sth->execute();
    //    echo $author." ".$comment." ".$created_at."<br>";
    }
}

createFakers();


function comments_web(){
    $sql = "SELECT comment from comments";

    $data = getDB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $data=array_slice($data, -10, 10, true);

    $result=array();

    foreach ($data as $comment){
        array_push($result, $comment);
    }
    // naujausi 10 komentatu json formatu:
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    echo json_encode($result);
}
comments_web();





