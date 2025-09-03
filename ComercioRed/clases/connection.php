<?php
class DB {
   private $server;
   private $host;
   private $db;
   private $user;
   private $psw;
   private $charset;

   public function __construct() {
   

         $this->host    = '162.241.203.102';
   $this->db      = 'danie384_comercioRed';
   $this->user    = 'danie384_user';
   $this->psw     = 'Piconeria2025@';
   $this->charset = 'utf8_spanish2_ci';
   }

   /*
   // 🔹 Configuración para servidor remoto
     $this->server  = 'mysql';
      $this->host    = 'localhost';
      $this->db      = 'comerciored';
      $this->user    = 'root';
      $this->psw     = '';
      $this->charset = 'utf8mb4';
   */

   function connect() {
      try {
         $conexion = 'mysql:host='.$this->host.';dbname='.$this->db.';charset='.$this->charset;
         $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES   => false,
         ];

         $pdo = new PDO($conexion, $this->user, $this->psw, $options);
         // 🔹 Ajustar zona horaria (ejemplo: CDMX)
         $pdo->exec("SET time_zone = '-06:00'");
         return $pdo;
      } catch (PDOException $e) {
         die('Error de conexión: ' . $e->getMessage());
      }
   }
}
?>

