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

$result = mysqli_query($con,"select city, count(city) as C
  from(select  airport_name,city
  from Flight as F,Airport as A
  where (F.departure=A.airport_name or F.arrival=A.airport_name)
  and F.domesticorinternational='Domestic'
) as K
  group by city
  order by C desc limit 1

");

echo "
<th>Find the city that has received the most domestic flights.</th>
<table border='1'>
<tr>
<th>city</th>
<th>C</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['C'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


mysqli_close($con);
?>
