<?php
// Create connection
// replace agursoy with your mysql username
// replace agursoy with your database name (username_db)
// replace <yourpasswordhere> with your password
$con=mysqli_connect("localhost","group9","group9comp306","group9");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// display result in an HTML table

$result = mysqli_query($con,"select sum(amount) as totA,user_name
from Ticket natural join Customer
group by user_name desc limit 1
");

echo "
<th>Find the customer who has spent the most money on buying tickets last year.</th>
<table border='1'>
<tr>
<th>totA</th>
<th>user_name</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['totA'] . "</td>";
  echo "<td>" . $row['user_name'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


mysqli_close($con);
?>
