<?php

require_once '../Logica/LFamilia.php';
require_once '../Entidades/Familia.php';

$lFamilia = new LFamilia();

if (isset($_GET['idfamilia'])) {
    $id = $_GET['idfamilia'];
    $familias = $lFamilia->Cargar();

    foreach ($familias as $f) {
        if ($f->getIdfamilia() == $id) {
            $nombre = $f->getNombres();
            $descripcion = $f->getDescripcion();
            break;
        }
    }
} else {
    echo "No se especificó una familia.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modificar'])) {
    $familia = new Familia($_POST['idfamilia'], $_POST['nombres'], $_POST['descripcion']);
    $lFamilia->Actualizar($familia);
    echo "<script>alert('Familia modificada correctamente'); window.location.href='cargarFamilia.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Familia</title>
</head>
<body>
    <h2>Modificar Familia</h2><hr>
    <form method="POST">
        <input type="hidden" name="idfamilia" value="<?= htmlspecialchars($id); ?>">

        <label for="nombres">Nombre:</label><br>
        <input type="text" name="nombres" value="<?= htmlspecialchars($nombre); ?>" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" rows="4" cols="50" required><?= htmlspecialchars($descripcion); ?></textarea><br><br>

        <input type="submit" name="modificar" value="Modificar">
        <a href="cargarFamilia.php"><button type="button">Atrás</button></a>
    </form>
</body>
</html>
