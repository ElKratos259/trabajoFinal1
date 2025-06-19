<?php
require_once '../Logica/LFamilia.php';
require_once '../Entidades/Familia.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idfamilia'])) {
    $id = $_POST['idfamilia'];
    
    $familia = new Familia();
    $familia->setIdfamilia($id);

    $log = new LFamilia();
    $log->Eliminar($familia);
}

header('Location: CargarFamilia.php');
exit;
?>
