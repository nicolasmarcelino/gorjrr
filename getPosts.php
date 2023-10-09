<?php
$sql_get_post = "SELECT author, post, date FROM posts ORDER BY date DESC LIMIT $itemsPerPage OFFSET $offset";

$result = $conn->query($sql_get_post);
$conn->close();
?>