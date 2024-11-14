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
        <title>crea articolo</title>
    </head>
    <body>
        <?php if(isset($_POST["titolo"])){
            if($conn->query("select * from articoli where titolo = '".$_POST["titolo"]."'")->fetch_assoc()){
                exit("non pui creare un'altro articolo con questo nome");
            }
            $dir = "articoli/".$_POST["titolo"];
            mkdir($dir, 0755);
            foreach($_FILES["immagini"]["tmp_name"] as $index => $tmp_name) {
                $file_name = $_FILES["immagini"]["name"][$index];
                $destination = $articolo_dir . "/" . $file_name;
                move_uploaded_file($tmp_name, $destination);
            }
        }else{?>
            <form action="creaArticolo" method="post" enctype="multipart/form-data">
                <input type="text" name="titolo" id="titolo">
                <input type="text" name="contenuto" id="contenuto">
                <input type="file" name="immagini[]" id="immagini" multiple>
            </form>
        <?php }?>
    </body>
</html>