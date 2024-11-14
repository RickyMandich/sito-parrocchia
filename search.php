<?php require_once "header.php";?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <?php if(!isset($_GET["titolo"])){?><meta http-equiv="refresh" content="0; url=./home"><?php }?>
        <?php require_once "metadati.php";?>
        <title>Hai cercato <?php $_GET["titolo"];?></title>
    </head>
    <body>
        <?php require_once "intestazione.php";
        require_once "navigatore.php";?>
        <h1>
            hai cercato: <?php echo $_GET["titolo"];?>
        </h1>
        <?php var_dump($conn->query("select all from articoli where titolo like '%".$_GET["titolo"]."%' order by id"));?>
        <?php require_once "footer.php";?>
    </body>
</html>