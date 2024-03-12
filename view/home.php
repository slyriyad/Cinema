<?php ob_start(); ?>



<?php
$titre = "details ";
$titre_secondaire = "Details ";
$contenu = ob_get_clean();
require "view/template.php";
?>