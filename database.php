<?php
$server = "localhost";
$username = "root";       // Default username for XAMPP is 'root'
$password = "";           // Default password for XAMPP is empty
$dbname = "test";

$conn=mysqli_connect($server,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
?>