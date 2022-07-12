<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
  <h1>Data in the Celebrity table</h1>
<?php
  $user = "root";
  $pword = "";
  $dbase = "schneiderminiproject2";
  $mydb = new mysqli('localhost', $user, $pword, $dbase);
  if ($mydb->connect_error) {
    die( "Failed to connect to MySQL: " . $mydb->connect_error);
  }
  print ("<table>");
  print ("<tr><th>name</th><th>url</th></tr>");

  $query = "SELECT name, url FROM celebs;";
  if ($result = $mydb->query($query)) {
    while ($row = $result->fetch_assoc()) {
      // Output the results as an html table
      print ("<tr>");
      foreach ( $row as $key => $value ) {
        print ("<td>$key : $value</td>");
      }
      print ("</tr>");
    }
  }
  $mydb->close();
?>
</table>
</body>
</html>
