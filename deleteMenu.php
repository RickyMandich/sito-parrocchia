<?php
require_once 'header.php';

if (admin()) {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        // Query per eliminare l'elemento con l'id specificato
        $sql = "DELETE FROM navigatore WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Record eliminato con successo";
        } else {
            echo "Errore durante l'eliminazione del record: " . $conn->error;
        }
    } else {
        echo "ID non specificato.";
    }
    ?><meta http-equiv="refresh" content="0;url=/editMenu"><?php
} else {?>
    <meta http-equiv="refresh" content="0;url=/home">
<?php }?>