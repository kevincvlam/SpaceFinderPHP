<?php

include 'spacefinder.php';

function findBusyness ($building, $floor, $area){

if (!$building) echo "error , no building indicated \n";
$con = connectToDB();
$currPop = getPopulation($building, $floor, $area, $con);
$maxPop = getMaxPop($building, $floor, $area, $con);

if ($maxPop) { 
	$percentage = $currPop / $maxPop *100;	
} else {
	echo "error max pop is zero";
	return 0;
}

switch ($percentage){
case $percentage > 100:
        echo "Overcrowded";
        break;
case $percentage > 70 && $percentage <=100 :
        echo "Extremely Busy";
        break;
case $percentage > 50 && $percentage <=75 :
        echo "Busy";
        break;

case $percentage > 10 && $percentage <=50 :
        echo "Normal";
        break;

case $percentage <=  10 :
        echo "Empty";
        break;
}
return 0;
}
$building = "Robarts Library";
$floor = 14;
$area = 0;

findBusyness($building, $floor, $area);
?>