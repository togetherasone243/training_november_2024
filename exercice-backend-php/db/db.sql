CREATE DATABASE vote_uac;
USE vote_uac;

CREATE TABLE etudiant(id INT PRIMARY KEY, matricule TEXT, pwd TEXT, nom TEXT, postnom TEXT, prenom TEXT);

CREATE TABLE poste(id INT PRIMARY KEY, description TEXT);

CREATE TABLE candidature(id INT PRIMARY KEY, dateCandidature date, idEtudiant INT, idPoste INT);

CREATE TABLE vote(id INT PRIMARY KEY, dateHeure DATETIME, idEtudiant INT, idCandidature INT);
