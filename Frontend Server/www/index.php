<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>JosiDrive</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="header">
  <a href="index.php">
    <img class="logo" src="logo.png">
  </a>
  <a href="http://192.168.3.13">Reminder</a>
  <a href="http://192.168.3.12">Admin</a>
</div>
<div class="parent">
<?php
$curl = curl_init();

$headr = array();
$headr[] = 'Content-length: 0';
$headr[] = 'cache-control: no-cache';
$headr[] = 'Content-type: application/json';
// Using this header we get a 500 internal error response
$headr[] = 'Authorization: OAuth oauth_consumer_key=21037302176B01C359C079657F286791, oauth_token=07D475ED350063E906221BA04897F031, oauth_signature_method=PLAINTEXT, oauth_signature=2106B414378CF13D7B900702BF3BCBA0%2616FF498FE034BADA111DE9445B976D06';
// Using this header we get a 401 unauthorized response
// $headr[] = 'Authorization: OAuth wrongauthorization';

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.tmsandbox.co.nz/v1/Search/General.json?searchString=iphone",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_FAILONERROR => true,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => $headr,
  CURLOPT_SSL_VERIFYPEER => false,
));

$response = curl_exec($curl);
$err = curl_error($curl);

if ($response === false)
{
    // throw new Exception('Curl error: ' . curl_error($crl));
    print_r('Curl error: ' . $err);
}
curl_close($curl);

$response = json_decode($response, true); //because of true, it's in an array

print_r($response['List'][0]);
// echo $response[0];

foreach($response as $List){
  foreach($List as $value){
    if ($value['BuyNowPrice'] === 150.0) {
      echo "Buy Now Price:". $value['BuyNowPrice'];
    }
  
  }
}
?>
</div>

</body>
</html>
