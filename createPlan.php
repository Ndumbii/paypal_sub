<?php  
$ProductID = $_GET['ProductID'];  
$token = $_GET['access_token'];
?>
<?php

// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/plans');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n    \"name\": \"Premium Video Plus\",\n   
	 \"description\": \"Premium plan with video download feature\",\n   
	  \"product_id\": \"$ProductID\",\n    \"billing_cycles\": [\n        {\n            \"frequency\": {\n              
		  \"interval_unit\": \"MONTH\",\n                \"interval_count\": 1\n            },\n            \"tenure_type\": \"REGULAR\",\n   
		           \"sequence\": 1,\n            \"total_cycles\": 0,   \n            \"pricing_scheme\": {\n            
					    \"fixed_price\": {\n                    \"value\": \"40\",\n                    \"currency_code\": \"USD\"\n        
						        }\n            }\n        }\n    ],\n    \"payment_preferences\": {\n     
									   \"auto_bill_outstanding\": true,\n        \"payment_failure_threshold\": 1\n    }\n }");

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer '.rawurlencode($token);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


$result = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch); 
if ($err) {
  // code...
  echo 'Error:'.$err; 
} else{
	$response = json_decode($result); 
	$PlanID = $response->id; 
	//var_dump($PlanID); 
	if ($PlanID) {
		// code...
		header("Location: pay.php?PlanID=".$PlanID."&access_token=".$token);
	}
}

?>