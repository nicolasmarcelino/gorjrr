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
            $server = "localhost";
            $username = "root";       // Default username for XAMPP is 'root'
            $password = "";           // Default password for XAMPP is empty
            $dbname = "test";

            // Create connection
            $conn = new mysqli($server, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                $sql = "SELECT author, post FROM posts ORDER BY date DESC";
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
            }
?>
        </div>
    </div>



</body>

</html>
