<?php
require_once "header";
if(isset($_GET["id"])){
    $conn->query("update articoli set pinnato=false where id = ".$_GET["id"]);
    ?><meta http-equiv="refresh" content="0; url=<?php echo $_GET["from"]?>"><?php
}