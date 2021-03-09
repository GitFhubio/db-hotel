<?php

//i prepared statement pdo ci permettono di metterci al sicuro da attacchi

// 3step:
// 1)sostituire le variabili con dei placeholder (?)
// 2)preparare la query col metodo prepare
// 3)eseguire la query col metodo execute;

try{
$dsn= "mysql:host=localhost;dbname=mytest";
//$PDOconn= new PDO($dsn, $username, $password);

$PDOconn= new PDO($dsn, "root", "root");

// la linea seguente serve per lanciare eccezioni di tipo PDPException quando ci sono errori
$PDOconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){

  echo $e->getMessage();
}


 $st=$PDOconn->query("SELECT * FROM atleti");


//query

$nome='Pippo';DROP TABLE atleti;
$cognome='Baudo';
$q= "SELECT * FROM atleti WHERE nome= ? AND cognome= ?";
$st=$PDOconn->prepare($q);
$st->execute([$nome,$cognome]);
//$st=$PDOconn->query($q);
var_dump($st->fetchAll());



// o meglio

// $nome='Gianluca';DROP table atleti;
// $cognome='Rossi';
// $stmt->bind_param("ss",$nome, $cognome);
// $q= "SELECT * from User WHERE nome= $nome AND cognome= $cognome";
//
//
// var_dump($st->fetchAll());




// non trovo corrispondenze ma la tabella non viene eliminata!!
