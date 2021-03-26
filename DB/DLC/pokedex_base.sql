
CREATE TABLE trainer(
	id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
	name varchar(20) NOT NULL

);


CREATE TABLE pokeball(
	id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
	name varchar(11) NOT NULL,
	catch_rate float(10)
);

CREATE TABLE pokemon_trainer(

  id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  trainer_id int(11) NOT NULL,
  pokemon_id int(11) NOT NULL,
  pokeball_id int(11) DEFAULT 1,
  is_shiny int(1) DEFAULT 0,
  slot int(1) NOT NULL,
  FOREIGN KEY (pokemon_id) REFERENCES pokemon(id),
  FOREIGN KEY (trainer_id) REFERENCES trainer(id),
  FOREIGN KEY (pokeball_id) REFERENCES pokeball(id)
);