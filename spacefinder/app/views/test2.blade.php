@extends('layout')

@section('content')

<h1> Robarts Library Busyness </h1>
<br>
<br>
<h4> Robarts Library : </h4>
<?php
include 'public/static/findBusyness.php';

findBusyness('Robarts Library', 0, 0);	  
?>
<br>
<h4> Robarts Library Floor 1 : </h4>
<?php
findBusyness('Robarts Library', '1', 0);	  
?>
<br>
<h4> Robarts Library Floor 2 : </h4>
<?php
findBusyness('Robarts Library', '2', 0);	  
?>
<br>
<h4> Robarts Library Floor 3 : </h4>
<?php
findBusyness('Robarts Library', '3', 0);	  
?>
<br>
<h4> Robarts Library Floor 4 : </h4>
<?php
findBusyness('Robarts Library', '4', 0);	  
?>
<br>
<h4> Robarts Library Floor 5 : </h4>
<?php
findBusyness('Robarts Library', '5', 0);	  
?>
<br>
<h4> Robarts Library Floor 6 : </h4>
<?php
findBusyness('Robarts Library', '6', 0);	  
?>
<br>
<h4> Robarts Library Floor 7 : </h4>
<?php
findBusyness('Robarts Library', '7', 0);	  
?>
<br>
<h4> Robarts Library Floor 8 : </h4>
<?php
findBusyness('Robarts Library', '8', 0);	  
?>
<br>
<h4> Robarts Library Floor 9 : </h4>
<?php
findBusyness('Robarts Library', '9', 0);	  
?>
<br>
<h4> Robarts Library Floor 10 : </h4>
<?php
findBusyness('Robarts Library', '10', 0);	  
?>
<br>
<h4> Robarts Library Floor 11 : </h4>
<?php
findBusyness('Robarts Library', '11', 0);	  
?>
<br>
<h4> Robarts Library Floor 12 : </h4>
<?php
findBusyness('Robarts Library', '12', 0);	  
?>
<br>
<h4> Robarts Library Floor 13 : </h4>
<?php
findBusyness('Robarts Library', '13', 0);	  
?>
<br>
<h4> Robarts Library Floor 14 : </h4>
<?php
findBusyness('Robarts Library', '14', 0);	  
?>




@stop
