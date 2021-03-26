/*
    Luis
    ICSE 2020
*/

function pokemonEncounter(){
    
    var pokemonId = pokemonRNG();

    /*
        Puse la posibilidad 
        de encontrar pokemon variocolor
        Si, estoy flipaísimo
     */
    var pokemonColor="normal";
  
    if (rng(shinyRatio) == 1){
        pokemonColor = "shiny";
        alert("SHINY!!");
    }

    /*AJAX + JSON*/

    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        pokemon = JSON.parse(this.responseText);
        
        /*Concatenación de la URL de la imagen*/
        var pokemonImage = 
                            "<a href='http://pokemondb.net/pokedex/"+pokemon.name+"'>"
                                +"<img src='https://projectpokemon.org/images/"+pokemonColor+"-sprite/"+pokemon.name+".gif' "
                                +"alt='"+pokemon.name+"'>"
                            +"</a>";
        
        /*Concatenación de los atributos*/
        wildPokemonName = pokemon.name[0].toUpperCase()+pokemon.name.substr(1);
        var pokemonHeight = Math.round((pokemon.height * 0.1)*100)/100 + " m";
        var pokemonWeight = Math.round((pokemon.weight * 0.1)*100)/100 + " kg";
        var pokemonTypes = pokemon.type1[0].toUpperCase()+pokemon.type1.substr(1);
        if (pokemon.type2 != null)
            pokemonTypes +=" / "+pokemon.type2[0].toUpperCase()+pokemon.type2.substr(1);
        var pokemonAbility = pokemon.ability[0].toUpperCase()+pokemon.ability.substr(1);

        /*Escribir los atributos en el HTML*/
        document.getElementById("image").innerHTML = pokemonImage;
        document.getElementById("id").innerHTML = pokemon.id;
        document.getElementById("name").innerHTML = wildPokemonName;
        document.getElementById("type").innerHTML = pokemonTypes;
        document.getElementById("ability").innerHTML = pokemonAbility;
        document.getElementById("height").innerHTML = pokemonHeight;
        document.getElementById("weight").innerHTML = pokemonWeight;       
      }
    };

    /*GET Pokemon Id -> PHP */

    xmlhttp.open("GET", "main.php?wildPokemonId="+pokemonId, true);
    xmlhttp.send();
}//Onclick en el botón Huir
function pokemonRNG(){
    /*
        Genera un id de entre los 807 pokemon
        (Generación 1 hasta la 7)
        El gif de Mr mime es el único que no funciona
    */
    return Math.round(Math.random() * 806) + 1;
}
function rng(ratio){

    /*
        Random Number Generator
        Pones como parámetro el % del ratio
    */
    if ((Math.random() < ratio * 0.01) > ratio * 0.01) {
        return 1;
    }else{
        return 2;
    }
}
function pokemonCatch(pokeBall){
    
    var catchRatio = pokeBall.id;
    //Dependiend de la pokeball es más o menos dificil
    var caught = rng(catchRatio);

    console.log(turn);
    if (caught == 1) {
        alert("You caught "+wildPokemonName);
        turn = 1;
        addPokemonToTeam(pokemon.id, trainerId, pokeBall.id);
        pokemonEncounter();
    }
    else{
        alert(wildPokemonName+" broke free!");
        if (rng(runChance + 2*turn) == 1) {
            alert(wildPokemonName+' ran away!');
            turn = 1;
            pokemonEncounter();
        }
        turn += 1;
    }
}//Al elegir pokeball
function addPokemonToTeam(wildPokemonId, pokeBallId, trainerId){
    var jsonInfo ='{ "pokemon_id":"'+wildPokemonId+'","pokeball":"'+pokeBallId+'", "trainerId":"'+trainerId+'"}';
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        pokemonTeam = JSON.parse(this.responseText);     
      }
    };

    /*POST Pokemon Id -> PHP */
    
    xmlhttp.open("POST", "main.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send('caughtPokemon='+jsonInfo);

}//Después de capturar
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
var pokemon;//Objecto pokemon
var wildPokemonName; //Es para que el nombre se vea más bonito
var shinyRatio = 0.1;// 0.1%
var turn = 1;//Contador de turnos
var runChance = 10;//10%
var trainerId;
pokemonEncounter();








