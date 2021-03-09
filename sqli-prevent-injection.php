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
// prepare and bind

$stmt = $conn->prepare("INSERT INTO atleti (nome, cognome) VALUES (?, ?)");
$stmt->bind_param("ss",$nome, $cognome);

// questi magari mi arrivano da un form

$nome = "Pippo";DROP TABLE atleti;
$cognome = "Baudo";
$stmt->execute();
