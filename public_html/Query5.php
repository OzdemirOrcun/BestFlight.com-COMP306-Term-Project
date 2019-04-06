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

$result = mysqli_query($con,"select Airway.user_name, min(SSK.Distance) as D
from (select (arrival_date-departure_date) as Distance, T.flight_id
from FliesTo natural join FliesFrom natural join Ticket as FF natural join Ticket as T) as SSK,Airway,Flight
where SSK.flight_id=Flight.flight_id and Airway.airway_id=Flight.airway_id
group by Airway.user_name asc limit 1 


");

echo "
<th>Find the Airline Company who has sold the shortest duration of flight ticket.</th>
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
