<?php require_once "header.php";?>
<!DOCTYPE html>
<html lang="it" class="<?php echo $file?>">
    <head>
        <?php require_once "metadati.php";?>
        <title><?php echo $conn->query("select * from articoli where id = ".$_GET["id"])->fetch_assoc()["titolo"];?></title>
    </head>
    <?php
        $articolo = $conn->query("select * from articoli where id = ".$_GET["id"])->fetch_assoc();
    ?>
    <body>
        <?php if($articolo):?>
            <?php
                require_once "intestazione.php";
                require_once "navigatore.php";?>
            <h1 class="maiuscolo">
                <?php echo $articolo["titolo"];?>
            </h1>
            <?php
                echo $articolo["contenuto"];
                require_once "footer.php";
            ?>
        <?php else:?>
            <h1 class="maiuscolo">
                articolo non trovato
            </h1>
        <?php endif; ?>
    </body>
</html>