CREATE DATABASE pokedex;
USE DATABASE;

CREATE TABLE ability(

  id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name varchar(50) NOT NULL,
  generation int(11)
);

CREATE TABLE type(

  id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name varchar(50) NOT NULL
);


CREATE TABLE pokemon(

  id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name varchar(50) NOT NULL,
  height float(10),
  weight float(10),
  ability_id int(11),
  FOREIGN KEY (ability_id) REFERENCES ability(id)
);

CREATE TABLE pokemon_type(

  id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  pokemon_id int(11) NOT NULL,
  type_1 int(11) NOT NULL,
  type_2 int(11) NOT NULL DEFAULT '',
  FOREIGN KEY (pokemon_id) REFERENCES pokemon(id),
  FOREIGN KEY (type_1) REFERENCES type(id),
  FOREIGN KEY (type_2) REFERENCES type(id)

);