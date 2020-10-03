<meta http-equiv="refresh" content="1; url=http://127.0.0.1:8080">
<h1>Redirecting...</h1>
<?php
include 'dbConfig.php';
$id = isset($_GET['id'])? $_GET['id'] : "";
$EndDate = isset($_GET['EndDate'])? $_GET['EndDate'] : "";
$title = isset($_GET['Title'])? $_GET['Title'] : "";
try {
    $sql = "INSERT INTO favourites (listing_id, title, end_datetime) VALUES ('$id', '$title', '$EndDate')";
    // use exec() because no results are returned
    $conn->exec($sql);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>