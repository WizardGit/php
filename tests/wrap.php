<?php

include('connectionData.txt');
$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');



$state = $_POST['state'];
$state = mysqli_real_escape_string($conn, $state);
// this is a small attempt to avoid SQL injection
// better to use prepared statements
$query = "SELECT distinct c.fname, c.lname from customer c where c.fname="Frank";";


$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
echo "55";
//echo $result;
echo "1";
print "<pre>";
echo "2";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
    echo "3";
  //print "\n";
  //print "$row[fname]  $row[lname] $row[description]";
  echo "4";
  echo "$row[fname]  $row[lname] ";
  echo "5";
}
echo "6";
print "</pre>";
mysqli_free_result($result);
mysqli_close($conn);

$text = $_POST['text'];
$output = wordwrap($text, 60, "<br>");
echo $output;
echo "kaisersucks";
?>