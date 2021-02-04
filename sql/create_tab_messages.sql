CREATE TABLE doctor_messages(
    id INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(80) NOT NULL,
    lastname VARCHAR(80) NOT NULL,
    phone VARCHAR(18) NOT NULL,
    email VARCHAR(80) NOT NULL,
    message VARCHAR(250) NOT NULL,
    consultation VARCHAR(25) NOT NULL,
    time DATETIME DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY(id)
);