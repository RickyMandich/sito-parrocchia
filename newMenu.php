<?php require_once "header.php";
if(admin()):
    if(!isset($_GET["nome"])): ?>
        <form action="newMenu">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="link">Link:</label>
            <input type="text" id="link" name="link" required>
            <label for="padre">Padre:</label>
            <select id="padre" name="padre">
                <option value="0">Nessuno</option>
                <?php
                    $result = $conn->query("select * from navigatore");
                    while($row = $result->fetch_assoc()): ?>
                        <option value="<?= $row['id']; ?>">
                            <?= $row['nome']; ?>
                        </option>
                    <?php endwhile; ?>
            <input type="submit" value="crea">
        </form>
    <?php else: 
        $conn->query("insert into navigatore (nome, link, padre) values ('{$_GET['nome']}', '{$_GET['link']}', {$_GET['padre']})");
    endif;?>
<?php endif; ?>