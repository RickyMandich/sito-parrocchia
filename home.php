<?php require_once "header.php";?>
<!DOCTYPE html>
<html lang="it" xmlns="" class="<?php echo $file?>">
    <head>
        <?php require_once "metadati.php";?>
        <title>Francesco & Chiara</title>
    </head>
    <body>
        <?php require_once "intestazione.php";?>
        <?php require_once "navigatore.php";?>
        <main>
            <?php $resultSet = $conn->query("select * from articoli where pinnato = true order by id desc");
            while($articolo=$resultSet->fetch_assoc()){
                ?>
                <span class="anteprimaArticolo">
                    <h2 class="maiuscolo">
                        <a target="_blank" href="/articolo/<?php echo $articolo["id"]?>">
                            <?php echo $articolo["titolo"];?>
                        </a>
                        &#128204;
                    </h2>
                    <?php echo $articolo["contenuto"];?>
                </span>
                <?php
            };?>
            <?php $resultSet = $conn->query("select * from articoli where pinnato = false order by id desc");
            while($articolo=$resultSet->fetch_assoc()){
                ?>
                <span class="anteprimaArticolo">
                    <h2 class="maiuscolo">
                        <a target="_blank" href="/articolo/<?php echo $articolo["id"]?>">
                            <?php echo $articolo["titolo"];?>
                        </a>
                    </h2>
                    <?php echo $articolo["contenuto"];?>
                </span>
                <?php
            };?>
        </main>
        <?php require_once "footer.php";?>
    </body>
</html>