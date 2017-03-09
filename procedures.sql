SELECT "CREATION selectUtilisateurs" as INFO;
DROP procedure if exists selectUtilisateurs;
DELIMITER $$
CREATE PROCEDURE `selectUtilisateurs` ( myLimit INT )
BEGIN
	IF myLimit = 0 THEN SET myLimit = 10; END IF;
	SELECT * FROM `utilisateur` ORDER BY `id` DESC LIMIT myLimit;
END$$
DELIMITER ;

SELECT "CREATION selectTable" as INFO;
DROP procedure if exists selectTable;
DELIMITER $$
CREATE PROCEDURE `selectTable` ( maTable VARCHAR(100) )
  BEGIN
    SET @monSQL = CONCAT('SELECT * FROM `', maTable,'` ORDER BY `id` DESC LIMIT 10' );
    PREPARE stmt FROM @monSQL;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
  END$$
DELIMITER ;

SELECT "CREATION insertUtilisateur" as INFO;
DROP procedure if exists insertUtilisateur;
DELIMITER $$
CREATE PROCEDURE `insertUtilisateur` (lePrenom VARCHAR(100), leNom VARCHAR(100), lEmail VARCHAR(100), leId_type INT)
  BEGIN
    INSERT INTO
      `utilisateur`
      (`prenom`, `nom`, `email`, `id_type`)
    VALUES
      (lePrenom , leNom , lEmail , leId_type);
    SELECT LAST_INSERT_ID() as lastInsertID;
  END$$
DELIMITER ;

SELECT "CREATION updateUtilisateur" as INFO;
DROP procedure if exists updateUtilisateur;
DELIMITER $$
CREATE PROCEDURE `updateUtilisateur` (leId INT, lePrenom VARCHAR(100), leNom VARCHAR(100), lEmail VARCHAR(100), leId_type INT)
  BEGIN
    UPDATE
      `utilisateur`
    SET
      `prenom` = lePrenom,
      `nom`= leNom,
      `email` = lEmail,
      `id_type` = leId_type
    WHERE
      id = leId;
  END$$
DELIMITER ;

