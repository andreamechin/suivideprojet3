drop table if exists Utilisateur;
drop table if exists Logement;
drop table if exists Location;

Create table Utilisateur (
	idUtili Serial primary key,
	nom text,
	prenom text,
	mail text,
	mdp text
);

Create table Logement(
	idLogem Serial primary key,
	nom text,
	description text,
	adresse text,
	ville text,
	prix text,
	nbPersonne integer
);

Create table Location (
	idLoca Serial primary key,
	dateDebut text,
	dureeJour integer,
	idUtili integer,
	idLogem integer,
	foreign key (idUtili) references Utilisateur(idUtili),
	foreign key (idLogem) references Logement(idLogem)
);


INSERT INTO Utilisateur(idUtili,nom,prenom,mail,mdp) VALUES (1, 'Andréa', 'Méchin','andrea@gmail.com','andrea123');
INSERT INTO Utilisateur(idUtili,nom,prenom,mail,mdp) VALUES (2, 'Mechin', 'Aymeric','mechin@gmail.com','mechin123');
INSERT INTO Utilisateur(idUtili,nom,prenom,mail,mdp) VALUES (3, 'Aymeric', 'Jacob','aymeric@gmail.com','aymeric123');
INSERT INTO Utilisateur(idUtili,nom,prenom,mail,mdp) VALUES (4, 'Jacob', 'Andréa','jacob@gmail.com','jacob123');


INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (1, 'Maison Campagne paumée','Jolie petite maison dans une campagne paumée au milieu de rien','17 laBellerie','La Chevrolliere','50','5');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (2, 'Maison de ville','maison avec un boulot pleureur a coté dune eglise rouge','20 rue georges melies','Nantes','55','4');

INSERT INTO Location(idLoca,dateDebut,dureeJour,idUtili,idLogem) VALUES (1, '18/06/2020',7,3,1);