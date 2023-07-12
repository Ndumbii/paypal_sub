<?php	
	$con = new mysqli('localhost', 'root', '', 'paypal');
	if (!$con) {
		# code...
		echo "Not connected to database".mysqli_error($con);
	}
	?>
