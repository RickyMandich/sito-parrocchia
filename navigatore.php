<?php
    require_once "header.php";
    function hasSubElement($id=0){
        return $GLOBALS["conn"]->query("select * from navigatore where padre = $id")->fetch_assoc();
    }
    function generaMenu($id=0){
        $menu = [];
        $result = $GLOBALS["conn"]->query("select nome, link from navigatore where padre = $id order by id");
        while($row = $result->fetch_assoc()){
            array_push($menu, $row);
        }
        foreach($menu as $voce){
            ?>
            <li>
                <a href='<?php echo $voce['link']?>'>
                    <?php echo $voce['nome']?>
                </a>
                <?php if(hasSubElement($id)) generaMenu($voce['id']); ?>
            </li>
        <?php
        }
    }
?>
<nav class="maiuscolo menuTendina">
    <ul>
        <?php if(hasSubElement()) generaMenu(); ?>
    </ul>
</nav>