<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>JosiDrive</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
  <div class="header">
    <a href="http://192.168.3.10">
      <img class="logo" src="logo.png">
    </a>
    <a href="http://192.168.3.13">Reminder</a>
    <a href="http://192.168.3.12">Admin</a>
  </div>
  <div class="formparent">
    <form action="setSettings.php" method="post" enctype="multipart/form-data">
      Change Bargain Finder search settings:
      <label for="search_string">String to search for: </label>
      <input type="text" name="search_string">
      <label for="open_time">Select a time to start searching for listings:</label>
      <input type="time" id="open_time" name="open_time">
      <label for="close_time">Select a time to stop searching for listings:</label>
      <input type="time" id="close_time" name="close_time">
      <button name="btn">Change settings</button>
    </form>
  </div>
  <div class="parent">
    <?php
      include 'dbConfig.php';
        
      $q = $conn->query("SELECT * FROM settings");
    
      while($row = $q->fetch()){
      echo "The current search settings: 
      <ul style='list-style-type:none;'>
        <li>Search String =  ".$row['search_string']."</li>
        <li>Open Time =  ".$row['open_time']."</li>
        <li>Close Time =  ".$row['close_time']."</li>
      </ul>";
    }
    ?>
  </div>
  <div>
  </div>
</body>

</html>