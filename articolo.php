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
                    <?php $directory = '/';
                    // Verifica se la directory esiste
                    if (!file_exists($directory)) {
                        die("Errore: La directory $directory non esiste");
                    }
                    // Verifica i permessi
                    if (!is_readable($directory)) {
                        die("Errore: La directory $directory non è leggibile");
                    }
                    // Prova ad aprire la directory con gestione errori
                    $dir = @opendir($directory);
                    if ($dir === false) {
                        die("Errore nell'apertura della directory: " . error_get_last()['message']);
                    }
                    while (($file = readdir($dir)) !== false) {
                        if ($file != '.' && $file != '..') {
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