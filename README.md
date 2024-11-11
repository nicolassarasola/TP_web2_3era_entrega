## GET

### Juegos

- `GET http://localhost/tp3eraentrega/api/juegos`  
  Mostrar todos los juegos.

---

#### Ordenar por

- `GET http://localhost/tp3eraentrega/api/juegos?orderBy=nombre`  
  Mostrar todos los juegos ordenados por nombre.

- `GET http://localhost/tp3eraentrega/api/juegos?orderBy=ID`  
  Mostrar todos los juegos ordenados por ID.

- `GET http://localhost/tp3eraentrega/api/juegos?orderBy=jugadores`  
  Mostrar todos los juegos ordenados por cantidad de jugadores.

- `GET http://localhost/tp3eraentrega/api/juegos?orderBy=fecha`  
  Mostrar todos los juegos ordenados por fecha de lanzamiento.

- `GET http://localhost/tp3eraentrega/api/juegos?orderBy=consola`  
  Mostrar todos los juegos ordenados por consola.

---

#### Filtrar presencia de multiplayer

- `GET http://localhost/tp3eraentrega/api/juegos?multiplayer=true`  
  Mostrar todos los juegos multiplayer.

- `GET http://localhost/tp3eraentrega/api/juegos?multiplayer=false`  
  Mostrar todos los juegos singleplayer.

---

## PUT

### Modificar un Juego

- `PUT http://localhost/tp3eraentrega/api/juegos/{id}`  
  Modifica un juego. El cuerpo de la solicitud debe ser enviado manualmente en formato JSON. Ejemplo:

  ```json
  {
      "ID_consola": 5,
      "nombre": "tekken tag tournament",
      "fecha_lanzamiento": "2000-03-09",
      "jugadores": 2
  }
