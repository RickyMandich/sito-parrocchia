<?php require_once "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>modifica navigatore</title>
    </head>
    <body>
        <?php
            require_once "intestazione.php";
            require_once "navigatore.php";
            if(isset($_GET['id'])){
                
            }else{
                generaMenu();
            }
            require_once "footer.php";
        ?>
    </body>
</html>