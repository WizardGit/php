<!--
Author: Kaiser
Original Author: Chris
Date last edited: 11/1/2021
-->

<?php
include('connectionData.txt');
$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');
?>

<html>
<head>
  <title>Another Simple PHP-MySQL Program</title>
  <link rel="stylesheet" href="displayResultsStyle.css" />  
  </head>  
  <body>
  <section>
<?php  
$manu_name = $_POST['manu_name'];
$manu_name = mysqli_real_escape_string($conn, $manu_name);
// this is a small attempt to avoid SQL injection
// better to use prepared statements
$query = "SELECT c.fname, c.lname, s.description, m.manu_name
from customer c
inner join orders o on c.customer_num=o.customer_num
inner join items i on o.order_num=i.order_num
inner join stock s on i.manu_code=s.manu_code
inner join manufact m on s.manu_code=m.manu_code
where m.manu_name=";
$query = $query."'".$manu_name."' ORDER BY c.lname asc;";
?>

<p>
The query:
<p>

<?php
print $query;
?>

<p>
Result of query:
<p>
<p>
<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
  print "\n";
  print "$row[firstName]  $row[lastName] $row[description]";
}
print "</pre>";
mysqli_free_result($result);
mysqli_close($conn);
?>
</p>
</section>
</body>
</html>	  