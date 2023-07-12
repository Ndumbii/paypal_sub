<?php	
	$con = new mysqli('localhost:3308', 'root', '', 'paypal');
	if (!$con) {
		# code...
		echo "Not connected to database".mysqli_error($con);
	}
	?>
