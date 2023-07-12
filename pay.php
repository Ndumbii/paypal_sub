<?php  
$PlanID = $_GET['PlanID'];
$token = $_GET['access_token'];

?>
<!DOCTYPE html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body>
  <script
      src="https://www.paypal.com/sdk/js?client-id=CLIENTID&vault=true&intent=subscription">
  </script>
    <div id="paypal-button-container"></div>
<script> var token = '<?php echo $token; ?>'; </script>
<script type="text/javascript">
  paypal.Buttons({

  createSubscription: function(data, actions) {

    return actions.subscription.create({

      'plan_id': '<?php echo $PlanID; ?>'

    });

  },


  onApprove: function(data, actions) {

    alert('You have successfully created subscription ' + data.subscriptionID);
    window.location = "sub_details.php?subscriptionID=" + data.subscriptionID + "&access_token=" + token;

  }


}).render('#paypal-button-container');
</script>
</body>
