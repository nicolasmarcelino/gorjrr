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
        <div>
            <form action="post.php" method="POST" class="compose">
                <input type="text" size="20" minlength="1" maxlength="20" placeholder="author" name="author" required>
                <textarea type="text" cols="35" rows="8" spellcheck="false" minlength="1" maxlength="280" placeholder="message" name="message" required></textarea>
                <input value="send" name="sent" type="submit">
            </form>
        </div>
        <div id="posts">
        <?php
            include_once('conn.php');
            include_once('pagination.php');
            include_once('getPosts.php');

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="post">' .'<div class="infos">'.'<p class="author">'.$row["author"].'</p>'.'<p class="date">'.$row["date"].'</p>'.'</div>'.'<p class="message">'.$row["post"].'</p>'.'</div>';
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
    <script src="./script.js"></script>
</body>

</html>
