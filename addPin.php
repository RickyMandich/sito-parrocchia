<?php
require_once "header";
function countPinned($conn){
    $resultSet = $conn->query("select * from articoli where pinnato = true");
    $pin = 0;
    while($resultSet->fetch_assoc()){
        $pin++;
    }
    return $pin;
}
if(isset($_GET["id"])){
    if(countPinned($conn)<=5){
        $conn->query("update articoli set pinnato=true where id = ".$_GET["id"]);
        ?><meta http-equiv="refresh" content="0; url=<?php echo $_GET["from"]?>"><?php
    }
}