<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ems";
$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{ die("failed".$conn->connect_error);
}	
?>