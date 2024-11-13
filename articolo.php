<?php require_once "header.php"
    error_reporting(E_ALL);
    ini_set('display_errors', 1);?>
<!DOCTYPE html>
<html lang="en" class="<?php echo $file?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php ?></title>
    </head>
    <body>
        articolo
        <?php
        if(isset($_GET["id"])):
            echo $_GET["id"];
        endif;
        var_dump($_GET);?>
    </body>
</html>