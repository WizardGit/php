<?php

include('connectionData.txt');
$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');





$text = $_POST['text'];
$output = wordwrap($text, 60, "<br>");
echo $output;


// this is a small attempt to avoid SQL injection
// better to use prepared statements
$query = "SELECT distinct c.fname, c.lname from customer c where c.fname="Frank"";


$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
echo "55";
printf ("%s (%s) \n", $row[fname],  $row[lname]);
echo "55";
mysqli_free_result($result);
mysqli_close($conn);

echo "kaisersucks";
?>