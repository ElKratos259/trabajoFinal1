<?php 
require_once __DIR__ . '/../Datos/DB.php';
require_once __DIR__ . '/../Entidades/Familia.php';
require_once __DIR__ . '/../Interfaces/IFamilia.php';


class LFamilia implements IFamilias {
    private $conexion;

    public function __construct() {
        $this->conexion = DB::conectar();
    }

    public function guardar(Familia $familia) {
        $stmt = $this->conexion->prepare("INSERT INTO familias (nombres, descripcion) VALUES (?, ?)");
        $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion()
        ]);
    }

    public function cargar(): array {
        $stmt = $this->conexion->query("SELECT * FROM familias");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar(Familia $familia) {
        $stmt = $this->conexion->prepare("UPDATE familias SET nombres = ?, descripcion = ? WHERE idfamilia = ?");
        $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion(),
            $familia->getIdfamilia()
        ]);
    }

    public function eliminar(Familia $familia) {
        $stmt = $this->conexion->prepare("DELETE FROM familias WHERE idfamilia = ?");
        $stmt->execute([$familia->getIdfamilia()]);
    }
}

