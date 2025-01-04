<?php
session_start();
header('Cache-Control: no-cache, no-store, must-revalidate');
require_once "classi/Utente.php";
$file = basename($_SERVER['PHP_SELF']);
$file = preg_replace('/\?.*/', '', $file);
$file = preg_replace('/\.php$/', '', $file);
$conn = new mysqli(hostname: "localhost",username: "santifrancescoechiara", database:"my_santifrancescoechiara", port:3306);
$GLOBALS["conn"] = $conn;
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
                    if(isset($_GET["edit"])){
                        ?><div class="removeImage"><?php
                    }
                    ?>
                        <img src="<?php echo (isset($_GET["edit"])?"../":"")."../$directory/$file"?>" alt="<?php echo "../$directory/$file"?>">
                        <?php
                        if(isset($_GET["edit"])){
                    ?></div><?php
                    }
                }
            }
        }
        closedir($dir);
    }catch(Error $e){
    }
}
function troncaAnteprimaArticolo($contenuto){
    $troncato = substr($contenuto, 0, 360);
    if($troncato != $contenuto){
        return $troncato."...";
    }
    return $troncato;
}

function admin(){
    if(isset($_SESSION["user"])){
        return unserialize($_SESSION["user"])->getAbilitazione() == 0;
    }
    return false;
}

function generaAnteprimaArticolo($articolo){
    ?>
        <span class="anteprimaArticolo">
            <h2 class="maiuscolo">
                <a href="/articolo/<?php echo $articolo["id"]?>">
                    <?php echo $articolo["titolo"];?>
                </a>
                <?php if($articolo["pinnato"] == "1"):?>
                    <?php if(admin()){?>
                        <form action="removePin" style="display: inline-block">
                            <input type="hidden" name="id" value="<?php echo $articolo["id"]?>">
                            <input type="hidden" name="from" value="home">
                            <input type="submit" value="&#128204;">
                        </form>
                    <?php }else{?>
                        &#128204;
                    <?php } ?>
                <?php else:?>
                    <?php if(admin()){?>
                        <form action="addPin" style="display: inline-block">
                            <input type="hidden" name="id" value="<?php echo $articolo["id"]?>">
                            <input type="hidden" name="from" value="home">
                            <input type="submit" value="&#128204;">
                        </form>
                    <?php } ?>
                <?php endif;?>
            </h2>
            <?php
                $articolo["contenuto"] = strip_tags(preg_replace("/<table>.*?<\/table>/", "", $articolo["contenuto"]), "<br>");
            ?>
            <?php echo troncaAnteprimaArticolo($articolo["contenuto"]);?>
        </span>
    <?php
}