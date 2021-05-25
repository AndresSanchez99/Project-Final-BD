Create table estadios
(
	id_estadio integer PRIMARY KEY AUTO_INCREMENT,
    Nom_estadio varchar(60) NOT NULL,
    cap_estadio integer NOT NULL

);
Create table presidentes
(
    id_presidente integer PRIMARY KEY AUTO_INCREMENT,
    nom_presidente varchar(80) NOT NULL,
    fec_nac_pre date NOT NULL


);
Create table posiciones 
(
    id_posicion integer PRIMARY KEY AUTO_INCREMENT,
    nom_posicion varchar(30) NOT NULL
);
Create table goles
(
	id_gol integer PRIMARY KEY AUTO_INCREMENT,
	tipo_gol varchar(20) NOT NULL,
    fecha_gol date NOT NULL,
    minuto_gol time NOT NULL
);

Create table faltas
 (
    id_falta integer PRIMARY KEY AUTO_INCREMENT,
    tipo_tarjeta varchar(20) NOT NULL,
    Tip_falta varchar(20) NOT NULL
 );
Create table equipos
 (
    id_equipo  integer PRIMARY KEY AUTO_INCREMENT,
    nom_equipo varchar(80)NOT NULL,
    ciu_equipo varchar(60) NOT NULL,
    titulos_liga_equi integer NOT NULL,
    id_presidente integer,
    id_estadio integer,
    foreign key (id_presidente) references presidentes(id_presidente),
    foreign key (id_estadio) references estadios(id_estadio)

 );
Create table jugadores
(
    id_jugador integer PRIMARY KEY AUTO_INCREMENT,
    no_camiseta integer NOT NULL,
    nom_jugador varchar(80) NOT NULL,
    fec_nac_jugador date NOT NULL,
    pos_jugador integer,
    id_gol integer,
    id_falta integer,
    id_equipo integer,
    foreign key (pos_jugador) references posiciones(id_posicion),
    foreign key (id_gol) references goles(id_gol),
    foreign key (id_falta) references faltas(id_falta),
    foreign key (id_equipo) references equipos(id_equipo)

); 
Create table partidos
 (
    id_partido integer PRIMARY KEY AUTO_INCREMENT,
    cod_partido varchar(30) NOT NULL,
    fecha_partido date NOT NULL,
    hora_partido time NOT NULL,
    id_equipo_local integer,
    id_equipo_visit integer,
    foreign key (id_equipo_local) references equipos(id_equipo),
    foreign key (id_equipo_visit) references equipos(id_equipo),
    nom_partido varchar(80) NOT NULL

 );
 Create table  calendario_partidos
 (
    id_calendario integer PRIMARY KEY AUTO_INCREMENT,
    nom_fecha varchar(20) NOT NULL,
    id_partido integer,
    foreign key(id_partido) references partidos(id_partido)
 );