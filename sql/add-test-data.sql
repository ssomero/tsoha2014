INSERT INTO kayttaja (kayttajanimi, salasana, email, etunimi, sukunimi)
    VALUES ('ylläpitäjä', 'tsoha2014', 'yllapitaja@drinkkiarkisto.net', 'Yllä', 'Pitäjä');
INSERT INTO juomalaji (nimi) VALUES ('cocktail');
INSERT INTO juomalaji (nimi) VALUES ('booli');
INSERT INTO juomalaji (nimi) VALUES ('shotti');
INSERT INTO drinkki (nimi, juomalaji_id, lisaaja, lisaamisaika, ohjeet)
    VALUES ('rommikola', (select juomalaji_id from juomalaji where nimi='cocktail'), 
            (select kayttaja_id from kayttaja where kayttajanimi='ylläpitäjä'),
            now(), 'Sekoita ja nauti' );
INSERT INTO vaihtoehtoisnimi VALUES((select drinkki_id from drinkki where nimi='rommikola'),
            'cuba libre');
INSERT INTO ainesosa (nimi) VALUES ('rommi');
INSERT INTO ainesosa (nimi) VALUES ('kokis');
INSERT INTO kayttaja (kayttajanimi, salasana, email, etunimi, sukunimi)
    VALUES ('käyt123', 'kissa', 'kissa@koira.com', 'Ano', 'Nyymi');
INSERT INTO drinkkimixer (drinkki_id, ainesosa_id, maara, yksikko) VALUES (1, 1, 4, 'cl');
INSERT INTO drinkkimixer (drinkki_id, ainesosa_id, maara, yksikko) VALUES (1, 2, 2, 'dl');
