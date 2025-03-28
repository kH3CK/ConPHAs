DROP DATABASE IF EXISTS conphas;

CREATE DATABASE conphas;

USE conphas;

CREATE TABLE colors (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    hex VARCHAR(6) NOT NULL
);

INSERT INTO colors (name, hex) VALUES ("Primary Color", "36B843"), ("Secondary Color", "37852D"), ("Primary Background", "FFFFFF"),
("Secondary Background", "D9D9D9"), ("Danger", "fb2c36");

CREATE TABLE texts (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(500) NOT NULL
);

INSERT INTO texts (text) VALUES ("ConPHAs"), ("https://placehold.co/200x200.png"),
("https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"), ('"Space Mono", monospace'),
("Jouw springplank naar een groene carrière!"), ("Bij ConPHAs helpen we jonge studenten
hun eerste stappen te zetten in de wereld van bioplastics. Of je nu op zoek bent naar een stage of meer wilt leren over duurzame
innovaties, wij verbinden je met de juiste bedrijven en kansen. Samen bouwen we aan een groenere toekomst!");

CREATE TABLE internships (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(1000) NOT NULL,
    minimum_level VARCHAR(25) NOT NULL,
    location VARCHAR(100) NOT NULL,
    weeks SMALLINT NOT NULL,
    hours SMALLINT NOT NULL,
    compensation SMALLINT NOT NULL DEFAULT 0,
    start_date_and_time TIMESTAMP NOT NULL,
    type VARCHAR(25) NOT NULL,
    image_link VARCHAR(300) NOT NULL
);

INSERT INTO internships (title, description, minimum_level, location, weeks, hours, start_date_and_time, type, image_link) VALUES
("Bioolog", "Lorem ipsum dolor sit amet", "MBO 3", "Groningen, Muntinglaan 5", 50, 300, "2025-09-01 09:00:00", "Afstudeerstage",
"https://picsum.photos/200/200");

CREATE TABLE trainees (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    middlenames VARCHAR(100) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    birthdate DATE NOT NULL,
    weeks SMALLINT NOT NULL DEFAULT 0,
    hours SMALLINT NOT NULL DEFAULT 0,
    done BOOLEAN DEFAULT false,
    internship_id MEDIUMINT NOT NULL,
    FOREIGN KEY (internship_id) REFERENCES internships(id)
);

INSERT INTO trainees (firstname, middlenames, lastname, birthdate, weeks, hours, done, internship_id) VALUES
("Bob", "de", "Dok", "1999-10-18", 40, 200, NULL, 1);

CREATE TABLE admins (
    iD MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(300)
);

INSERT INTO admins (username, password) VALUES ("Jaron", "$2y$10$yeQwbDmmdz/UTbGmQIZ44OiRX5GbFiGJMRo..7DTIDwTM35jmQqei");
-- bcrypt hash for 12346789

CREATE TABLE pages (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    title VARCHAR(100) NOT NULL,
    filename VARCHAR(100) NOT NULL,
    navbar BOOLEAN NOT NULL DEFAULT true
);

INSERT INTO pages (name, title, filename) VALUES ("Hoofdpagina", "ConPHAs", ""), ("Over ons", "Over ConPHAs", "over_ons");


