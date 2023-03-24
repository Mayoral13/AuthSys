<?php 
$dbname = "portfolio";
$user = "root";
$password = "";
$server = "localhost";

$connection = new PDO("mysql:host = $server;dbname = $dbname;",$user,$password);

if($connection){
}else{
    echo("NOT WORKING");
}
?>