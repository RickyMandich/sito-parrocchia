<?php require_once "header.php";?>
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
            if(isset($_GET["id"])):
                $articolo = $conn->query("select * from articoli where id = ".$_GET["id"])->fetch_assoc();
                if($articolo):?>
                    <h1 class="maiuscolo">
                        <?php echo $articolo["titolo"];?>
                    </h1>
                    <div class="contenuto">
                        <?php
                            //echo $articolo["contenuto"];
                        ?>
                    </div>
                    <div class="foto">
                    <?php $dir = opendir('articoli');
                    var_dump($dir);
                    while (($file = readdir($dir)) !== false) {
                        if ($file != '.' && $file != '..') { // ignorare directory e parent directory
                            echo $file . "\n";
                        }
                    }
                    closedir($dir);?>
                    </div>
                <?php else:?>
                    <h1 class="maiuscolo">
                        articolo non trovato
                    </h1>
                <?php
                    endif;
            else:?>
                <h1 class="maiuscolo">
                    articolo non trovato
                </h1>
            <?php
                endif;
            require_once "footer.php";
        ?>
    </body>
</html>