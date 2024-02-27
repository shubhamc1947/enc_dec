<?php

$db=mysqli_connect("localhost","root","mysql","php_learning") or die("Could not Connect");




// Encryption Decryption Topic

// ---------------------------------------------

// $iv=openssl_random_pseudo_bytes(16);//ye bin me rhega but store in hex always 
// before inserting it convert it to hex as it is bin in starting
// before decrypting it ,convert it to bin as it is a hex in the database but we encrypt using bin
// $iv=bin2hex($iv);

// $iv=hex2bin($row['iv']);

function str_openssl_enc($str,$iv){
    $key="abcsdfsdxf";
    $chiper="AES-128-CTR";
    $options=0;
    $str=openssl_encrypt($str,$chiper,$key,$options,$iv);
    return $str;
}

function str_openssl_dec($str,$iv){
    $key="abcsdfsdxf";
    $chiper="AES-128-CTR";
    $options=0;
    $str=openssl_decrypt($str,$chiper,$key,$options,$iv);
    return $str;
}

?>