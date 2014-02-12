<?php
function connectToDB(){
// Create connection to spacefinder database
$con=mysqli_connect("localhost","root","root","spacedb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
return $con;
}

//creates an html table of the building floors and their active connections on each floor
function getCurrFloorPop($bname, $con){
echo "<table border='1'>
<tr>
<th>AP name</th>
<th>Current Connection</th>
</tr>";
$result = mysqli_query($con, "SELECT B.bfloor AS floornum, SUM(P.activeconn) AS sum ".
								"FROM populations AS P, buildings AS B WHERE P.apn = B.apn AND B.bname LIKE '". $bname . "'" . " GROUP BY B.bfloor");
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['floornum'] . "</td>";
  echo "<td>" . $row['sum']. "</td>";
  echo "</tr>";
  }
echo "</table>";
}
 
function printResult ($result){
 echo "<table border='1'>
<tr>
<th>Floor number</th>
<th> current pop</th>
</tr>";
 while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['floornum'] . "</td>";
  echo "<td>" . $row['curPop'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
}


//CONNOR

//returns summed population from access points with a given building floor or area
//expects first three values to be a string or null if not specified
//$connect is expected to be a mysqli class (database connection)
//returns an integer representing the population

function getPopulation($building, $floor, $area, $connect){
	//check for errors on connection
	if($connect->errno != 0){
		echo "Error with connection passed to function getPopulation";
		exit();
	}
	//construct query:
	$query  = "SELECT SUM(activeconn) FROM populations WHERE apn IN (SELECT apn FROM buildings";
	$query = $query . " WHERE timestamp = '2014-02-06 13:49:11'"; //**********************in future time will change to *timestamp < NOW()-5000* which means entries in the past five minutes
	if($building) $query = $query . " AND bname = '" . $building;			//remember single quotes for sql query
	if($floor) $query = $query . "' AND bfloor = '" . $floor;
	if($area) $query = $query . "' AND barea = '" . $area;
	$query = $query . "')";
		
	//call query
	if($result = $connect->query($query)){					//if successful result
		$row = $result->fetch_array();							//return result
		$result->close();
		return (int) $row[0];
	}
	
	echo "error in result from query...result was null <br>";					//result was null
	return 0;

}

//returns summed maximum population from access points with a given building floor or area
//expects first three values to be a string or null if not specified
//$connect is expected to be a mysqli class (database connection)
//returns an integer representing the Max population
function getMaxPop($building, $floor, $area, $connect){
	//check for errors on connection
	if($connect->errno != 0){
		echo "Error with connection passed to function getPopulation";
		exit();
	}
	//construct query:
	$query  = "SELECT SUM(bmaxpop) FROM buildings WHERE apn IN (SELECT apn FROM buildings";
	if($building) $query = $query . " WHERE bname = '" . $building;			//remember single quotes for sql query
	if($floor) $query = $query . "' AND bfloor = '" . $floor;
	if($area) $query = $query . "' AND barea = '" . $area;
	$query = $query . "')";
		
	//call query
	if($result = $connect->query($query)){					//if successful result
		$row = $result->fetch_array();							//return result
		$result->close();
		return (int) $row[0];
	}
	
	echo "error in result from query...result was null <br>";					//result was null
	return 0;
}

?>