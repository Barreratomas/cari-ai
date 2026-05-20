CREATE TABLE IF NOT EXISTS clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    last_name VARCHAR(100),
    identification VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    reference VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT,
    product_id INT,
    quantity INT,
    total DECIMAL(15,2)
);

INSERT INTO clients VALUES (1,'Pedro','Perez','12345612'),(2,'Juan','Sanchez','99888773'),
(3,'Maria','Torres','20014032'),(4,'Marcos','Vargas','85274196'),(5,'Morena','Lopez','74165432');

INSERT INTO products VALUES (1,'Televisor','100-342'),(2,'Nevera','100-343'),(3,'Microondas','100-344');

INSERT INTO orders VALUES (1,1,1,10,15000000),(2,2,1,2,3000000),(3,2,3,5,2500000),
(4,3,1,6,9000000),(5,3,2,5,15000000);