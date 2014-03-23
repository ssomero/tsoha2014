INSERT INTO kayttaja (kayttajanimi, salasana, email, etunimi, sukunimi)
    VALUES ('ylläpitäjä', 'tsoha2014', 'yllapitaja@drinkkiarkisto.net', 'Yllä', 'Pitäjä');
INSERT INTO juomalaji (nimi) VALUES ('cocktail');
INSERT INTO juomalaji (nimi) VALUES ('booli');
INSERT INTO juomalaji (nimi) VALUES ('shotti');
INSERT INTO drinkki (nimi, juomalaji_id, lisaaja, lisaamisaika)
    VALUES ('Rommikola', (select juomalaji_id from juomalaji where nimi='cocktail'), 
            (select kayttaja_id from kayttaja where kayttajanimi='ylläpitäjä'),
            now() );
INSERT INTO vaihtoehtoisnimi VALUES((select drinkki_id from drinkki where nimi='Rommikola'),
            'Cuba Libre');
INSERT INTO ainesosa (nimi) VALUES ('rommi');
INSERT INTO ainesosa (nimi) VALUES ('CocaCola');
