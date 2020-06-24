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


INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (1, 'Maison Campagne paumée','Jolie petite maison dans une campagne paumée au milieu de rien','17 laBellerie','Lille','50','5');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (2, 'Maison de ville','Maison avec un boulot pleureur a coté dune eglise rouge','20 rue georges melies','Nantes','55','4');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (3, 'Maison de ville','Grande maison avec beaucoup de chambre, jardin avec un prunus en plus','19 Avenue du Docteur Laennec','Marseille','100','10'); 
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (4, 'Maison alentour Paris','Grande maison avec un grand jardin bordant une forêt','104 rue de l\'hermitage','Paris','110','7');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (5, 'Chambre Gare de Lyon', 'Chambre chez l\'habitant près de la gare de Lyon','54 Avenue des grands hommes','Paris','57','2');  
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (6, 'Appt lumineux','Appartement lumineux au coeur de Paris Vaugirard','86 Rue des Paillettes','Paris','65','6');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (7, 'Adorable maison Bordelaise','Petite maison du XIXe siècle au coeur de Bordeaux','42 rue de la Réponse','Bordeaux','54','2');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (8, 'Studio sur péniche','Houseboat indépendant aménagé dans une ancienne timonerie','02 rue de Jules Vernes','Bordeaux','86','2');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (9, 'Joli studio + terrasse','Beau studio de caractère : Bohême et confortable, avec terrasse indépendante','791 Avenue du poulailler','Marseille','44','2');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (10, 'Maison de campagne','Grande maison avec cellier en péripherie de Marseille','10 rue du gué Baron Rocheserviere','Marseille','69','5');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (11, 'Ancien domaine viticole','Grande maison sur un ancien domaine viticole à 20min de Bordeaux','20 rue du satyre','Bordeaux','80','8');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (12, 'Appt centre ville','Appartement au centre de Lille pouvant accueillir jusqu\'à 4personnes','45 rue des fraises','Lille','36','4');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (13, 'Smart House','Maison chaleureuse, calme et lumineuse ; à seulement 15\' à pied du centre-ville','94 Boulevard des Americains','Lille','52','4');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (14, 'Gîte du nid de l\'île','Appartement sur le quai de Versaille niché au dernier étage offrant une vue magnifique','72 rue de l\'astronomie','Nantes','58','1');
INSERT INTO Logement(idLogem,nom,description,adresse,ville,prix,nbPersonne) VALUES (15, 'Chambre double centre-ville','Belle chambre idéale pour un couple ou une personne, située à 5min du château','15 Avenue du cheval','Nantes','39','2');


INSERT INTO Location(idLoca,dateDebut,dureeJour,idUtili,idLogem) VALUES (1, '2020-06-18',7,3,1);