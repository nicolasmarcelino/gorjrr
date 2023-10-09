<?php
$countQuery = "SELECT COUNT(id) AS totalCount FROM posts";
$countResult = $conn->query($countQuery);
$countData = $countResult->fetch_assoc();

$totalPosts = $countData['totalCount'];
$itemsPerPage = 5;
$totalPages = ceil($totalPosts / $itemsPerPage);
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;  // default to page 1
$offset = ($currentPage - 1) * $itemsPerPage;
?>