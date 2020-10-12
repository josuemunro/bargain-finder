<?php include "../inc/dbinfo.inc"; ?>
<meta http-equiv="refresh" content="1; url=http://127.0.0.1:8080">
<h1>Redirecting...</h1>
<?php
if(isset($_POST["btn"])){
    $search_string = $_POST['search_string'];
    $open_time = $_POST['open_time'];
    $close_time = $_POST['close_time'];
    try {
    $sql = "UPDATE settings SET search_string = '$search_string', 
    open_time = '$open_time', close_time = '$close_time'";
    // Use this to clear the table
    // $sql = "TRUNCATE TABLE settings";
      // use exec() because no results are returned
      $conn->exec($sql);
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }
?>