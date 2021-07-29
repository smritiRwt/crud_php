<?php
	session_start();
	require "db.php";
	require_once "functions.php";
	$user = new CrudClass();

	if(isset($_REQUEST['id'])){
		$st_id = $_REQUEST['id'];
	}
	
	
	$delete =$user->delete_student($st_id);
	if($delete){
		header('Location: get.php?res=1');
		exit();
	}
?>