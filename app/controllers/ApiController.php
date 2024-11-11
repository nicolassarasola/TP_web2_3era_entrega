<?php
require_once './app/Models/Model.php';
require_once './app/Views/jsonView.php';

class ApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Model();
        $this->view = new JSONView();
    }
 
  
    public function getAll($req) {
        
      
        $orderBy = false;

        if(isset($req->query->orderBy))
            $orderBy = $req->query->orderBy;




        $filtrarMultiplayer = null;
       
        if(isset($req->query->multiplayer)) {
            $filtrarMultiplayer = $req->query->multiplayer;
        }
    


        $juegos = $this->model->getjuegos($orderBy,$filtrarMultiplayer);
        
        return $this->view->response($juegos);
    }





    public function update($req, $res){

        $id = $req->params->id;

        $juego=$this->model->getJuego($id);
        
        if(!$juego){
            return $this->view->response("juego inexistente con el id: $id",404);
        }

        //valido datos
        if(empty($req->body->nombre)||!isset($req->body->nombre)||
            empty($req->body->jugadores)||!isset($req->body->jugadores)||
            empty($req->body->fecha_lanzamiento)||!isset($req->body->fecha_lanzamiento)||
            empty($req->body->ID_consola)||!isset($req->body->ID_consola)){

            return $this->view->response("datos invalidos o inexistentes",400);

        }
        //asigno datos del body
       
        $nombre = $req->body->nombre;
        $jugadores = $req->body->jugadores;
        $fechaLanzamiento = $req->body->fecha_lanzamiento;
        $consolaID = $req->body->ID_consola;

        //envio al model
        $this->model->updateJuego($nombre, $jugadores, $fechaLanzamiento, $consolaID, $id);

        //devuelvo la tarea modificada(buena practica)

        $juego=$this->model->getJuego($id);
        return $this->view->response($juego, 201);



    }











/*

    public function update($req, $res){
        $id = $req->params->id;

        // obtengo la tarea de la DB
        $juego = $this->model->getJuego($id);

        
        if(!$juego) {
            return $this->view->response("La tarea con el id=$id no existe", 404);
        }

        if(empty($req->body->nombreJuego)
        ||empty ($req->body->fechaLanzamiento)
        || empty($req->body->cantidadJugadores)
        || empty($req->body->categoriaID)) {
    
            return $this->view->response("faltan completar datos",400);
        }  
       
       
        $nombre = $req->body->nombreJuego;
        $fechaLanzamiento = $req->body->fechaLanzamiento;
        $cantidadJugadores = $req->body->cantidadJugadores;
        $categoriaID = $req->body->categoriaID;
        
       
        $id=$this->model->updateJuego($nombre, $fechaLanzamiento, $cantidadJugadores, $categoriaID, $imagen = null, $id);

        if(!$id){
            return $this->view->response("error al insertar tarea",500);
        }
        $juego=$this->model->getJuego($id);
        return $this->view->response($juego,201);

    }

*/










    /*
    public function delete($req, $res) {
      
        $id = $req->params->id;

        // obtengo la tarea de la DB
        $juego = $this->model->getJuego($id);

        
        if(!$juego) {
            return $this->view->response("La tarea con el id=$id no existe", 404);
        }
        
        $this->model->deleteJuego($id);
        $this->view->response("la tarea con el id=$id se elimino con exito",200);

    }
*/
  /*  public function add($req , $res){

        if(empty($req->body->nombreJuego)
        ||empty ($req->body->fechaLanzamiento)
        || empty($req->body->cantidadJugadores)
        || empty($req->body->categoriaID)) {
    
            return $this->view->response("faltan completar datos",400);
        }  
       
       
        $nombre = $req->body->nombreJuego;
        $fechaLanzamiento = $req->body->fechaLanzamiento;
        $cantidadJugadores = $req->body->cantidadJugadores;
        $categoriaID = $req->body->categoriaID;

       
        $id=$this->model->addjuego($nombre,$fechaLanzamiento,$cantidadJugadores,$categoriaID, $imagen = null);
        
       if(!$id){
        return $this->view->response("error al insertar tarea",500);
       }
        $juego=$this->model->getJuego($id);
        return $this->view->response($juego,201);

    }
*/


}

