CREATE DATABASE Predic;
Use Predic;

CREATE TABLE producto (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL,
    marca VARCHAR(100),
    categoria VARCHAR(100)
);

INSERT INTO producto(nombre,marca,categoria)
              Values('Leche Entera 170g', 'Gloria', 'Lacteos'),
              Values('Yofresh Lech.Fer TTPK 190G Fresa', 'Gloria', 'Tetra');
SELECT * FROM movimiento;


CREATE TABLE zona (
    id_zona INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255)
);

SELECT * FROM zona;

INSERT INTO zona (nombre,descripcion)
              Values('Zona A','Almacenamiento de productos lácteos en presentación de lata.'),
                    ('Zona B','Almacenamiento de leches y jugos envasados en cajas (Tetra Pak).'),
                    ('Zona C','Almacenamiento de bebidas en botellas de plástico.'),
                    ('Zona D','Cámara de frío para productos que requieren refrigeración.');


CREATE TABLE stock (
    id_stock INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT,
    id_zona INT,
    cantidad INT NOT NULL DEFAULT 0,

    UNIQUE(id_producto, id_zona),

    FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
    FOREIGN KEY (id_zona) REFERENCES zona(id_zona)
);

INSERT iNTO stock(id_producto,id_zona,cantidad)
            VALUES(1,1,3840),
                  (2,2,1200);

CREATE TABLE movimiento (
    id_movimiento INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATETIME NOT NULL,
    tipo ENUM('INGRESO','SALIDA')NOT NULL,
    id_producto INT NOT NULL,
    id_zona INT NOT NULL,
    cantidad INT NOT NULL,
    observacion VARCHAR(255),

    FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
    FOREIGN KEY (id_zona) REFERENCES zona(id_zona)
);

delete from producto where id_prxoducto=6;
delete from MOVIMIENTO;
SELECT* FROM producto;