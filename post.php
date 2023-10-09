<?php

include_once 'conn.php';

if(isset($_POST['sent']))
{	 
	 $author = $_POST['author'];
	 $message = $_POST['message'];
	 if (empty($_POST['author']) || strlen($_POST['author']) > 20)
	 {
		echo "Your nickname cannot be empty or have more than 20 characters.";
	 } else
	 {
		if (empty($_POST['message']) || strlen($_POST['message']) > 280)
		{
			echo "Your message cannot be empty or exceed 280 characters.";
		} else {
			$sql_insert_post = $conn->prepare("INSERT INTO posts (id, author, date, post) VALUES (NULL, ?, current_timestamp(), ?)");
			$sql_insert_post->bind_param('ss', $_POST['author'], $_POST['message']);

			if ($sql_insert_post->execute()) {
				$sql_insert_post->close();
				mysqli_close($conn);
				header("Location: /gorjrr/");
				exit;
			} else {
				echo "Error: " . $sql_insert_post . "
		" . mysqli_error($conn);
				$sql_insert_post->close();
				mysqli_close($conn);
			}
		}
	 }
}

?>