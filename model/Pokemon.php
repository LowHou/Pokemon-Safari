<?php

    class Pokemon {
        /*Atributos*/
            private $id;
            private $name;
            private $type1;
            private $type2;
            private $ability;
            private $height;
            private $weight;
   
        function __construct(){}

        /* Getters */
            public function getPokemonAll(){
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

            public function getType1(){
                $types = $this->type1;
                return $types;
            }

            public function getType2(){
                $types = $this->type2;
                return $types;
            }

            public function getAbility(){
                return $this->ability;
            }

            public function getHeight(){
                return $this->Height;
            }

            public function getWeight(){
                return $this->weight;
            }

        /* Setters */
            public function setPokemonAll($pokemonDBInfo){
                /*Insertar los atributos desde la Info de la DB*/
                foreach ($pokemonDBInfo as $key => $value) {
                    $this->{$key} = $value;
                }
            }

            public function setId($id){
                $this->id = $id;
            }

            public function setName($name){
                $this->name = $name;
            }

            public function setType1($type1){
                $this->type1 = $type1;
            }

            public function setType2($type2){
                $this->type2 = $type2;
            }

            public function setAbility($ability){
                $this->ability = $ability;
            }

            public function setHeight($height){
                $this->height = $height;
            }

            public function setWeight($weight){
                $this->weight = $weight;
            }

    }

?>