<?php

include_once 'conn.php';

if(isset($_POST['sent']))
{	 
	 $author = addslashes($_POST['author']);
	 $message = addslashes($_POST['message']);
	 if(strlen($author) >= 1 && strlen($author) <= 20)
	 {
		if(strlen($message) >= 1 && strlen($message) <= 280)
		{
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
		} else {
			echo "Your message cannot be empty or exceed 280 characters.";
		}
	 } else
	 {
		echo "Your nickname cannot be empty or have more than 20 characters.";
	 }
}

?>