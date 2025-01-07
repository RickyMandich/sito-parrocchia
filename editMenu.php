<?php require_once "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once "metadati.php"; ?>
        <title>modifica navigatore</title>
    </head>
    <body>
        <?php
            require_once "intestazione.php";
            require_once "navigatore.php";
            function getEredi($id){
                $result = $GLOBALS["conn"]->query("select * from navigatore where padre = $id");
                $figli = [];
                while($row = $result->fetch_assoc()){
                    array_push($figli, $row);
                    $nipoti = getEredi($row['id']);
                    foreach($nipoti as $nipote){
                        array_push($figli, $nipote);
                    }
                }
                return $figli;
            }
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = "SELECT * FROM navigatore WHERE id = $id";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();

                $nome = $row['nome'];
                $link = $row['link'];
                $padre = $row['padre'];

                $eredi = getEredi($id);

                $query = "SELECT * FROM navigatore WHERE id != $id";
                $result = $conn->query($query);
                $nodi = [];
                while($row = $result->fetch_assoc()){
                    if(!in_array($row, $eredi)){
                        array_push($nodi, $row);
                    }
                }
                ?>

                <form method="get" action="/editMenu/<?php echo $id; ?>">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                    <label for="link">Link:</label>
                    <input type="text" id="link" name="link" value="<?php echo htmlspecialchars($link); ?>" required>
                    <label for="padre">Padre:</label>
                    <select id="padre" name="padre">
                        <option value="0">Nessuno</option>
                        <?php foreach ($nodi as $row): ?>
                            <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $padre) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($row['nome']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" value="Salva">
                </form>
                <?php
                    if($conn->query("select * from navigatore where padre = $id")->fetch_assoc()){
                        ?>
                            non puoi eliminare questo elemento visto che ha dei figli
                        <?php
                    }else{
                        ?>
                        <form action="/deleteMenu/<?php echo $id; ?>">
                            <input type="submit" value="Elimina">
                        </form>
                        <?php
                    }
            }else{
                generaMenu(edit:true);
            }
            ?>
            <ul>
                <li>
                    <a href="/newMenu">Crea nuovo elemento</a>
                </li>
            </ul>
            <?php
            require_once "footer.php";
        ?>
    </body>
</html>
<style>
    input[type="text"] {
        width: 48%;
    }
    label{
        display: block;
        width: 100px;
    }
    input[type="submit"] {
        float: right;
        width: 48%;
    }
</style>