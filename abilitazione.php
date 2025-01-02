<?php
include 'header.php';

if (isset($_GET['a'])) {
    $abilitazione = $_GET['a'];
    $conn->query("UPDATE utenti SET abilitazione=0 WHERE abilitazione=$abilitazione");
    if ($conn->affected_rows == 1) {
        echo "utente abilitato con successo";
    } else {
        echo "impossibile abilitare l'utente, controllare quale può essere il problema sapendo che il codice di abilitazione fornito è $abilitazione e che a <a href='https://santifrancescoechiara.altervista.org/query?query=select+nome%2C+email%2C+abilitazione+from+utenti'>questa pagina</a> puoi vedere i codice di abilitazione di tutti (se il valore è 0 l'utente è già abilitato)";
    }
} else {
    ?>
    <meta http-equiv="refresh" content="0; url=/home">
    <?php
}