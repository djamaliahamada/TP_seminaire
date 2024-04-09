
CREATE TABLE Intervenant (
id INT AUTO_INCREMENT , 
nom VARCHAR(10), 
prenom VARCHAR(10), 
affectation VARCHAR(20), 
url_page_perso VARCHAR(100), 
PRIMARY KEY (id)) ENGINE=InnoDB;  


CREATE TABLE Seminaire (
id INT AUTO_INCREMENT ,
id_Intervenant INT NOT NULL,
titre VARCHAR(30), 
resumer VARCHAR(200), 
lieu VARCHAR(10), 
date  DATE, 
date_mise_à_jour DATE, 
PRIMARY KEY (id)) ENGINE=InnoDB; 
 
ALTER TABLE Seminaire ADD CONSTRAINT FK_Seminaire_id_Intervenant 
FOREIGN KEY (id_Intervenant) REFERENCES Intervenant (id);