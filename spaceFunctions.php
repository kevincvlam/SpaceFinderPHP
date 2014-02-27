<?php
function connectToDB(){
// Create connection to spacefinder database
$con=mysqli_connect("localhost","kevincvl_sf","spacefinder","kevincvl_spacefinder");

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
//does not close the connection passed to it

function getPopulation($building, $floor, $area, $connect){
	//check for errors on connection
	if($connect->errno != 0){
		echo "Error with connection passed to function getPopulation";
		exit();
	}
	//construct query:
	$query  = "SELECT SUM(activeconn) FROM	";						//summing query	
	$query = $query . "(SELECT apn, activeconn, MAX(timestamp) FROM populations		
	WHERE apn IN (SELECT apn FROM buildings";  								//building info subquery
	if($building) $query = $query . " WHERE bname = '" . $building;			//building info subquery
	if($floor) $query = $query . "' AND bfloor = '" . $floor;				//building info subquery
	if($area) $query = $query . "' AND barea = '" . $area;					//building info subquery
	$query = $query . "')";													//building info subquery
	$query = $query . " GROUP BY apn) as relevantVals";				
	
	//echo $query;   //display query for testing
	
	
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

//update.php
//this is a php file that updates values in the populations table
//for Robarts Library demo
//NOTE: usually this would be done as a scheduled SQL query on the
//server, but we do not yet have a server and the data that is 
//being given to us is on a webpage rather than in a SQL database
//
//This function is expected to be called from a batch file that will
//be called by the windows scheduler...again this is usually an SQL
//subroutine called by the server task scheduler

function update(){
	//establish and check connection to database spacedb
	$con = connectToDB();
	if($con->errno) return $con->errno;
	
	//ADD NEW INFORMATION TO THE TABLE
	
	//set up a query to get all of the Access Points that we are actively checking
	$query = "SELECT apn FROM buildings";
	$result = $con->query($query);
	
	//get information from webpage
	$livedata = file_get_contents('http://info.wireless.utoronto.ca/rob/');
	/*//test file_get_contents
	echo $livedata;*/
	
	while($apn = $result->fetch_array()){
		//set id to search for
		$id = $apn[0];
		//find position of id in livedata
		$pos = strpos($livedata, $id);
		//parse line; four elements delimted by commas; get positions of commas
		$pos2 = strpos($livedata, ",",$pos);
		$pos3 = strpos($livedata, ",",$pos2+1);
		$pos4 = strpos($livedata, ",",$pos3+1);
		//find the next line break
		$pos_end = strpos($livedata, "<BR>", $pos3);
		
		//parse data (NOTE minus and plus ones account for commas
		$num_conns = (int) substr($livedata, ($pos3+1),($pos4-$pos3-1));
		$timestamp = substr($livedata, ($pos4+1),($pos_end-$pos4-1));
		
		/* //test parsing
		echo $id . "..." . $num_conns . "..." . $timestamp . "<BR>"; */
		
		//write data into database
		$query = "INSERT INTO populations
		VALUES('$id','$num_conns','$timestamp')";
		if(!($con->query($query))){
		echo "<br> insert query error <br>";
		return 1;
		}		
	}
	$result->close();
	
	//DELETE OLD INFORMATION FROM THE TABLE
	$query = "DELETE FROM populations WHERE timestamp < (NOW() - INTERVAL 14 DAY)";
	if(!($con->query($query))){
		echo "<br> delete query error <br>";
		return 1;
	}		
	
	//RETURN 0 NO ERROR
	return 0;
}
?>
