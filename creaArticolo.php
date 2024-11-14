<?php require_once "header.php";
if(!isset($_SESSION["user"])){
    ?><meta http-equiv="refresh" content="0; url=login"><?php
}
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <title>crea articolo</title>
    </head>
    <body>
        <?php if(isset($_POST["titolo"])){
            if($conn->query("select * from articoli where titolo = '".$_POST["titolo"]."'")->fetch_assoc()){
                echo "non pui creare un'altro articolo con questo nome" ;
                ?><meta http-equiv="refresh" content="5; url=creaArticolo"><?php
            }
            $dir = "articoli/".str_replace(" ", "", $_POST["titolo"]);
            mkdir($dir, 0755);
            foreach($_FILES["immagini"]["tmp_name"] as $index => $tmp_name) {
                $file_name = str_replace(" ", "", $_FILES["immagini"]["name"][$index]);
                $destination = $dir . "/" . $file_name;
                move_uploaded_file($tmp_name, $destination);
            }
            $conn->query("insert into articoli (titolo, contenuto) values('".$_POST["titolo"]."', '".$_POST["contenuto"]."');");
        }else{?>
            <div class="container">
                <div class="form-container">
                    <h1 class="maiuscolo">
                        crea nuovo articolo
                    </h1>
                    <form action="creaArticolo" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="titolo" placeholder="titolo" id="titolo">
                        </div>
                        <div class="form-group">
                            <textarea name="contenuto" id="contenuto" placeholder="contenuto"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="immagini[]" placeholder="file" id="immagini" multiple>
                        </div>
                        <input type="submit" value="carica articolo">
                    </form>
                </div>
            </div>
        <?php }?>
    </body>
</html>