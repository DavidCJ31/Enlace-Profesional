use empleo;
drop table tbl_states;
create table tbl_states(id int(11) auto_increment, state_name varchar(100), parent_id int(11), Primary key(id));
insert into tbl_states(state_name) values ('San José'), ('Alajuela'), ('Cartago'), ('Heredia'), ('Guanacaste'), ('Puntarenas'), ('Limón'), ('Fuera del país');
#SJ
insert into tbl_states(state_name, parent_id) values
('San José',1),('Escazu',1),('Desamparados',1),('Puriscal',1),('Tarrazu',1),('Aserri',1),('Mora',1)
,('Goicochea',1),('Santa Ana',1),('Alajuelita',1),('Vasquez de Coronado',1),('Acosta',1),('Tibas',1)
,('Moravia',1),('Montes de Oca',1),('Turrubares',1),('Dota',1),('Curridabat',1),('Perez Zeledon',1),('Leon Cortez Castro',1);

#Alajuela
insert into tbl_states(state_name, parent_id) values
('Alajuela',2), ('San Ramon',2),('Grecia',2),('San Mateo',2),('Atenas',2),('Naranjo',2),('Palmares',2)
,('Poas',2),('Orotina',2),('San Carlos',2),('Zarcero',2),('Valverde Vega',2),('Upala',2),('Los Chiles',2),('Guatuso',2),('Rio Cuarto',2);
#Cartago
insert into tbl_states(state_name, parent_id) values
('Cartago',3),('Paraiso',3),('La Union',3),('Jimenez',3),('Turrialba',3),('Alvarado',3)
,('Oreamuno',3),('El Guarco',3);
#Heredia
insert into tbl_states(state_name, parent_id) values
('Heredia',4),('Barva',4),('Santo Domingo',4),('Santa Barbara',4),('San Rafael',4),('San Isidro',4),('Belen',4)
,('Flores',4),('San Pablo',4),('Sarapiqui',4);

#Guanacaste 
insert into tbl_states(state_name,parent_id) values 
('Liberia',5),('Nicoya',5),('Santa Cruz',5),('Bagaces',5)
,('Carrillo',5),('Cañas',5),('Abangares',5),('Tilaran',5),('Nandayure',5),('La Cruz',5),('Hojancha',5);
#Puntarenas
insert into tbl_states(state_name,parent_id)values
('Puntarenas',6),('Esparza',6),('Buenos Aires',6),('Montes de Oro',6),('Osa',6),('Aguirre',6),('Golfito',6)
,('Coto Brus',6),('Parrita',6),('Corredores',6),('Garabito',6);
#Limon
insert into tbl_states(state_name,parent_id) values
('Limon',7),('Pococi',7),('Siquirres',7),('Talamanca',7),('Matina',7),('Guacimo',7);
