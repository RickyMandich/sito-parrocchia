<?php
session_start();
require_once "classi/Utente.php";
$file = basename($_SERVER['PHP_SELF']);
$file = preg_replace('/\?.*/', '', $file);
$file = preg_replace('/\.php$/', '', $file);
$conn = new mysqli(hostname: "localhost",username: "santifrancescoechiara", database:"my_santifrancescoechiara", port:3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function scanDirectory($directory){
    // Verifica se la directory esiste
    if (!file_exists($directory)) {
        die("Errore: La directory $directory non esiste");
    }
    // Verifica i permessi
    if (!is_readable($directory)) {
        die("Errore: La directory $directory non è leggibile");
    }
    // Prova ad aprire la directory con gestione errori
    $dir = @opendir($directory);
    if ($dir === false) {
        die("Errore nell'apertura della directory: " . error_get_last()['message']);
    }
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            if(is_dir("$directory/$file")){
                scanDirectory("$directory/$file");
            }else{
                ?>
                    <img src="<?php echo "../$directory/$file"?>" alt="<?php echo "../$directory/$file"?>">
                <?php
            }
        }
    }
    closedir($dir);
}