CREATE TABLE brands(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(50),
    PRIMARY KEY (ID)
);

CREATE TABLE stores(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    address_location VARCHAR(255),
    city VARCHAR(50),
    id_brand INT(11),
    FOREIGN KEY (id_brand) REFERENCES brands(ID),
    PRIMARY KEY (ID)
);

CREATE TABLE items(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(50),
    id_store INT(11),
    FOREIGN KEY (id_store) REFERENCES stores(ID),
    FULLTEXT KEY (name),
    PRIMARY KEY (ID)
);

CREATE TABLE searchLogs(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    date_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_item INT(11),
    FOREIGN KEY (id_item) REFERENCES items(ID),
    PRIMARY KEY (ID)
)


