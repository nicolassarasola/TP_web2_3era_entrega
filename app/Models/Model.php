<?php
require_once './config.php';
class Model { 
    protected $db;

    public function __construct() {
        $this->db = new PDO(
        "mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }

    
    public function getJuegos($orderBy=false, $filtrarMultiplayer=null){
        $sql = 'SELECT * FROM juegos';//el sql se separa para hacerlo pasar por logica, mira abajo
        
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


        // 2. Ejecuto la consulta
        $query = $this->db->prepare($sql);
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $juegos = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $juegos;
    }


/*

    public function updateJuego($nombre, $fechaLanzamiento, $jugadores, $IDConsola, $imagen = null, $id) {
    
        // Si se proporciona una imagen, se procesa y se guarda
    
        try {
 
            $query = $this->db->prepare('UPDATE juegos SET nombre = ?, fecha_lanzamiento = ?, jugadores = ?, ID_consola = ? WHERE ID = ?');
            $query->execute(array($nombre, $fechaLanzamiento, $jugadores, $IDConsola, $id));
            return $id; 
        
        } catch (Exception $e) {
            // Manejo de la excepción
            return false;
        }
        
    
            
    }


*/
/*
    public function deleteJuego($id) {
        $query = $this->db->prepare('DELETE FROM `juegos` WHERE ID=?');
        $query->execute([$id]); 
    }
*/
    

/*
    //////////////////////////////////////                         
    public function getTasks($filtrarFinalizadas = false, $orderBy = false) {  <-----------es de tareas
        $sql = 'SELECT * FROM tareas';

        if($filtrarFinalizadas) {
            $sql .= ' WHERE finalizada = 0';
        }

        if($orderBy) {
            switch($orderBy) {
                case 'titulo':
                    $sql .= ' ORDER BY titulo';
                    break;
                case 'prioridad':
                    $sql .= ' ORDER BY prioridad';
                    break;
            }
        }

        // 2. Ejecuto la consulta
        $query = $this->db->prepare($sql);
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $tasks = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $tasks;
    }
    //////////////////////////////////////////////*/


}
