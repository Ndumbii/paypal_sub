<?php
include("database/mydb.php");
$email = 'smith204@gmail.com';
$sql = $con->query("SELECT status FROM customer_details WHERE session_email = '$email' limit 1".mysqli_error($con)); 
 if($sql->num_rows != 0){
    while ($rows = $sql->fetch_assoc()) {
        // code...
        $status = $rows['status'];
    }
 }
 $url_status = $_GET['status'];
  if ($status !== 'ACTIVE') {
      // code...
    header("Location: error.php"); 
    die();
  }
  if (empty($url_status)) {
       // code...
    header("Location: error.php"); 
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    <!-- Title -->
    <meta name="description" content="">
    <title>Watch Video</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
  
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
  

<body style="background-color: #f9f9f9;">

  <main class="page-content">
    <div class="container-fluid">
      <h2>Video Streaming Service</h2>
      <hr>
         
                      <br><br>

    <div class="row">
         <div class="col-lg-12 col-md-12 col-xl-12">
            <iframe width="430" height="285" src="https://www.youtube.com/embed/51UUYGq9cjk"></iframe> 


    </div>
  </div>
      <br><br>
      
    </div>
  </main>
  <!-- page-content" -->
</div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    
</body>

</html>