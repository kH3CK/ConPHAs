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
"In deze blog bespreken we de nieuwste innovaties op het gebied van duurzaamheid en hoe deze bijdragen aan een groenere toekomst. We onderzoeken verschillende technologieën die een positieve impact hebben op het milieu...",
"In deze blog duiken we in de meest recente innovaties op het gebied van duurzaamheid en hoe deze bijdragen aan een groenere, leefbare toekomst voor iedereen. De wereld staat niet stil – en dat geldt ook voor technologie. Steeds meer slimme oplossingen worden ontwikkeld om onze ecologische voetafdruk te verkleinen, natuurlijke hulpbronnen efficiënter te benutten en de balans met onze planeet te herstellen.

We nemen je mee langs een aantal baanbrekende technologieën en trends die een positieve impact hebben op het milieu. Denk aan ontwikkelingen in hernieuwbare energie, circulair bouwen, groene mobiliteit, en zelfs innovaties in landbouw en voedselproductie. Deze technologische vooruitgang maakt het mogelijk om duurzamer te leven en werken, zonder in te leveren op comfort of kwaliteit.

Daarnaast kijken we ook naar hoe bedrijven en overheden hun verantwoordelijkheid nemen – en hoe jij als individu daar een rol in kunt spelen. Van zonnepanelen op je dak tot slimme energienetwerken en van hergebruik van materialen tot CO₂-neutrale productie: de mogelijkheden groeien elke dag.

Kortom: duurzaamheid is allang geen trend meer – het is een noodzaak. Maar gelukkig ook eentje vol hoop, innovatie en kansen. Lees mee en ontdek hoe deze groene beweging steeds meer vaart krijgt.", "Emma Jansen", "2023-03-15 16:28:49", "https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"),


("De rol van groene chemie in een circulaire economie",
"Groene chemie speelt een cruciale rol in de transitie naar een circulaire economie. In dit artikel bespreken we hoe duurzame chemische processen bijdragen aan het verminderen van afval en het hergebruik van grondstoffen...",
"Groene chemie speelt een steeds belangrijkere rol in de overgang naar een duurzame en circulaire economie. Waar traditionele chemische processen vaak afhankelijk zijn van fossiele grondstoffen en veel afval produceren, richt groene chemie zich juist op het ontwikkelen van milieuvriendelijke alternatieven – met oog voor mens, milieu én toekomstige generaties.

In dit artikel gaan we dieper in op hoe duurzame chemische processen kunnen bijdragen aan het verminderen van schadelijk afval en het hergebruiken van waardevolle grondstoffen. Denk bijvoorbeeld aan het ontwerpen van reacties die minder bijproducten opleveren, of het gebruik van hernieuwbare materialen in plaats van eindige fossiele bronnen.

Daarnaast kijken we naar innovatieve toepassingen, zoals biogebaseerde plastics, katalysatoren die efficiënter werken, en processen die draaien op groene energie in plaats van op aardolie. Deze nieuwe aanpak zorgt ervoor dat de chemische industrie – traditioneel gezien een grote vervuiler – juist een belangrijke speler wordt in het realiseren van een circulaire economie.

Groene chemie is misschien niet altijd zichtbaar, maar vormt wel de fundering onder veel duurzame innovaties. Van schoonmaakmiddelen tot farmacie, van materialen tot energie – overal waar chemie zit, ligt een kans om het beter te doen. En die kansen worden met beide handen aangegrepen.

", "Thomas de Vries", "2023-02-28 06:12:26", "https://images.unsplash.com/photo-1507668077129-56e32842fceb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"),


("Duurzame landbouwmethoden voor een gezondere planeet",
"Duurzame landbouw is essentieel voor het behoud van onze ecosystemen. In deze blog verkennen we innovatieve landbouwmethoden die de impact op het milieu verminderen en tegelijkertijd de voedselproductie verbeteren...",
"Duurzame landbouw is essentieel voor het behoud van onze ecosystemen én voor de toekomst van onze voedselvoorziening. Terwijl de wereldbevolking blijft groeien en de druk op natuurlijke hulpbronnen toeneemt, wordt het steeds duidelijker dat we onze manier van voedsel produceren moeten herzien. Gelukkig ontstaan er wereldwijd innovatieve landbouwmethoden die niet alleen de impact op het milieu beperken, maar ook zorgen voor gezondere bodems, meer biodiversiteit en efficiëntere oogsten.

In deze blog verkennen we een aantal van deze veelbelovende technieken. Denk aan precisielandbouw, waarbij met behulp van data en sensoren gewassen precies krijgen wat ze nodig hebben – niet meer en niet minder. Of agroforestry, waar bomen en landbouwgewassen op slimme wijze worden gecombineerd voor een gezonder ecosysteem. Ook hydroponics en vertical farming winnen terrein, vooral in stedelijke gebieden, waar ruimte schaars is maar de vraag naar lokaal voedsel groeit.

We kijken ook naar de rol van technologie, zoals drones, AI en robots, die boeren helpen om duurzamer en efficiënter te werken. En niet te vergeten: het herwaarderen van traditionele en regeneratieve landbouwmethoden, waarbij de natuur weer als partner wordt gezien in plaats van als tegenstander.

Duurzame landbouw is geen verre toekomstvisie meer – het gebeurt nu, overal om ons heen. En elke stap richting een duurzamer landbouwsysteem is een stap naar een gezondere planeet.

", "Sophie Bakker", "2023-02-10 11:05:15", "https://media1.thrillophilia.com/filestore/uwpz857lua13qmvub6um2v93dlrm_IMG%20Worlds%20%20of%20Adventure.jpg"),


("Nieuw project gelanceerd",
"We hebben onlangs een nieuw project gelanceerd dat veel aandacht heeft gekregen...",
"We hebben onlangs een nieuw project gelanceerd dat volop in de belangstelling staat – en met goede reden! In dit project zetten we vol in op bioplastics als duurzaam alternatief voor traditionele kunststoffen.
Bioplastics worden gemaakt van hernieuwbare grondstoffen, zoals maïszetmeel of suikerriet, en zijn vaak biologisch afbreekbaar. Dat betekent minder druk op het milieu, minder afval en een stap richting een circulaire economie. 

Samen met onze partners onderzoeken we hoe deze materialen op grotere schaal kunnen worden toegepast – van verpakkingen tot bouwmaterialen. De reacties zijn positief en de interesse groeit snel. 

We zijn trots op deze stap richting een schonere toekomst. Wordt vervolgd!","Jaron de Boer", "2025-01-15 09:30:00", "images/project.webp"),
 
 ("Uitbreiding van ons team",
  "ConPHAs verwelkomt drie nieuwe experts in ons groeiende team van professionals...",
  "We groeien – en dat doen we niet alleen in projecten, maar ook in mensen. Daarom zijn we superblij om drie nieuwe collega's te verwelkomen in ons team!

Met hun frisse ideeën, nieuwe energie en bakken aan ervaring brengen ze precies wat we nodig hebben om nog beter te worden in wat we doen. Of het nu gaat om slimme oplossingen bedenken, goed samenwerken of gewoon lekker knallen aan mooie projecten – deze drie passen er helemaal bij.

We kijken ernaar uit om samen te bouwen aan toffe dingen. Welkom bij ConPHAs – we zijn blij dat jullie er zijn!", "Emma Jansen", "2025-02-01 10:00:00", "images/team.jpg"),


("Innovatie award gewonnen",
 "We zijn trots om aan te kondigen dat ConPHAs de prestigieuze innovatie award heeft gewonnen...",
 "We zijn ontzettend trots om aan te kondigen dat ConPHAs de prestigieuze innovatie-award in de wacht heeft gesleept voor ons werk op het gebied van bioplastics!

Met dit project laten we zien hoe bioplastics – gemaakt uit hernieuwbare grondstoffen – een écht duurzaam alternatief kunnen vormen voor traditionele kunststoffen. Onze aanpak combineert innovatie, circulariteit en impact, en dat is niet onopgemerkt gebleven.

Deze award is een mooie erkenning voor het harde werk van ons team én voor de richting die we op willen: een toekomst waarin slimme materialen bijdragen aan een schonere, gezondere wereld. 

Bedankt aan iedereen die hieraan heeft bijgedragen – dit is pas het begin!", "Thomas de Vries", "2025-03-01 12:00:00", "images/award.jpg");

INSERT INTO categories (blog_id, name) VALUES (1, "Duurzaamheid"), (1, "Innovatie"), (2, "Groene chemie"), (2, "Circulaire economie"), (3, "Duurzaamheid");