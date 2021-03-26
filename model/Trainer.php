<?php

    class Trainer {
        /*Atributos*/
            private $id;
            private $name;
            private $team;

        /* Getters */
            public function getTrainerAll(){
                /*
                    No la uso, pero a la hora de hacer 
                    los proyectos hay que pensar en su facilidad y
                    capacidad de apliación
                */
                foreach ($this as $key => $value) {
                    foreach ($this as $key => $value) {                  
                        $pokemonInfo[$key] = $value;
                    }
                    return $pokemonInfo;
                    
                }
            }

            public function getPokemonAsJSON(){
                /*Pasalo como objeto JSON*/
                /*Para mi querido AJAX*/
                foreach ($this as $key => $value) {
                    $JSON_info[$key] = $value;
                }
                return json_encode($JSON_info);
            }

            public function getId(){
                return $this->id;
            }
            public function getName(){
                return $this->name;
            }

            public function getTeam(){
                return $this->team;
            }

            public function getPokemonByTeamSlot($slot){
                return $this->team[$slot-1];
            }

        /* Setters */
            public function setTrainerAll($trainerDBInfo){
                /*Insertar los atributos desde la Info de la DB*/
                foreach ($trainerDBInfo as $key => $value) {
                    $this->{$key} = $value;
                }
            }

            public function setId($id){
                $this->id = $id;
            }

            public function setName($name){
                $this->name = $name;
            }

            public function setTeam($pokemonId, $slot){
                $this->name[$slot-1] = $pokemonId;
            }

            
    }

?>