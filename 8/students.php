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
<?php

function getDB()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "baltic";
    $dsn = "mysql:host=$host;dbname=$db";
    return new PDO($dsn, $user, $password);
}

// phpMyAdmin sujungta lentele:
$sql = "
SELECT marks.mark, modules.module_name, students.forename, students.surname FROM `students` 
LEFT JOIN marks on students.student_no=marks.student_no
RIGHT JOIN modules on marks.module_code=modules.module_code";

$data = getDB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// paprastas isvedimas i ekrana:
foreach ($data as $student){
    echo $student['mark']." in ".$student['module_name'].", ".$student['forename']." ".$student['surname']."<br>";
}

var_dump($data);
?>

</body>
</html>

