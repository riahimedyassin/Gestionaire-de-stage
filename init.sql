CREATE TABLE etudiant (
    nce INT PRIMARY KEY, 
    nom VARCHAR(20), 
    prenom VARCHAR(20), 
    classe VARCHAR(20)
);
CREATE TABLE enseignant (
    matricule INT PRIMARY KEY , 
    nom VARCHAR(20) , 
    prennom VARCHAR(20), 
); 
CREATE TABLE administrateur (
    login VARCHAR(20) PRIMARY KEY , 
    password VARCHAR(80) 
); 
CREATE TABLE administrateur (
    numjury INT PRIMARY KEY , 
    date_soutenance DATE ,
    note DOUBLE , 
    nce INT ,
    matricule INT, 
    FOREIGN KEY (nce) REFERENCES etudiant(nce) ON DELETE CASCADE,
    FOREIGN KEY (matricule) REFERENCES enseignant(matricule) ON DELETE CASCADE
); 


