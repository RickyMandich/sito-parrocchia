<?php
    require_once "header.php";
    function hasSubElement($id=0){
        return $GLOBALS["conn"]->query("select * from navigatore where padre = $id")->fetch_assoc();
    }
    function generaMenu($id=0, $edit = false){
        $menu = [];
        $result = $GLOBALS["conn"]->query("select id, nome, link from navigatore where padre = $id order by id");
        while($row = $result->fetch_assoc()){
            array_push($menu, $row);
        }
        ?><ul><?php
        foreach($menu as $voce){
            ?>
                <li>
                    <a href='<?php echo $edit?$voce['link']:"/editMenu/".$voce['id']?>'>
                        <?php echo $voce['nome']?>
                    </a>
                    <?php if(hasSubElement($voce['id'])) generaMenu($voce['id']); ?>
                </li>
                <?php
        }
        ?></ul><?php
    }
?>
<nav class="maiuscolo menuTendina">
    <?php if(hasSubElement()) generaMenu(); ?>
</nav>