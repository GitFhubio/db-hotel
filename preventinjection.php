<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mytest";

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn && $conn->connect_error) {
  echo "Connection failed: " . $conn->connect_error;
} else {
  echo "Connection done. <br/>";
}
+
// prepare and bind

$stmt = $conn->prepare("INSERT INTO tb_products (id,
idUser, price) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $id, $idUser, $price);

// questi magari mi arrivano da un form

$id = 4;
$idUser = 4;
$price = 30.30;
$stmt->execute();
