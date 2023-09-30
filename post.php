<?php

include_once 'conn.php';

if(isset($_POST['sent']))
{	 
	 $author = addslashes($_POST['author']);
	 $message = addslashes($_POST['message']);
	 if (empty($author) || strlen($author) > 20)
	 {
		echo "Your nickname cannot be empty or have more than 20 characters.";
	 } else
	 {
		if (empty($message) || strlen($message) > 280)
		{
			echo "Your message cannot be empty or exceed 280 characters.";
		} else {
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
	 }
}

?>