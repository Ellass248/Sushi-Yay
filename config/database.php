<?php

//**koneksi database PDO ( PHP Data Objects) */

$host = "localhost";
$dbname = "sushi_web";
$user = "root"; //default XAMPP
$pass = ""; //default XAMPP

try{
    //DSN ( DATA SOURCE NAME)
    $conn = new PDO ("mysql:host=$host; dbname=$dbname;charset=utf8mb4",$user, $pass);


    //notification ERROR
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die("Connection is failed : " . $e->getMessage());

}