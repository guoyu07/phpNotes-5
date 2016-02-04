<?php 

require_once('new-connection.php');

session_start();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="/style.css">
 	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 	<title>Ajax Notes</title>
 	<script type="text/javascript">
 	$(document).ready(function (){
 		$('.update_dec').submit(function (){
 			console.log(this);
 			$.post('/process.php', $(this).serialize(), function(res){

 			});

 		})

 	})
 	</script>
 </head>
 <body>
 	<div class = 'container' style="text-align:center">
 		
 	<h1>Ajax Notes</h1>
 	<?php
 		$query = "SELECT notes.title, notes.description, notes.id
 				  FROM notes";
 		$results = fetch_all($query);
 		for ($i=0; $i < count($results); $i++) { 
 			$title = $results[$i]['title'];
 			$description = $results[$i]['description'];
 			?>
 			<div class = 'noteBox'>	
 			<form class = 'delete' action = 'process_delete.php' method = 'post'>
 				<input type = 'hidden' name = 'delete_id' value = <?php echo $results[$i]['id']; ?>>
 				<input class = 'button' style='margin-top:20px;' type = 'submit' value = 'delete note'>
 			</form>
 			<h3 class = 'title'><?php echo $title ?></h3>
 			<form class = 'update_dec'>
 				<input type = 'hidden' name='id' value = <?php echo $results[$i]['id']; ?>>
 				<textarea class="description" name = 'description'><?php echo $description ?></textarea>
 				<input class = 'button' type = 'submit' value = 'update description'>
 			</form>
 			</div>
 			<?php
 		}
 	?>
 	<form style="margin-bottom:20px;" action = 'process.php' method = 'post'>
 		<!-- <p><?php if(isset($_SESSION['noteError'])){ echo $_SESSION['noteError'];} ?></p> -->
 		<input style="border-radius:10px;padding-left:5px;" type = 'text' name = 'newNote' placeholder = 'add a new note'>
 		<input class="button" type = 'submit' value = 'Submit'>
 	</form>
 	</div>
 </body>
 </html>