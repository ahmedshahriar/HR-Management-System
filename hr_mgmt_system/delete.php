<?php 
	include "db.php";

	$id="";
	$did="";
	$sid="";
	$tid="";
	$lid="";
	$rid="";
	$uid="";
	$pid="";
	

	$con=DBconnection();

	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		
		$sql="delete from employee_info where emp_id='$id'";
		$result = oci_parse($con, $sql);
		oci_execute($result);
		header("location:index.php");

	}

	if (isset($_GET['did'])) {
		$did=$_GET['did'];
		
		$sql="delete from department_info where dept_id='$id'";
		$result = oci_parse($con, $sql);
		oci_execute($result);
		header("location:department.php");

	}
	if (isset($_GET['sid'])) {
		$sid=$_GET['sid'];
		
		$sql="delete from sal_info where sal_id='$sid'";
		$result = oci_parse($con, $sql);
		oci_execute($result);
		header("location:salary.php");

	}
	if (isset($_GET['tid'])) {
		$tid=$_GET['tid'];
		
		$sql="delete from trainings_info where trng_id='$tid'";
		$result = oci_parse($con, $sql);
		oci_execute($result);
		header("location:training.php");

	}

	if (isset($_GET['lid'])) {
		$lid=$_GET['lid'];
		
		$sql="delete from login_info where login_id='$lid'";
		$result = oci_parse($con, $sql);
		oci_execute($result);
		header("location:logininfo.php");

	}
	if (isset($_GET['rid'])) {
		$rid=$_GET['rid'];
		
		$sql="delete from roles_info where role_id='$rid'";
		$result = oci_parse($con, $sql);
		oci_execute($result);
		header("location:roles.php");

	}
	if (isset($_GET['uid'])) {
		$uid=$_GET['uid'];
		
		$sql="delete from user_info where user_id='$uid'";
		$result = oci_parse($con, $sql);
		oci_execute($result);
		header("location:users.php");

	}
	
	if (isset($_GET['pid'])) {
		$pid=$_GET['pid'];
		
		$sql="delete from permission_info where per_id='$pid'";
		$result = oci_parse($con, $sql);
		oci_execute($result);
		header("location:permission.php");

	}
	

	

	



 ?>