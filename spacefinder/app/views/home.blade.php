@extends('layout')

@section('content')

<?php
include 'public/static/findBusyness.php';

for ($i = 0; $i <= 14; $i++) {
	echo "        <div class='venue'>
        <div class='large-12 columns panel'>
        
        
        	<div class='row'>
        		<div class='small-8 medium-8 large-8 columns'>";
        		
    	if($i != 0){
			echo '<h4>Robarts Floor: '. $i . "<br></h4>";
		}
		else{
			echo '<h4>Robarts Building:<br></h4>';
		}
	
		echo "	<p><small>
							Last Updated on
							</time>
							</small>
						</p>
				</div>

				<div class='small-1 medium-2 large-2 columns' align='right'>
				</div>

				<div class='small-3 medium-2 large-2 columns' >
					<h5>
					
					<div data-alert class='alert-box "; 
					// Insert Tag Here
					findBusynessTag('Robarts Library', $i, 0);
					echo" radius'>";
				findBusyness('Robarts Library', $i, 0);	 
			echo"</div>
			
					</h5>
				</div>
				
           </div>
            
    	
        </div>

        </div>"; 


}

?>


@stop
