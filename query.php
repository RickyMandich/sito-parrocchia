<?php
require_once("header.php");?>
<!DOCTYPE html>
<html lang="it" class="<?php echo $file;?>">
    <head>
    <?php require_once "metadati.php";?>
        <title>query</title>
    </head>
    <body>
        <?php 
        require_once "intestazione.php";
        require_once "navigatore.php";
        try{
            if(isset($_SESSION["user"])):?>
                <div class="container">
                    <form action="./query" method="get">
                        <input type="text" name="query" id="query" value="<?php if(isset($_GET["query"])) echo $_GET["query"]; else echo "select * from "; ?>">
                    </form>
                    <?php
                    $rs = $conn->query($_GET["query"]);
                    if($rs):
                        $resultSet = $rs->fetch_assoc()?>
                        <div class="decks-section">
                            <div class="decks-container">
                                <table border>
                                    <thead>
                                        <tr class="deck-header">
                                            <?php foreach($resultSet as $column=>$value): ?>
                                                <td>
                                                    <?php echo $column; ?>
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>
                                        <?php $rs = $conn->query($_GET["query"]); ?>
                                    </thead>
                                    <tbody>
                                        <?php while($resultSet = $rs->fetch_assoc()): ?>
                                            <tr class="card-in-deck-row deck-card">
                                                <?php foreach($resultSet as $value): ?>
                                                <td>
                                                    <?php echo $value;?>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php else:
                    echo "ho fatto ".$conn->affected_rows." modifiche";
                    endif;
                ?>
            <?php elseif(isset($_SESSION["user"])):?>
                <meta http-equiv="refresh" content="0; url=./home">
            <?php else: ?>
                <meta http-equiv="refresh" content="0; url=./login?from=<?php echo $file; ?>">
            <?php endif;
        }catch(ValueError){}
        require_once "footer.php";?>
    </body>
</html>