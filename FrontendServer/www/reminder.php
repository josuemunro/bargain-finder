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
  <a href="reminder.php">Reminder</a>
  <a href="admin.php">Admin</a>
</div>
<div class="parent">
<?php
    
  $q = $conn->query("SELECT * FROM favourites");

  while($row = $q->fetch()){
  echo "<div class='box'>
  <ul style='list-style-type:none;'>
        <li>".$row['title']."</li>
        <li>".$row['end_datetime']."</li>
        <li><a href='https://tmsandbox.co.nz/Browse/Listing.aspx?id=".$row['listing_id']."'>Go to the listing page</a></li>
        <li>
        </li>
      </ul>

  </div>";
}

?>
</div>

</body>
</html>
