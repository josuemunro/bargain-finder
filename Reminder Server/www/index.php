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
  <a href="upload.html">Upload</a>
  <a href="http://192.168.3.12">Admin</a>
</div>
<div class="parent">
<?php
  include 'dbConfig.php';
    
  $q = $conn->query("SELECT * FROM files");

  while($row = $q->fetch()){
  echo "<div class='box'>
    <embed src='data:".$row['datatype'].";base64,".base64_encode($row['data'])."'/>
    <a class='download' target='_blank' href='download.php?id=".$row['id']."'>
      Download ".$row['name']."
    </a>
  </div>";
}

?>
</div>

</body>
</html>
