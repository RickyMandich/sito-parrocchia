<?php require_once "header.php";
var_dump($_GET)?>
<!DOCTYPE html>
<html lang="it" class="<?php echo $file?>">
    <head>
        <?php require_once "metadati.php";?>
        <title><?php echo isset($_GET["id"]) ? $conn->query("select * from articoli where id = ".$_GET["id"])->fetch_assoc()["titolo"] : "articolo";?></title>
    </head>
    <body>
        <?php
            require_once "intestazione.php";
            require_once "navigatore.php";
            if(!isset($_GET["edit"])):
                if(isset($_GET["id"])):
                    $articolo = $conn->query("select * from articoli where id = ".$_GET["id"])->fetch_assoc();
                    if($articolo):?>
                        <h1 class="maiuscolo">
                            <?php echo $articolo["titolo"];?>
                            <?php if($_SESSION["user"]):?>
                                <form action="./<?php echo $_GET["id"];?>/edit">
                                    <input type="image" src="/img/edit.jpg" alt="modifica l'articolo">
                                </form>
                                <form action="/delete">
                                    <input type="image" src="/img/delete.jpg" alt="elimina l'articolo">
                                </form>
                            <?php endif;?>
                        </h1>
                        <div class="contenuto">
                            <?php
                                echo $articolo["contenuto"];
                            ?>
                            <div class="foto">
                                <?php scanDirectory("./articoli/".str_replace(" ", "", $articolo["titolo"]));?>
                            </div>
                        </div>
                    <?php else:?>
                        <h1 class="maiuscolo">
                            articolo non trovato
                        </h1>
                    <?php endif;?>
                <?php endif;?>
            <?php else:?>
                <h1 class="maiuscolo">
                    articolo non trovato
                </h1>
            <?php endif;
            require_once "footer.php";
        ?>
    </body>
</html>