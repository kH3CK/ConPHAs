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
("Bij ConPHAs helpen we jonge studenten hun eerste stappen te zetten in de wereld van bioplastics."),
("Jouw springplank naar een"), ("groene carrière");

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
("Bioloog", "Lorem ipsum dolor sit amet", "MBO 3", "Groningen, Muntinglaan 5", 50, 300, "2025-09-01 09:00:00", "Afstudeerstage",
"https://picsum.photos/200/200"), ("Laboriant", "Lorem ipsum dolor sit amet", "MBO 4", "Groningen, Jan Steenstraat 12", 40, 400, "2025-11-20 11:00:00", "Afstudeerstage",
"https://picsum.photos/200/200"), ("Milieudeskundige", "Lorem ipsum dolor sit amet", "MBO 3", "Groningen, Friesestraatweg 5", 54, 350, "2026-02-01 08:30:00", "Meewerkstage",
"https://picsum.photos/200/200"), ("Wetenschapsvoorlichter", "Lorem ipsum dolor sit amet", "MBO 4", "Groningen, Johan Willem Frisostraat 26", 20, 100, "2025-05-23 08:00:00", "Meewerkstage",
"https://picsum.photos/200/200"), ("Natuurbehoud", "Lorem ipsum dolor sit amet", "MBO 4", "Groningen, friesestraatweg", 54, 500, "2026-02-01 08:30:00", "Meewerkstage",
"https://picsum.photos/200/200"), ("Schoonmaker", "Lorem ipsum dolor sit amet", "MBO 1", "Assen, Weiersstraat", 10, 90, "2025-06-15 10:00:00", "Meewerkstage",
"https://picsum.photos/200/200"), ("Laboriant", "Lorem ipsum dolor sit amet", "MBO 3", "Assen, Thorbeckelaan", 35, 330, "2025-08-01 09:30:00", "afstudeerstage",
"https://picsum.photos/200/200"), ("Bioloog", "Lorem ipsum dolor sit amet", "HBO", "Leeuwarden, Groeneweg", 30, 250, "2026-03-01 08:30:00", "afstudeerstage",
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

INSERT INTO pages (name, title, filename) VALUES ("Hoofdpagina", "ConPHAs", ""), ("Over ons", "Over ConPHAs", "over_ons"), ("Stageplekken", "Stageplekken bij ConPHAs", "stageplekken"), ("Blog", "Blog van ConPHAs", "blog");

CREATE TABLE blogs (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    preview_text VARCHAR(300) NOT NULL,
    text TEXT NOT NULL,
    author VARCHAR(100) NOT NULL,
    publication_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    image_link VARCHAR(300) NOT NULL
);

CREATE TABLE categories (
    blog_id MEDIUMINT NOT NULL,
    name VARCHAR(100) NOT NULL,
    FOREIGN KEY (blog_id) REFERENCES blogs(id)
);

INSERT INTO blogs (title, preview_text, text, author, publication_date, image_link) VALUES
("Innovatieve oplossingen voor een duurzamere toekomst",
"In deze blog bespreken we de nieuwste innovaties op het gebied van duurzaamheid en hoe deze bijdragen aan een groenere toekomst. We onderzoeken verschillende technologieën die een positieve impact hebben op het milieu.",
"lorem ipsum", "Emma Jansen", "2023-03-15 16:28:49", "https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"),
("De rol van groene chemie in een circulaire economie",
"Groene chemie speelt een cruciale rol in de transitie naar een circulaire economie. In dit artikel bespreken we hoe duurzame chemische processen bijdragen aan het verminderen van afval en het hergebruik van grondstoffen.",
"lorem ipsum", "Thomas de Vries", "2023-02-28 06:12:26", "https://images.unsplash.com/photo-1507668077129-56e32842fceb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"),
("Duurzame landbouwmethoden voor een gezondere planeet",
"Duurzame landbouw is essentieel voor het behoud van onze ecosystemen. In deze blog verkennen we innovatieve landbouwmethoden die de impact op het milieu verminderen en tegelijkertijd de voedselproductie verbeteren.",
"lorem ipsum", "Sophie Bakker", "2023-02-10 11:05:15", "https://media1.thrillophilia.com/filestore/uwpz857lua13qmvub6um2v93dlrm_IMG%20Worlds%20%20of%20Adventure.jpg");

INSERT INTO categories (blog_id, name) VALUES (1, "Duurzamheid"), (1, "Innovatie"), (2, "Groene chemie"), (2, "Circulaire economie"), (3, "Duurzaamheid")