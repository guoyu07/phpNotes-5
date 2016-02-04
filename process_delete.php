<?php 

require_once('new-connection.php');

session_start();

global $connection;

$delete_id = mysqli_escape_string($connection, $_POST['delete_id']);

$query = "DELETE FROM notes WHERE id = $delete_id";

run_mysql_query($query);
header("Location: index.php");
die();

?>