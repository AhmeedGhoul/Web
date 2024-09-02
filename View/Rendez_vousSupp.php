
<?php
include '../Controller/Rendez_vousC.php';
include '../config.php';

$Rendez_vousC = new Rendez_vousC();
$IdDossier=$_GET["IdDossier"];
$IdRendez_vous=$_GET["id_rendez_vous"];
$Rendez_vousC->deleteRendez_vous($_GET["id_rendez_vous"]);
header("Location: Rendez_vousconsultadmin.php?IdDossier=$IdDossier");
?>