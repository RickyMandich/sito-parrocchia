<?php require_once "header.php";?>
<!DOCTYPE html>
<html lang="it" class="<?php echo $file?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $conn->query("select * from articoli where id = ".$_GET["id"])->fetch_assoc()["titolo"];?></title>
    </head>
    <?php
        $articolo = $conn->query("select * from articoli where id = ".$_GET["id"])->fetch_assoc();
    ?>
    <body>
        <?php require_once "intestazione.php";?>
        <?php require_once "navigatore.php";?>
        <h1>
            <?php echo $articolo["titolo"];?>
        </h1>
        <?php echo $articolo["contenuto"];?>
        <?php require_once "footer.php";?>
    </body>
</html>