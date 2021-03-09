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

$stmt = $conn->prepare("INSERT INTO atleti (ID,
nome, cognome) VALUES (?, ?, ?)");
$stmt->bind_param("dss", $id, $nome, $cognome);

// questi magari mi arrivano da un form

$id = 3;
$nome = "Pippo";
$cognome = "Baudo";
$stmt->execute();
