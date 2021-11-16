<!--
Author: Kaiser
Original Author: Chris
Date last edited: 11/2/2021
-->

<?php
include('connectionData.txt');
$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');
?>

<html lang="en">
<head>
  <title>Another Simple PHP-MySQL Program</title>
  <link rel="stylesheet" href="displayResultsStyle.css" />  
  </head>  
  <body>
  <section>
  <a href="index.html">Back to Home Page</a>
    
<?php  
$state = $_POST['state'];
$state = mysqli_real_escape_string($conn, $state);
// this is a small attempt to avoid SQL injection
// better to use prepared statements
$query = "SELECT c.fname, c.lname from customer c where c.fname='frank'";
?>

<p> <h2>The query:</h2> <p>
<?php
print $query;
?>

<p> <h2>Result of query:</h2> <p>
<p>
<?php
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
  print "\n";
  print "$row[fname]  $row[lname] ";
  if ($row[lname] == "Albertson")
  {
    
    print "dang";
  }
    
}
print "</pre>";
mysqli_free_result($result);
mysqli_close($conn);

echo '<script type="text/javascript">',
     'jsfunction();',
     '</script>'
;

?>
</p>
<script>
  function jsfunction(){
    console.log("hellokaiser");
  }
  </script>
</section>
</body>
</html>	  