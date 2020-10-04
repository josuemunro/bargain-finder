<?php include "../inc/dbinfo.inc"; ?>
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
$q = $conn->query("SELECT * FROM settings");
$row = $q->fetch();
// print_r($row);
$search_string = $row['search_string'];
$open_time = $row['open_time'];
$close_time = $row['close_time'];

$url = "https://api.tmsandbox.co.nz/v1/Search/General.json?sort_order=expiry_asc&rows=500&cid=2&searchString=".$search_string."";

$headr = array();
$headr[] = 'Content-length: 0';
$headr[] = 'cache-control: no-cache';
$headr[] = 'Content-type: application/json';
// Using this header we get a 500 internal error response
$headr[] = 'Authorization: OAuth oauth_consumer_key=21037302176B01C359C079657F286791, oauth_token=07D475ED350063E906221BA04897F031, oauth_signature_method=PLAINTEXT, oauth_signature=2106B414378CF13D7B900702BF3BCBA0%2616FF498FE034BADA111DE9445B976D06';
// Using this header we get a 401 unauthorized response
// $headr[] = 'Authorization: OAuth wrongauthorization';

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
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

// print_r($response['List'][0]);
$listing_list = $response['List'];

  echo "The current search settings: 
  <ul style='list-style-type:none;'>
    <li>Search String =  ".$search_string."</li>
    <li>Open Time =  ".$open_time."</li>
    <li>Close Time =  ".$close_time."</li>
  </ul>";

foreach($listing_list as $item) {
  $listing_ID = $item['ListingId'];
  $EndDate = preg_replace( '/[^0-9]/', '', $item['EndDate']);
  // echo $EndDate. "\n";
  $time_of_day = date("H : i", $EndDate / 1000);
  if (isWithinTimeRange($open_time, $close_time, $time_of_day)){
    echo "<ul style='list-style-type:none;'>
        <li>".$item['Title']."</li>
        <li>".$item['PriceDisplay']."</li>
        <li>Buy Now Price: ".$item['BuyNowPrice']."</li>
        <li>Ending on: ".date("l d F o")." at ".$time_of_day."</li>
        <li><a href='https://tmsandbox.co.nz/Browse/Listing.aspx?id=".$listing_ID."'>Go to the listing page</a></li>
        <li>
        <a class='download' href='favourite.php?id=".$listing_ID."&EndDate=".$EndDate."&Title=".$item['Title']."'>
        Favourite this listing</a>
        </li>
      </ul>";
  }
  // $EndDate = preg_replace( '/[^0-9]/', '', $EndDate['Date']);
  // $time_of_day = date('H : i', $EndDate);
  // echo $time_of_day;
}

function isWithinTimeRange($start, $end, $check_time){

  $now = $check_time;

  // time frame rolls over midnight
  if($start > $end) {

      // if current time is past start time or before end time

      if($now >= $start || $now < $end){
          return true;
      }
  }

  // else time frame is within same day check if we are between start and end

  else if ($now >= $start && $now <= $end) {
      return true;
  }

  return false;
}
?>
</div>

</body>
</html>
