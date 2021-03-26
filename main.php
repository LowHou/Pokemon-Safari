<?php
	/*Librerías*/
	require_once("model/Pokemon.php");
	require_once("controllers/DBController.php");

	/*
	if (isset($_GET["caughtPokemon"])) {
		$caughtPokemon = json_decode($_POST["caughtPokemon"], true);

        foreach ($caughtPokemon as $key => $value) {
        	$trainer->addPokemonToTeam();
            $function = "Set".$key;
            $user->$function($value);
        }
		# code...
	}
	*/
	if (isset($_GET["wildPokemonId"])) {
		/*
			Se ejecutará cada vez que se recarga la página 
			o se pulsa el botón de huir
		*/	
		$wildPokemonId = $_GET["wildPokemonId"];
        $wildPokemon = new Pokemon();
        $pokedex = new DBController();

        /*Select pokemon from DB using wildPokemonId*/
        /*Returns row array en pokemonDBinfo*/
        $pokemonDBInfo = $pokedex->getPokemonById($wildPokemonId);

        /*Create Pokemon instace with db info*/
        $wildPokemon->setPokemonAll($pokemonDBInfo);
       	
       	/*Pasa a AJAX el pokemon como JSON*/
		echo $wildPokemon->getPokemonAsJSON();
	}


	
	
?>

