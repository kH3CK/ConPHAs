## ConPHAs

Welkom bij **ConPHAs**, hét platform dat jonge studenten helpt bij het vinden van een stage in de bioplasticssector. Wij geloven in een duurzame toekomst en willen studenten de kans geven om ervaring op te doen binnen deze innovatieve industrie. 🌍✨

## 🌱 Over ConPHAs

ConPHAs (Connecting PHAs) verbindt talentvolle studenten met bedrijven in de bioplasticsindustrie. Onze missie is om een brug te slaan tussen onderwijs en praktijk, zodat jonge professionals hun carrière kunnen starten met relevante werkervaring en waardevolle connecties. 🤝

## 🚀 Onze Diensten

- **Stagebemiddeling** 🎓: Wij koppelen studenten aan bedrijven op basis van hun studie en interesses.
- **Netwerkmogelijkheden** 🔗: Toegang tot een breed netwerk van bedrijven en professionals binnen de bioplasticssector.
- **Loopbaanadvies** 💡: Begeleiding en advies over carrièrekeuzes en professionele groei.
- **Workshops & Events** 📅: Leerzame sessies en evenementen over duurzaamheid, bioplastics en innovatie.

## 🖥️ Skills

Wij werken met de volgende technologieën:

- JavaScript, HTML, TailwindCSS, SQL, PHP 

## 🔍 Waarom Kiezen Voor ConPHAs?

- Gespecialiseerd in de **bioplasticssector** 
- Directe **verbinding met bedrijven** 
- Persoonlijke **begeleiding en advies** 
- Focus op **duurzaamheid en innovatie** 

## 📌 Opdrachtgever

Dit is een **scrumproject** dat wij uitvoeren voor **Noorderpoort**. Hierbij leren wij hoe je goed samenwerkt in teamverband en projectmatig werkt. 

## 📥 Usage/Examples <!--waarom zijn sommige headings in het nederlands en sommige in het engels? welke taal zouden wij moeten gebruiken voor deze?-->

Om te starten, clone de repository:

```
git clone git@github.com:kH3CK/ConPHAs.git
```

Daarna:
1. Installeer **XAMPP** met **Apache**, **PHP** en **MySQL**
2. Voeg dit toe aan **XAMPP installatie folder\apache\conf\extra\httpd-vhosts.conf**:
    `<VirtualHost *:80>
    ServerName scrum.conphas
    DocumentRoot "de pad naar de project folder"
    <Directory "de pad naar de project folder">
        Options +Indexes +Includes +FollowSymLinks +MultiViews
        AllowOverride All
        Require local
    </Directory>
    </VirtualHost>`
3. Voeg dit toe aan **C:\Windows\System32\drivers\etc\hosts**:
    `127.0.0.1 scrum.conphas`
4. Start **Apache** en **MySQL**
5. Klik op **Admin** in de **MySQL** rij
6. Klik op **SQL** op de pagina die je was gestuurd naar
7. Kopieer alles van uit **import.sql** in deze project
8. Plak het in het groote text area op de pagina
9. Klik op **Go**
10. Installeer Node.js
11. Open command line/git bash/terminal in project folder en voer `npm install` en `npm run build` uit.
12. Ga naar http://scrum.conphas
13. Ga naar http://scrum.conphas/admin als je wil om naar de admin pagina te gaan. Om in te loggen, gebruik gebruikersnaam Jaron en wachtwoord 12346789 <!--gecopypasted van uit mijn backend eindproject met kleine aanpassingen, misschien kan herschereven worden om meer passend te zijn en zou moeten ook double checken als ik geen grammatica/taalfouten hier heb-->

## ✍️ Authors

- **Koen Smit**
- **Ramon Varwijk**
- **Oleksandr Antonov**
- **Jason Van Ark**

---

Samen bouwen we aan een duurzamere toekomst! 🌍✨

