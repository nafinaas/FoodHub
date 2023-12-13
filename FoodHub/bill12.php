<?php
$product="Chicken Shawarma Plate";
$price="300";
$md1 = 100;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bills";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into details1(product,price)values(?,?)");
    $stmt->bind_param("ss",$product,$price);
    $execval = $stmt->execute();
    echo $execval;
}
$sql = "UPDATE details1 SET md1=md1-1 WHERE md1>0";

if ($conn->query($sql) === TRUE) {
  header("location:confirm.html");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>