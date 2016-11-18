drop database sportnet;
create database IF NOT EXISTS sportnet;

use sportnet;

create table IF NOT EXISTS 	participant(
id int(11) not null AUTO_INCREMENT PRIMARY KEY,
last_name varchar(25) not null,
name varchar(25) not null,
email varchar(25) not null,
birthday date not null,
nb_participant int(10) unique not null /*dossard*/
);

create table IF NOT EXISTS organizer(
id int(11) not null AUTO_INCREMENT PRIMARY KEY,
last_name varchar(25) not null,
name varchar(25) not null,
email varchar(25) not null,
password varchar(20) not NULL,
birthday date not null 
);

create table IF NOT EXISTS event(
id int(11) not null AUTO_INCREMENT PRIMARY KEY,
name varchar(100) not null,
description varchar(100) DEFAULT NULL,
place varchar(20) not NULL,
dicipline varchar(20) not NULL,
date_start date not null,
date_end date not null,
id_o int(11) not null,
FOREIGN KEY(id_o) REFERENCES organizer(id) ON DELETE CASCADE ON UPDATE CASCADE
);

create table IF NOT EXISTS trial(
id int(11) not null AUTO_INCREMENT PRIMARY KEY,
name varchar(100) not null,
description varchar(100) DEFAULT NULL,
date date not null,
time time not null, 
id_e int(11) not null,
id_o int(11) not null,
FOREIGN KEY(id_e) REFERENCES event(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(id_o) REFERENCES organizer(id) ON DELETE CASCADE ON UPDATE CASCADE
);

create table IF NOT EXISTS inscription(
id int(11) not null AUTO_INCREMENT PRIMARY KEY,
date_ins date not null,
id_e int(11) not null,
FOREIGN KEY(id_e) REFERENCES event(id) ON DELETE CASCADE ON UPDATE CASCADE
);

create table IF NOT EXISTS trial_participant(
id_p int(11) not null, 
id_t int(11) not null,
id_i int(11) not null,
FOREIGN KEY(id_p) REFERENCES participant(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(id_t) REFERENCES trial(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(id_i) REFERENCES inscription(id) ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY(id_p,id_t) 
);

/*create table IF NOT EXISTS inscription_trial(
id_i int(11) not null,
id_t int(11) not null,
FOREIGN KEY(id_i) REFERENCES inscription(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(id_t) REFERENCES trial(id) ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY(id_i,id_t) 
);
*/

INSERT INTO organizer (`last_name`,`name`,`email`,password,`birthday`) VALUES
('MENDEZ','DANIEL','daniel@gmail.com','123','1993-12-4'),
('TOVAR','JOSE','jose@gmail.com','123','1995-7-9');

INSERT INTO event (`name`,`description`,`place`,`dicipline`, `date_start`,`date_end`,`id_o` ) VALUES
('La Randolubilhac Equestre 2016','description','place','dicipline','2016-06-05','2016-06-05',1),
('Handi Val Trophée 2016','description','place','dicipline','2016-03-20','2016-03-20',1),
('8ème Triathlon Agenais','description','place','dicipline','2016-10-05','2016-10-05',2),
('ARVEnture Stand Up Paddle 2015','description','place','dicipline','2016-12-04','2016-12-04',2),
('Téléthon à Guécélard','description','place','dicipline','2016-11-22','2016-11-22',1),
('Les 3 heures de Saint-Aubin 2016','description','place','dicipline','2015-04-02','2015-04-02',2);

INSERT INTO participant (`last_name`,`name`,`email`,`birthday`,`nb_participant`) VALUES
('BUSTOS MENDOZA', 'CESAR ROGELIO','mendoza@gmail.com','2001-1-1',1),
('LARIOS DELGADO', 'JOEL SURISSADDAI','delgado@gmail.com','2001-1-1',2),
('MALDONADO HINOJOSA','MARIA LUISA','marialuisa@gmail.com','2001-1-1',3),
('RAMOS MARTINEZ', 'VIRIDIANA','viridiana.ramos@gmail.com','2001-1-1',4),
('LEON MORAN','KENIA SARAHI','moran@gmail.com','2001-1-1',5),
('OLMOS DAVILA','JOSE JULIAN','olmos@gmail.com','2001-1-1',6);

INSERT INTO trial (`name`,`description`,`date`,`time`,`id_e`,`id_o`) VALUES
('Cyclisme sur route - Option 1','description of trial','2016-12-4','13:00:00',5,1 ),
('Cyclisme sur route - Option 2','description of trial','2016-12-4','14:00:00',5,1),
('Cyclisme sur route - Option 3','description of trial','2016-12-4','15:00:00',5,1),
('Cyclisme sur route - Option 4','description of trial','2016-12-4','16:00:00',5,1),
('Cyclisme sur route - Option 5','description of trial','2016-12-4','17:00:00',5,1),
('Cyclisme sur route - Option 6','description of trial','2016-12-4','18:00:00',5,1);

INSERT INTO inscription(`date_ins`,`id_e`) VALUES
('2016-11-17',5),
('2016-11-17',5),
('2016-11-17',5),
('2016-11-17',5),
('2016-11-17',5),
('2016-11-17',5);

INSERT INTO trial_participant(`id_p`,`id_t`,`id_i`) VALUES
(1,2,1),
(2,1,1),
(3,1,1),
(4,1,2),
(5,3,2),
(6,4,2);



/*create table IF NOT EXISTS inscription(
id int(11) not null,
id_e int(11) not null,
id_t int(11) not null,
id_p int(11) not null,
FOREIGN KEY(id_e) REFERENCES event(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(id_t) REFERENCES trial(id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(id_p) REFERENCES participant(id) ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY(id,id_e,id_t,id_p) 
);

INSERT INTO inscription (`id`, `id_e`, `id_t`, `id_p`) VALUES
(1,1,1,1),
(2,1,1,1),
(3,1,1,1),
(4,1,1,1),
(5,1,1,1),
(6,1,1,1);
*/










