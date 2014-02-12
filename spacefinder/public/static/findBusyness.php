<?php

//This function will be called by external html ie front end UI
//expects three values to be a string or null if not specified
// $building:	string representing the building
// $floor:		floor of the above building
// $area:		area of the above floor
include 'spaceFunctions.php';		//include
function findBusyness ($building, $floor, $area){
	
	
	if (!$building) echo "Error: No Building Indicated <br>";
	
	//connect to the SpaceFinder database
	$con = connectToDB();
	
	if ($con->errno) return 2;			//return 2 if connection failed
	
	//get values from SpaceFinder database
	$currPop = getPopulation($building, $floor, $area, $con);
	$maxPop = getMaxPop($building, $floor, $area, $con);
	
	//calculate busyness index
	if ($maxPop) { 
	$busyness = $currPop / $maxPop *100;	
	} else {
	echo "Error: Max Population is zero";
	return 0;
	}

	switch ($busyness){
	case $busyness > 100:
		   echo "Overcrowded";
		   return 0;
	case $busyness > 70 && $busyness <=100 :
		   echo "Extremely Busy";
		   return 0;
	case $busyness > 50 && $busyness <=75 :
		   echo "Busy";
		   return 0;

	case $busyness > 10 && $busyness <=50 :
		   echo "Normal";
		   return 0;

	case $busyness <=  10 :
		   echo "Empty";
		   return 0;
	}
	if ($con) $con->close;

return 1;		//return 1 if the case statement did not work
}

function findBusynessTag ($building, $floor, $area){
	
	
	if (!$building) echo "Error: No Building Indicated <br>";
	
	//connect to the SpaceFinder database
	$con = connectToDB();
	
	if ($con->errno) return 2;			//return 2 if connection failed
	
	//get values from SpaceFinder database
	$currPop = getPopulation($building, $floor, $area, $con);
	$maxPop = getMaxPop($building, $floor, $area, $con);
	
	//calculate busyness index
	if ($maxPop) { 
	$busyness = $currPop / $maxPop *100;	
	} else {
	echo "Error: Max Population is zero";
	return 0;
	}

	switch ($busyness){
	case $busyness > 100:
		   echo "alert";
		   return 0;
	case $busyness > 70 && $busyness <=100 :
		   echo "alert";
		   return 0;
	case $busyness > 50 && $busyness <=75 :
		   echo "warning";
		   return 0;

	case $busyness > 10 && $busyness <=50 :
		   echo "success";
		   return 0;

	case $busyness <=  10 :
		   echo "info";
		   return 0;
	}
	if ($con) $con->close;

return 1;		//return 1 if the case statement did not work
}


?>