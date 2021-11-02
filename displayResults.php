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
$state = $_POST['state'];
$state = mysqli_real_escape_string($conn, $state);
// this is a small attempt to avoid SQL injection
// better to use prepared statements
$query = "SELECT DISTINCT firstName, lastName, city FROM customer WHERE state = ";
$query = $query."'".$state."' ORDER BY 2;";
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
  print "$row[firstName]  $row[lastName] $row[city]";
}
print "</pre>";
mysqli_free_result($result);
mysqli_close($conn);
?>
</p>
</section>
</body>
</html>	  