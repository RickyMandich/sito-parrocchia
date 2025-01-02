<?php
require_once("header.php");
if(admin()){
    unset($_SESSION["user"]);
}
?>
<meta http-equiv="refresh" content="0; url=./login">