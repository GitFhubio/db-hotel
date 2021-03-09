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


 $st=$PDOconn->query("SELECT * FROM User");


//echo $st->rowCount() ; esce due perche abbiamo due record
// $record=$st->fetch();
// var_dump($record); qui esce solo un record


$record1=$st->fetch();
$record2=$st->fetch();
var_dump($record1,$record2);

//fetch quindi recupera un record e poi passa al successivo

//abbiamo due record nella tabella,ma se non lo sappiamo  facciamo

while ($record=$st->fetch(PDO::FETCH_OBJ)){

//var_dump($record);
echo $record->nome."<br>";

}
//finchè $st fetch non restituirà false esegui le istruzioni contenute nel while
//con fetch e basta abbiamo ripetizione nellarray quindi
//cambiamo sintassi aggiungendo pdo  fetch obj
oppure fetch num resistuisce array cui accedo quindi con $record['nome']


// invece di cambiare nel while il fetch possiamo impostarlo in generale prima
// cioe in set attribute aggiungendo sotto l'altro $PDOconn :

$PDOconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
e faccio al posto dell'echo il var_dump($record);


al posto di fare il while col fetch posso fare fetch all


$elenco=$st-> fetchAll();
var_dump($elenco); ho un array di array ogni sottoarray un record (se ho messo fetch assoc/ o fetch num);
se metto un fetch obj ottengo un array di oggetti

per elaborare array faccio un foreach

foreach($elenco as $record){
var_dump($record);

e posso visualizzare i vari elementi con al posto del var dump:

echo $record['nome']."".$record['email']."<br>" questo vale se ho fetch assoc

se torno a fetch obj ,$elenco è un array di oggetti
quindi faccio sempre for each
pero uso notazione degli oggetti

  echo  $record->nome." ".$record->email."<br>"
}

in realtà prima di fare il foreach sarebbe conveniente fare
if($st->rowCount()>0){



} else {

  echo "la select non ha recuperato alcun record";


}

ora se nella select metto WHERE NOME ='simona';
