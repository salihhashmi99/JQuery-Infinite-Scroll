<?php
$servername="localhost";
$username="root";
$password="";
$dbname="web_db";

$conn= new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Failed to Connect the database: ".$conn->connect_error);
}
?>