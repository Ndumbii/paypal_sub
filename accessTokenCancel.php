<?php 
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_USERPWD, 'CLIENTID' .':' . 'CLIENT SECRET');

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en_US';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch); 
if ($err) {
  // code...
  echo 'Error:'.$err; 
}
else{
  $response = json_decode($result); 
  //var_dump($response); 
  $access_token = $response->access_token;  
  //var_dump($access_token); 
  if ($access_token) {
    // code...
    header("Location: cancel_sub.php?access_token=".$access_token);  
    exit();
  }
}
?>
