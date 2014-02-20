<?php
//run update script to update the populations table

	include 'spaceFunctions.php';
	//call update function
	$err = update();
	if($err) echo "error with update function";
	else echo "successful update";
	
?>
