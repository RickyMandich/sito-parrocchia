<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
require_once "classi/Utente.php";
$file = basename($_SERVER['PHP_SELF']);
$file = preg_replace('/\?.*/', '', $file);
$file = preg_replace('/\.php$/', '', $file);
$conn = new mysqli(hostname: "localhost",username: "santifrancescoechiara", database:"my_santifrancescoechiara", port:3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function scanDirectory($directory){
    $dir = @opendir($directory);
    try{
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
    }catch(Error $e){
    }
}