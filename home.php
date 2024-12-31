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
                ?>
                <span class="anteprimaArticolo">
                    <h2 class="maiuscolo">
                        <a href="/articolo/<?php echo $articolo["id"]?>">
                            <?php echo $articolo["titolo"];?>
                        </a>
                        <?php if($articolo["pinnato"] == "true"):?>
                            <?php if(isset($_SESSION["user"])){?>
                                <form action="removePin" style="display: inline-block">
                                    <input type="hidden" name="id" value="<?php echo $articolo["id"]?>">
                                    <input type="hidden" name="from" value="home">
                                    <input type="submit" value="&#128204;">
                                </form>
                            <?php }else{?>
                                &#128204;
                            <?php } ?>
                    <?php endif;?>
                    </h2>
                    <?php echo substr($articolo["contenuto"], 10, 360)."...";?>
                </span>
                <?php
            };?>
        </main>
        <?php require_once "footer.php";?>
    </body>
</html>