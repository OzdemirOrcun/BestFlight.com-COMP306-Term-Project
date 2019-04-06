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

$result = mysqli_query($con,"select C.user_name,SSK.Distance as D
from 
Customer as C,(select (arrival_date-departure_date) as Distance, T.customer_id,T.date as date
from FliesTo natural join FliesFrom natural join Ticket as FF natural join Ticket as T) as SSK
where SSK.customer_id=C.customer_id
order by SSK.Distance desc limit 1

");

echo "
<th>Find the customer who has bought the longest duration of flight ticket.</th>
<table border='1'>
<tr>
<th>user_name</th>
<th>D</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['user_name'] . "</td>";
  echo "<td>" . $row['D'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


mysqli_close($con);
?>
