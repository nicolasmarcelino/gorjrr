<?php

include_once 'database.php';
if(isset($_POST['sent']))
{	 
	 $author = $_POST['author'];
	 $message = $_POST['message'];
	 $sql = "INSERT INTO posts (id, author, date, post)
	 VALUES (NULL,'$author',current_timestamp(),'$message')";
	 if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		header("Location: /gorjrr/");
		exit;
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
		mysqli_close($conn);
	 }
}

?>