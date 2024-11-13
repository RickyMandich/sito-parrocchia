<?php require_once "header.php";?>
<!DOCTYPE html>
<html lang="en" class="<?php echo $file?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $conn->query("select * from articoli where id = ".$_GET["id"])->fetch_assoc()["titolo"];?></title>
    </head>
    <body>
        
    </body>
</html>