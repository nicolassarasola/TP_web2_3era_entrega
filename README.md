### Integrantes:
Nicolas Sarasola (miembro A) 
Hernan Valea (miembro B)

## GET

### Juegos

- `GET http://localhost/TP_web2_3era_entrega/api/juegos`  
  Mostrar todos los juegos.

---

#### Ordenar por

- `GET http://localhost/TP_web2_3era_entrega/api/juegos?orderBy=nombre`  
  Mostrar todos los juegos ordenados por nombre.

- `GET http://localhost/TP_web2_3era_entrega/api/juegos?orderBy=ID`  
  Mostrar todos los juegos ordenados por ID.

- `GET http://localhost/TP_web2_3era_entrega/api/juegos?orderBy=jugadores`  
  Mostrar todos los juegos ordenados por cantidad de jugadores.

- `GET http://localhost/TP_web2_3era_entrega/api/juegos?orderBy=fecha`  
  Mostrar todos los juegos ordenados por fecha de lanzamiento.

- `GET http://localhost/TP_web2_3era_entrega/api/juegos?orderBy=consola`  
  Mostrar todos los juegos ordenados por consola.

---

#### Filtrar presencia de multiplayer

- `GET http://localhost/TP_web2_3era_entrega/api/juegos?multiplayer=true`  
  Mostrar todos los juegos multiplayer.

- `GET http://localhost/TP_web2_3era_entrega/api/juegos?multiplayer=false`  
  Mostrar todos los juegos singleplayer.

---

## PUT

### Modificar un Juego

- `PUT http://localhost/TP_web2_3era_entrega/api/juegos/{id}`  
  Modifica un juego. El cuerpo de la solicitud debe ser enviado manualmente en formato JSON. Ejemplo:

  ```json
  {
      "ID_consola": 5,
      "nombre": "tekken tag tournament",
      "fecha_lanzamiento": "2000-03-09",
      "jugadores": 2
  }
