<?php
 
$mysqli = new mysqli('localhost', 'root', '', 'proiect3.0');
 
if($mysqli === false){
    die("Connection failed. " . $mysqli->connect_error);
}