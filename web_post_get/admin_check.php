<?php

$user = array(
    'username' => "admin",
    'password' => "admin123"
);

function checkUser($array, $name, $pass){
    if ($name==$array['username'] && $pass==$array['password']){
        echo "Admin";
        return true;
    } else {
        echo "Not admin";
        return false;

    }

}
checkUser($user, "admin", "admin123321") ;