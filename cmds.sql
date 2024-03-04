create database  cafeteria;
use cafeteria;

CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(50) NOT NULL,
    `apellido` VARCHAR(50) NOT NULL,
    `dni` CHAR(8) NOT NULL,
    `fechaNa` DATE NOT NULL,
    `telefono` CHAR(9) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `perfil` varchar(255) NOT NULL
) ENGINE=InnoDB;

create table if not exists `menu` (
	`idM` int auto_increment primary key,
	`nombre` varchar(100) not null,
	`dsc` varchar(250) not null,
	`precio` decimal(10,2) not null,
	`categoria` varchar(100),
	`tipo` varchar(100),
	`imagen` varchar(200)
) engine=InnoDB;

#-------------------

alter table menu auto_increment = 1;

-- bebidas

INSERT INTO `menu` (`nombre`, `dsc`, `precio`, `categoria`, `tipo`, `imagen`) VALUES
('Espresso', 'Delicioso café de grano molido recién hecho, a presión.', 25.00, 'cafe', 'bebidas', 'https://i.imgur.com/eqJFMzP.png'),
('Macchiato', 'Café suave con leche caliente; 90% café y 10% leche.', 24.00, 'cafe', 'bebidas', 'https://i.imgur.com/SBvtC9i.png'),
('Café Cortado', 'Un delicioso café con leche tibia texturizada.', 15.50, 'cafe', 'bebidas', 'https://i.imgur.com/E6SDSyo.png'),
('Café con leche', 'Café pasado de la casa con leche de su preferencia.', 15.50, 'cafe', 'bebidas', 'https://i.imgur.com/ssgNBBc.png'),
('Café Americano', 'Café puro de la casa. Helado o caliente.', 15.00, 'cafe', 'bebidas', 'https://i.imgur.com/oNiL7cD.png'),
('Capuccino', 'Contiene café espresso, espuma de leche y leche al vapor, en capas.', 25.50, 'cafe', 'bebidas', 'https://i.imgur.com/gxksnCY.png'),
('Café Latte', 'Café suave con leche caliente con leche al vapor.', 15.50, 'cafe', 'bebidas', 'https://i.imgur.com/cJtGzHi.png'),
('Moccachino', 'Un delicioso café con leche tibia y cacao puro.', 25.00, 'cafe', 'bebidas', 'https://i.imgur.com/Ebew20V.png'),
('Chai Latte', 'Té chai tibio con la leche de su preferencia.', 20.00, 'Té', 'bebidas', 'https://i.imgur.com/HRXpuuA.png'),
('Chocolate Caliente', 'Chocolate caliente con leche, especialidad de la casa.', 19.00, 'leche', 'bebidas', 'https://i.imgur.com/5n1EZwU.png'),
('Jugo de naranja', 'Jugo de naranjas frescas, exprimidas al momento.', 10.50, 'jugo', 'bebidas', 'https://i.imgur.com/I21uYPk.png'),
('Pumpkin Spice', 'Leche con especias y puré de calabaza.', 28.00, 'leche', 'bebidas', 'https://i.imgur.com/oQdoczJ.png');

-- comidas

INSERT INTO `menu` (`nombre`, `dsc`, `precio`, `categoria`, `tipo`, `imagen`) VALUES
('Sandwich de Pollo', 'Sabroso sándwich de pollo apanado con lechuga y tomate.', 8.00, 'sandwich', 'alimentos', 'https://i.imgur.com/l9rO25y.png'),
('Sandwich de queso y jamón', 'Delicioso sandwich de jamón con queso a la parrilla.', 7.50, 'sandwich', 'alimentos', 'https://i.imgur.com/9elW2QE.png'),
('Croissant', 'Croissants de masa hojaldrada de mantequilla.', 10.50, 'pan', 'alimentos', 'https://i.imgur.com/1UZZ6D8.png'),
('Pain au Chocolat', 'Pan de masa hojaldrada con chocolate.', 10.90, 'pan', 'alimentos', 'https://i.imgur.com/aKCsQv1.png'),
('Pan al ajo', 'Pan bagette con mantequilla de ajo y especias.', 12.00, 'pan', 'alimentos', 'https://i.imgur.com/GDa7UQa.png'),
('Sandwich de Pavo', 'Sandwich de jamón del país con verduras.', 8.50, 'sandwich', 'alimentos', 'https://i.imgur.com/BuZoF1t.png'),
('Panini', 'Pan a la plancha con tocino y verduras.', 8.50, 'sandwich', 'alimentos', 'https://i.imgur.com/KmOd25O.png'),
('Ensalada César', 'Bowl de ensalada personal con aderezo y pollo.', 10.00, 'ensalada', 'alimentos', 'https://i.imgur.com/suBjnKc.png'),
('Ensalada de frutas', 'Bowl de frutas diversas picadas, acompañadas de miel.', 10.00, 'ensalada', 'alimentos', 'https://i.imgur.com/m5UpYJP.png'),
('Tres Leches', 'Pastel casero de tres leches tamaño personal.', 12.50, 'postre', 'alimentos', 'https://i.imgur.com/p3ma8kY.png'),
('Pastel de chocolate', 'Pastel casero de chocolate bañado en chocolate líquido.', 13.50, 'postre', 'alimentos', 'https://i.imgur.com/ecyrga6.png'),
('Pastel de espinaca', 'Tarta de espinacas con huevo y queso personal.', 10.00, 'tarta', 'alimentos', 'https://i.imgur.com/Ni7nX7a.png'),
('Quiche de tocino y queso', 'Tarta de jamón y queso fundido personal.', 10.00, 'tarta', 'alimentos', 'https://i.imgur.com/ISQWheF.png'),
('Cheescake de fresa', 'Tarta de queso personal con fresas frescas.', 15.50, 'postre', 'alimentos', 'https://i.imgur.com/RaCPSlf.png'),
('Cheescake de arándano', 'Tarta de queso personal con arándanos frescos.', 15.50, 'postre', 'alimentos', 'https://i.imgur.com/VnkiGkW.png');


#-------------------

select * from usuarios;
select * from menu;

UPDATE usuarios
SET perfil = 'https://imgur.com/9TLPvBy.png'
WHERE id = 5;
