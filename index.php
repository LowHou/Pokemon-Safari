<!DOCTYPE html>
<html>
<head>
	<title> Pokefinder </title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style/main.css"/>
</head>
<body>
	<div class="row">
		<div class="offset-md-3 col-md-6">
			<div class="card">
				<div class="card-header offset-md-3 col-sm-6 text-center img-fluid" id ="image" >
					<!--AJAX-->
				</div>
				<div id="info" class="card-footer m-5 border border-white rounded bg-dark text-white">
					<div class="row">
						<div class="col-sm-6">
							<label class="attribute text-info">ID: </label>
							<span id = "id" class="value"><!--AJAX--></span>
						</div>
						<div class="col-sm-6">
							<label class="attribute text-info">Pokemon: </label>
							<span id = "name" class="value"><!--AJAX--></span>		
						</div>
					</div>

					<div class="row ">
						<div class="col-sm-6">
							<label class="attribute text-info">Type: </label>
							<span id = "type" class="value"><!--AJAX--></span>
						</div>
						<div class="col-sm-6">
							<label class="attribute text-info">Ability: </label>
							<span id = "ability" class="value"><!--AJAX--></span>
						</div>						
					</div>

					<div class="row">
						<div class="col-sm-6">
							<label class="attribute text-info">Height: </label>
							<span  id = "height" class="value"><!--AJAX--></span>
						</div>
						<div class="col-sm-6">
							<label class="attribute text-info">Weight: </label>
							<span id = "weight" class="value"><!--AJAX--></span>
						</div>
					</div>
					<div class="row">
						<div class="offset-sm-3 col-sm-3">
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
							  Catch
							</button>
						</div>
						<div class="col-sm-6">
							<button type="button" class="btn btn-info " onclick="pokemonEncounter();"> Run </button>	
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script src="js/main.js"></script>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select a Pokeball</h5>
      </div>
      <div class="modal-body btn-group btn-group-justified">
        <img type='button' class="close" data-toggle="tooltip" title="Poké ball" data-dismiss="modal"  onclick='pokemonCatch(this);' id="20" src='https://img.pokemondb.net/sprites/items/poke-ball.png' alt='Poké ball'>
        <img type='button' class="close" data-toggle="tooltip" title="Great ball" data-dismiss="modal"  onclick='pokemonCatch(this);' id='35' src='https://img.pokemondb.net/sprites/items/great-ball.png' alt='Great ball'>
        <img type='button' class="close" data-toggle="tooltip" title="Ultra ball" data-dismiss="modal"  onclick='pokemonCatch(this);' id='45' src='https://img.pokemondb.net/sprites/items/ultra-ball.png' alt='Ultra ball'>
      	<img type='button' class="close" data-toggle="tooltip" title="Timer ball" data-dismiss="modal" onclick='pokemonCatch(this);' id='50' src='https://img.pokemondb.net/sprites/items/timer-ball.png' alt='Timer ball'>
      	<img type='button' class="close" data-toggle="tooltip" title="Quick ball" data-dismiss="modal"  onclick='pokemonCatch(this);' id='50' src='https://img.pokemondb.net/sprites/items/quick-ball.png' alt='Quick ball'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
					
						

				
				