<?php
//per collegarmi al database creato con mysql uso i pdo
//l'approccio è object oriented

try{
$dsn= "mysql:host=localhost;dbname=mytest";
//$PDOconn= new PDO($dsn, $username, $password);

$PDOconn= new PDO($dsn, "root", "root");

// la linea seguente serve per lanciare eccezioni di tipo PDPException quando ci sono errori
$PDOconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){

  echo $e->getMessage();
}

//inserire record tramite pdo
//PASSIAMO ISTRUZIONE SQL

$st= $PDOconn->query("INSERT INTO User (nome,username) VALUES ('Luisa','blabla')");

if ($st->rowCount() > 0)
echo "Record correttamente inserito";

//c'è lerrore perché la colonna anni non c'è
try{

  // LA QUERY ritorna un oggetto di tipo statement $st
$st= $PDOconn->query("INSERT INTO User (nome,username,anni) VALUES ('Luisa','troia','40')");
}catch(PDOException $e){
echo $e->getMessage()";
}

 ?>

 //per visualizzare record nella pagina


 $st=$PDOconn->query("SELECT * FROM User");
while($record=$st->fetch()){

  echo "Nome : ". $record['nome'].". Cognome:" .$record['cognome']."<br>";
}


//oppure possiamo fare al posto del while

$elenco = $st-> fetchALL();
var_dump($elenco);

//metodo query mette a rischio di sql injection
