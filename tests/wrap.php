<?php

include('connectionData.txt');
$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');



$state = $_POST['state'];
$state = mysqli_real_escape_string($conn, $state);
// this is a small attempt to avoid SQL injection
// better to use prepared statements
$query = "SELECT distinct c.fname, c.lname, s.description
from customer c
inner join orders o on c.customer_num=o.customer_num
inner join items i on o.order_num=i.order_num
inner join stock s on i.stock_num=s.stock_num and i.manu_code=s.manu_code
inner join manufact m on s.manu_code=m.manu_code
where m.manu_name=";
$query = $query."'".$state."'order by c.fname, c.lname asc;";


$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
echo "uGHHHHHHHH";
print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
  print "\n";
  print "$row[fname]  $row[lname] $row[description]";
  echo "uGHHHHHHHH";
  echo "$row[fname]  $row[lname] $row[description]";
  echo "uGHHHHHHHH";
}
print "</pre>";
mysqli_free_result($result);
mysqli_close($conn);

$text = $_POST['text'];
$output = wordwrap($text, 60, "<br>");
echo $output;
echo "kaisersucks";
?>