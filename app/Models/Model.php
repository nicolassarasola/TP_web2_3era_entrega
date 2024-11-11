<?php
require_once './config.php';
class Model { 
    protected $db;

    public function __construct() {
        $this->db = new PDO(
        "mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }

    
    public function getJuegos($orderBy=false, $filtrarMultiplayer=null){
        $sql = 'SELECT * FROM juegos';
        
        if($orderBy) {
            switch($orderBy) {
                case 'nombre':
                    $sql .= ' ORDER BY nombre';
                    break;
                case 'jugadores':
                    $sql .= ' ORDER BY jugadores';
                    break;
                case 'consola':
                    $sql .= ' ORDER BY ID_consola';
                    break;
                case 'fecha':
                    $sql .= ' ORDER BY fecha_lanzamiento';
                    break;
                case 'ID':
                    $sql .= ' ORDER BY ID';
                    break;
            }
        }


        if($filtrarMultiplayer != null) {
            if($filtrarMultiplayer == 'true')
                $sql .= ' WHERE jugadores > 1';
            else
                $sql .= ' WHERE jugadores = 1';
        }


        $query = $this->db->prepare($sql);
        $query->execute();
    
 
        $juegos = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $juegos;
    }




    public function updateJuego($nombre, $jugadores, $fechaLanzamiento, $consolaID, $ID){
        
        $query = $this->db->prepare('UPDATE juegos SET nombre = ?, fecha_lanzamiento = ?, jugadores = ?, ID_consola = ? WHERE ID = ?');
        $query->execute([$nombre, $fechaLanzamiento, $jugadores, $consolaID, $ID]);

    }

    public function getJuego($id){  
        $query= $this->db->prepare('SELECT * FROM `juegos` WHERE ID = ?');
        $query->execute([$id]);

        $juego=$query->fetch(PDO::FETCH_OBJ);
                
        return $juego;
      
    }

    
    







/*      NO SE SI ES NECESARIO
    public function deleteJuego($id) {
        $query = $this->db->prepare('DELETE FROM `juegos` WHERE ID=?');
        $query->execute([$id]); 
    }
*/
  
}
