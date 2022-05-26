create database google_maps;
use google_maps;
create table locales(
	id int auto_increment primary key,
    nombre varchar(255),
    coordenadas varchar(255),
    poblacion varchar(255),
    tipo varchar(255)
);
insert into locales (nombre, coordenadas, poblacion, tipo) values ('Bar Marsella', '{lat: 41.3782418, lng: 2.1712432}', 'Barcelona', 'Bar');
insert into locales (nombre, coordenadas, poblacion, tipo) values ('Icebarcelona', '{lat: 41.3853718, lng: 2.1971997}', 'Barcelona', 'Bar');
insert into locales (nombre, coordenadas, poblacion, tipo) values ('Espit chupitos', '{lat:41.3876521, lng:2.1602093}', 'Barcelona', 'Bar');
insert into locales (nombre, coordenadas, poblacion, tipo) values ('Mayura', '{lat: 41.3938953, lng: 2.1720116}', 'Barcelona', 'Restaurante');
insert into locales (nombre, coordenadas, poblacion, tipo) values ('Razzmatazz', '{lat: 41.3952238, lng: 2.1871033}', 'Barcelona', 'Discoteca');
insert into locales (nombre, coordenadas, poblacion, tipo) values ('Opium', '{lat: 40.4379481, lng: -3.6921857}', 'Madrid', 'Discoteca');
insert into locales (nombre, coordenadas, poblacion, tipo) values ('Velvet', '{lat: 40.4203387, lng: -3.7076421}', 'Madrid', 'Discoteca');

select * from locales;