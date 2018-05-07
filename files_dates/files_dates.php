<?php

// sukuria/
$file='files.txt';
date_default_timezone_set ("Europe/Vilnius");
$date=date("Y-m-d H:i:s");

$uploaddir = __DIR__."\\contents\\";
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

$name = basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.<br>";
    if(!file_exists($file)){
        //sukuriam
        file_put_contents($file, [$name, '-', $date, ', ']);

    } else {
        //papildom
        file_put_contents($file, [PHP_EOL, $name, '-', $date, ', '], FILE_APPEND);

    }

} else {

    var_dump($_FILES);
    echo "Possible file upload attack!\n";
}

// atvaizduoja tiesiog sarasa
$fileInfo = file_get_contents($file);
echo $fileInfo;



