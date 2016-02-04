<?php 

require_once('new-connection.php');

session_start();

global $connection;
if($_POST['newNote'] != NULL){
	$note = mysqli_escape_string($connection, $_POST['newNote']);
	$query = "INSERT INTO notes (title, description, created_at, updated_at)
			  VALUES('{$note}',  null, NOW(), NOW())";
	run_mysql_query($query);
	header("Location: index.php");
	die();	
}else{
	$description = mysqli_escape_string($connection, $_POST['description']);
	$id = mysqli_escape_string($connection, $_POST['id']);
	// var_dump($id);
	// die();
	$query_update = "UPDATE notes SET description = '{$description}'
			  WHERE id = $id";
	run_mysql_query($query_update);
	// var_dump($_POST['newNote']);
	// die();
	header("Location: index.php");
	die();
}

?>
