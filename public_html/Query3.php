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

$result = mysqli_query($con,"select C.user_name,max(T.amount) as TAm
from Customer as C, Ticket as T
where T.customer_id=C.customer_id and T.date > '2016-01-01' and T.date < '2017-01-01'
group by C.user_name
");

echo "
<th>Sort the customers with a contract according to the DISTANCE OR MONEY they have spent on two years ago.</th>
<table border='1'>
<tr>
<th>user_name</th>
<th>TAm</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['user_name'] . "</td>";
  echo "<td>" . $row['TAm'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


mysqli_close($con);
?>
