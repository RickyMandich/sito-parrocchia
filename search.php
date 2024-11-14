<?php require_once "header.php";?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <?php if(!isset($_GET["search"])){?><meta http-equiv="refresh" content="0; url=./home"><?php }?>
        <?php require_once "metadati.php";?>
        <title>Hai cercato <?php $_GET["search"];?></title>
    </head>
    <body>
        <?php require_once "intestazione.php";
        require_once "navigatore.php";?>
        <h1>
            hai cercato: <?php echo $_GET["search"];?>
        </h1>
        <?php $resultSet = $conn->query("select * from articoli where titolo like '%".$_GET["search"]."%' order by id");
        while($articolo=$resultSet->fetch_all()){
            var_dump($articolo);
        };?>
        <?php require_once "footer.php";?>
    </body>
</html>