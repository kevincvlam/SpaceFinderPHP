
<h1> Active Connections in Robarts on given floor </h1>

<?php
include 'spaceFunctions.php';

$con = connectToDB();

echo "<table border='1'>
<tr>
<th>Floor Number</th>
<th> Current Population</th>
</tr>";

$number = getPopulation('Robarts Library', '1', 0, $con);
echo "<tr>
		<td> 1 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '2', 0, $con);
echo "<tr>
		<td> 2 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '3', 0, $con);
echo "<tr>
		<td> 3 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '4', 0, $con);
echo "<tr>
		<td> 4 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '5', 0, $con);
echo "<tr>
		<td> 5 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '6', 0, $con);
echo "<tr>
		<td> 6 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '7', 0, $con);
echo "<tr>
		<td> 7 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '8', 0, $con);
echo "<tr>
		<td> 8 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '9', 0, $con);
echo "<tr>
		<td> 9 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '10', 0, $con);
echo "<tr>
		<td> 10 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '11', 0, $con);
echo "<tr>
		<td> 11 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '12', 0, $con);
echo "<tr>
		<td> 12 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '13', 0, $con);
echo "<tr>
		<td> 13 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getPopulation('Robarts Library', '14', 0, $con);
echo "<tr>
		<td> 14 </td>
		<td> " . (string) $number . "</td>
	  </tr></table>";

///maximum table
	  
echo "<table border='1'>
<tr>
<th>Floor Number</th>
<th> Max Capacity</th>
</tr>";

$number = getMaxPop('Robarts Library', '1', 0, $con);
echo "<tr>
		<td> 1 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '2', 0, $con);
echo "<tr>
		<td> 2 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '3', 0, $con);
echo "<tr>
		<td> 3 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '4', 0, $con);
echo "<tr>
		<td> 4 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '5', 0, $con);
echo "<tr>
		<td> 5 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '6', 0, $con);
echo "<tr>
		<td> 6 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '7', 0, $con);
echo "<tr>
		<td> 7 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '8', 0, $con);
echo "<tr>
		<td> 8 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '9', 0, $con);
echo "<tr>
		<td> 9 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '10', 0, $con);
echo "<tr>
		<td> 10 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '11', 0, $con);
echo "<tr>
		<td> 11 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '12', 0, $con);
echo "<tr>
		<td> 12 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '13', 0, $con);
echo "<tr>
		<td> 13 </td>
		<td> " . (string) $number . "</td>
	  </tr>";
$number = getMaxPop('Robarts Library', '14', 0, $con);
echo "<tr>
		<td> 14 </td>
		<td> " . (string) $number . "</td>
	  </tr></table>";

$con->close()
?>

<br><br>
