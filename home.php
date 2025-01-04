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
            <?php $resultSet = $conn->query("select * from articoli order by pinnato desc, id desc");
            while($articolo=$resultSet->fetch_assoc()){
                generaAnteprimaArticolo($articolo);
            };?>
        </main>
        <?php require_once "footer.php";?>
    </body>
</html>