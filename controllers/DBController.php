<?php 
    class DBController {

        public function getConnection (){
            /*
                Conexión de base de datos,
                    Nada que ver aquí
            */
            $servername = "localhost:3307";
            $username = "root";
            $password = "root";
            $dbname = "pokedex";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
                return false;
            } 
            return $conn;
        }

        public function trainerLogIn($trainerName){
            $conn = $this->getConnection();
            $sql = "SELECT * FROM trainer WHERE name = $trainerName";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {         
                while($row = $result->fetch_assoc()) {
                   return $row;
                }
            }
            $conn->close();
        }

        public function trainerRegister($trainerName){
            $conn = $this->getConnection();
            $isRegistered = $this->findDuplicates($trainerName);
            if ($isRegistered == 0) {
                $sql = "INSERT INTO trainer (name) VALUES ($trainerName)";
                $result = $conn->query($sql);
            }
            return $isRegistered;
            $conn->close();
        }

        public function findDuplicates($trainerName){
            $conn = $this->getConnection();
            $sql = "SELECT COUNT(*) AS 'trainerNumber' FROM trainer WHERE name LIKE '$trainerName'";
            $data = $conn->query($sql);
            
            if ($data->num_rows > 0) {
                while($row = $data->fetch_assoc()) {
                    return $row["trainerNumber"];
                }
            } 

            $conn->close(); 
        }

        public function getPokemonById($pokemonId){
            $conn = $this->getConnection();

            /*Lo único que necesitas saber de esta query
            es que trae ordenada toda la información que quiero
            de los pokemon */
                
                $sql = 
                /*Suerte para entenderlo*/
                "SELECT 
                    pokemon.id, 
                    pokemon.name,
                    pokemon.height,
                    pokemon.weight,
                    type.name AS 'type1',
                    (SELECT type.name
                        FROM pokemon_type
                        INNER JOIN pokemon ON pokemon_type.pokemon_id=pokemon.id
                        INNER JOIN type ON pokemon_type.type_id=type.id
                        WHERE pokemon.id = $pokemonId
                        AND slot = 2 ) 
                    AS 'type2',
                    (SELECT ability.name
                        FROM pokemon_ability
                        INNER JOIN pokemon ON pokemon_ability.pokemon_id=pokemon.id
                        INNER JOIN ability ON pokemon_ability.ability_id=ability.id
                        WHERE pokemon.id = $pokemonId
                        AND slot = 1 ) 
                    AS 'ability'
                FROM pokemon_type
                INNER JOIN pokemon ON pokemon_type.pokemon_id=pokemon.id
                INNER JOIN type ON pokemon_type.type_id=type.id
                WHERE pokemon.id = $pokemonId
                AND slot = 1";
            
            /*Fin de la query*/
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              
                while($row = $result->fetch_assoc()) {
                   return $row;
                }
            }
            $conn->close();
        }

        public function addPokemonToTeam($wildPokemonId, $trainerId, $pokeBallId, $isShiny){
            $conn = $this->getConnection();
            $sql = "INSERT INTO pokemon_trainer (pokemon_id, trainer_id, pokeball_id, is_shiny)
            VALUES ($wildPokemonId, $trainerId, $pokeBallId, $isShiny)";
            $result = $conn->query($sql);
            $conn->close();
        }
    }
?>