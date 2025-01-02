<?php
require_once "header.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $titolo = $conn->query("select titolo from articoli where id = $id")->fetch_assoc()['titolo'];

    // Elimina il record dalla tabella articoli
    $sql = "DELETE FROM articoli WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // Rimuovi la cartella corrispondente dai file sorgente
        $folderPath = "articoli/" . str_replace(" ", "-", $titolo);
        if (is_dir($folderPath)) {
            array_map('unlink', glob("$folderPath/*.*"));
            rmdir($folderPath);
        }

        echo "Articolo e cartella corrispondente sono stati eliminati.";
    } else {
        echo "Errore durante l'eliminazione del record: " . $conn->error;
    }
} else {
    echo "Nessun ID fornito.";
}
?>