<?php
    class DB{
        public static function conectar(){
            $url = "pgsql:host=10.0.221.105;dbname=familiaDB";
            $user = "postgres";
            $password = "123";

            try {
                $cn = new PDO($url, $user, $password);
                $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $cn;
            } catch (PDOException $e) {
                echo "Error de conexión a la base de datos: " . $e->getMessage();
                return null;
            }
        }
    }
?>