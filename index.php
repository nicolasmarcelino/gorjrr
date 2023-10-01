<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>gorjrr</title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>gorjrr</h1>
        </div>
        <div id="compose">
            <form action="post.php" method="POST" class="compose">
                    <input type="text" minlength="1" maxlength="20" placeholder="author" name="author" required>
                    <input type="text" minlength="1" maxlength="280" placeholder="message" name="message" required>
                    <input value="send" name="sent" type="submit">
            </form>
        </div>
        <div id="posts">
        <?php
            include_once('conn.php');
            $countQuery = "SELECT COUNT(id) AS totalCount FROM posts";
            $countResult = $conn->query($countQuery);
            $countData = $countResult->fetch_assoc();

            $totalPosts = $countData['totalCount'];
            $itemsPerPage = 5;
            $totalPages = ceil($totalPosts / $itemsPerPage);
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;  // default to page 1
            $offset = ($currentPage - 1) * $itemsPerPage;

            // SQL query to fetch desired data
            $sql = "SELECT author, post FROM posts ORDER BY date DESC LIMIT $itemsPerPage OFFSET $offset";

            $result = $conn->query($sql);
            $conn->close();
    
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="post">' . '<p class="author">'.$row["author"].'</p>'.'<p class="message">'.$row["post"].'</p>'.'</div>';
                }
            } else {
                echo '<div class="error">0 results<div>';
            }

?>
        </div>
        <div>
        <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $currentPage) {
                    echo $i;  // Current page, don't make it a link
                } else {
                    echo "  <a href='?page=$i'>$i</a>  ";
                }
            }
        ?>

        </div>
    </div>
</body>

</html>
