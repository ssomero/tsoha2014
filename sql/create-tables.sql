CREATE TABLE juomalaji (
juomalaji_id serial ,
nimi varchar(40) NOT NULL ,
PRIMARY KEY (juomalaji_id)
);

CREATE TABLE kayttaja (
kayttaja_id serial ,
kayttajanimi varchar(40) NOT NULL ,
salasana varchar(20) NOT NULL ,
email varchar(40) NOT NULL ,
etunimi varchar(20) NOT NULL ,
sukunimi varchar(40) NOT NULL ,
PRIMARY KEY (kayttaja_id)
);

CREATE TABLE drinkki (
drinkki_id serial ,
nimi varchar(40) NOT NULL ,
juomalaji_id serial NOT NULL ,
lisaaja serial ,
lisaamisaika timestamp with time zone NOT NULL DEFAULT NOW(),   
PRIMARY KEY (drinkki_id) ,
FOREIGN KEY (lisaaja) REFERENCES kayttaja(kayttaja_id) 
    ON UPDATE CASCADE,
FOREIGN KEY (juomalaji_id) REFERENCES juomalaji(juomalaji_id)
);

CREATE TABLE vaihtoehtoisnimi (
drinkki_id serial ,
nimi varchar(40) NOT NULL ,
FOREIGN KEY (drinkki_id) REFERENCES drinkki(drinkki_id)
    ON DELETE CASCADE
);

CREATE TABLE ainesosa (
ainesosa_id serial ,
nimi varchar(40) NOT NULL ,
PRIMARY KEY (ainesosa_id)
);

CREATE TABLE drinkkimixer (
ainesosa_id serial ,
drinkki_id serial ,
FOREIGN KEY (ainesosa_id) REFERENCES ainesosa(ainesosa_id) 
    ON DELETE CASCADE
    ON UPDATE CASCADE ,
FOREIGN KEY (drinkki_id) REFERENCES drinkki(drinkki_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
