<?php
require '../constants/check-login.php';
    $mycv = $_POST['cv'];
    $src = $mycv;
    //echo $mycv;
    echo '<iframe id="iframePDF" src='.$src.' frameborder="0" width="100%" height="100%"></iframe>';

?>