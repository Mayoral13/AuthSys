<?php 
$dbname = "portfolio";
$user = "root";
$password = "";
$server = "localhost";

$connection = new PDO("mysql:host = $server;dbname = $dbname;",$user,$password);

if($connection){
    echo("IT WORKS");
}else{
    echo("NOT WORKING");
}
?>