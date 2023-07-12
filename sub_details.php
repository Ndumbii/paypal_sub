<?php 
include('database/mydb.php');
$subscriptionID = $_GET['subscriptionID']; 
$token = $_GET['access_token'];
if ($subscriptionID == "" OR $token == "") {
  // code...
  header("Location: javascript://history.go(-1)");

}
 
?>

<?php 
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions/'.rawurlencode($subscriptionID));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


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
$email = 'gjhwatters@gmail.com';
//var_dump($response);
$status = $response->status; 
$subscriberID = $response->id;
$PlanID = $response->plan_id;
$start_time = $response->start_time;
$status_update_time = $response->status_update_time;
$given_name = $response->subscriber->name->given_name; 
$surname = $response->subscriber->name->surname; 
$fullname = $given_name." ".$surname; 
$payment_email_address = $response->subscriber->email_address; 

if ($status == 'ACTIVE' && $subscriptionID == $subscriberID) {
  // code...
  $sql = "UPDATE customer_details SET status = '$status', subscriberID = '$subscriberID', PlanID = '$PlanID', start_time = '$start_time', status_update_time = '$status_update_time', fullname = '$fullname', payment_email_address = '$payment_email_address' WHERE session_email = '$email'".mysqli_error($con);
                    $query_result = $con->query($sql);  
                    if ($query_result) {
       header("Location: success.php?status=".$status);
            exit();
                       } 
                       else{
        echo 'There was a problem on your code'. mysqli_error($con);
                    } 
}

}
?>
