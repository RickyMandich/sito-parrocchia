<?php require_once "header.php";

if (isset($_POST['contenuto'])) {
    $id = $_GET['id'];
    $contenuto = $conn->real_escape_string($_POST['contenuto']);
    $sql = "UPDATE articoli SET contenuto='$contenuto' WHERE id=$id";
    $conn->query($sql);
}

var_dump($_GET);
?>
<!DOCTYPE html>
<html lang="it" class="<?php echo $file?>">
    <head>
        <?php require_once "metadati.php";?>
        <title><?php echo isset($_GET["id"]) ? $conn->query("select * from articoli where id = ".$_GET["id"])->fetch_assoc()["titolo"] : "articolo";?></title>
        <style>
            .inputContenuto {
                width: 100%;
                height: auto;
                min-height: 200px;
            }
        </style>
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
                <form method="post" action="/edit/<?php echo $_GET["id"];?>">
                    <textarea class="inputContenuto" name="contenuto" oninput="aggiornaDiv()"><?php echo $articolo["contenuto"]; ?></textarea>
                    <div class="contenuto">
                        <?php
                        echo $articolo["contenuto"];
                        ?>
                    </div>
                    <div class="foto">
                        <?php scanDirectory("articoli/".str_replace(" ", "", $articolo["titolo"]));?>
                    </div>
                    <button type="submit">Salva</button>
                </form>
            <?php else:?>
                <h1 class="maiuscolo">
                    articolo non trovato
                </h1>
            <?php endif;?>
        <?php else:?>
            <h1 class="maiuscolo">
                articolo non trovato
            </h1>
        <?php endif;?>
        <?php require_once "footer.php";?>
    </body>
</html>
<script>
function aggiornaDiv() {
    var textareaContent = document.querySelector('.inputContenuto').value;
    document.querySelector('.contenuto').innerHTML = textareaContent;
}
</script>