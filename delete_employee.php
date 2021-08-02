<?php
include("db_connect.php");

if(isset($_GET['empid']))
{
	$empid=$_GET['empid'];
	$query_del_employee= "delete from employee where emp_id=$empid";
	$conn->query($query_del_employee);
		
}
header("Location:employee.php");

?>