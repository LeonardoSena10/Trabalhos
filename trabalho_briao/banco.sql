create database Meu_banco_de_dados;
use Meu_banco_de_dados;
create table pokemon (
   id int primary key auto_increment,
   nome varchar(100) not null,
   tipo1 varchar(100) not null,
   tipo2 varchar(100) not null,
   imagem varchar(255)
);
insert into pokemon (id, nome, tipo1, tipo2, imagem)
values 
(1, "Bulbasaur", "Grama", "Veneno", "20240403224403001.jpg"),
(2, "Ivysaur", "Grama", "Veneno", "20240403224436002.png"),
(3, "Venusaur", "Grama", "Veneno", "20240403224453003.png"),
(4, "Charmander", "Fogo", "", "20240403224607004.png"),
(5, "Charmeleon", "Fogo", "", "20240403224634005.png"),
(6, "Charizard", "Fogo", "Voador", "20240403224655006.png"),
(7, "Squirtle", "Água", "", "20240403224732007.png"),
(8, "Wartortle", "Água", "", "20240403224756008.png"),
(9, "Blastoise", "Água", "", "20240403224812009.png");