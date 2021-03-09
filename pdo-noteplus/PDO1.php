<?php
//per collegarmi al database creato con mysql uso i pdo
//l'approccio è object oriented

try{
$dsn= "mysql:host=127.0.0.1;dbname=mytest";
//$PDOconn= new PDO($dsn, $username, $password);

$PDOconn= new PDO($dsn, "root", "root");

// la linea seguente serve per lanciare eccezioni di tipo PDPException quando ci sono errori
$PDOconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){

  echo $e->getMessage();
}

//inserire record tramite pdo
//PASSIAMO ISTRUZIONE SQL

$st= $PDOconn->query("INSERT INTO User (nome,cognome) VALUES ('Luisa','Rinaldi')");



}
