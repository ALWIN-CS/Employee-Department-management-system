<?php
include("db_connect.php");

if(isset($_GET['did']))
{
	$did=$_GET['did'];
	$query_del_dep_applied = "delete from department where d_id=$did";
	$conn->query($query_del_dep_applied);
		
}
header("Location:department.php");

?>