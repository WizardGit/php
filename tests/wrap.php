<?php

include('connectionData.txt');
$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');

$text = $_POST['text'];
$output = wordwrap($text, 60, "<br>");


// this is a small attempt to avoid SQL injection
// better to use prepared statements
$query = "SELECT distinct c.fname, c.lname
from customer c
inner join orders o on c.customer_num=o.customer_num
inner join items i on o.order_num=i.order_num
inner join stock s on i.stock_num=s.stock_num and i.manu_code=s.manu_code
inner join manufact m on s.manu_code=m.manu_code";


$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
printf ("%s (%s)\n", $row["fname"], $row["lname"]);
printf ("%s (%s)\n", $row["fname"], $row["lname"]);
print "</pre>";
mysqli_free_result($result);
mysqli_close($conn);


echo $output;
echo "kaisersucks";
?>