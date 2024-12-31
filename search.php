<?php require_once "header.php";?>
<!DOCTYPE html>
<html lang="it" class="<?php echo $file?>">
    <head>
        <?php if(!isset($_GET["search"])){?><meta http-equiv="refresh" content="0; url=./home"><?php }?>
        <?php require_once "metadati.php";?>
        <title>Hai cercato <?php $_GET["search"];?></title>
    </head>
    <body>
        <?php require_once "intestazione.php";
        require_once "navigatore.php";?>
        <h1 class="maiuscolo">
            hai cercato: <?php echo $_GET["search"];?>
        </h1>
        <?php $resultSet = $conn->query("select * from articoli where titolo like '%".$_GET["search"]."%' and pinnato = true order by pinnato desc, id desc");
        while($articolo=$resultSet->fetch_assoc()){
            ?>
            <span class="anteprimaArticolo">
                <h2 class="maiuscolo">
                    <a href="/articolo/<?php echo $articolo["id"]?>">
                        <?php echo $articolo["titolo"];?>
                    </a>
                    <?php if($articolo["pinnato"] == "1"):?>
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
                <?php echo troncaAnteprimaArticolo($articolo["contenuto"]);?>
            </span>
            <?php
        };?>
        <?php require_once "footer.php";?>
    </body>
</html>