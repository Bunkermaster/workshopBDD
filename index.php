<?php
use \app\Connect;

require_once "vendor/autoload.php";
$pdo = Connect::get();
// load procedures
$pdo->query('source procedure.sql');
// select * de la table sale-type
$stmt = $pdo->prepare('call selectTable(:table)');
$stmt->bindValue(':table', 'sale-type', PDO::PARAM_STR);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
// select * de la table sale-table
$stmt = $pdo->prepare('call selectTable(:table)');
$stmt->bindValue(':table', 'sale-table', PDO::PARAM_STR);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
// insertion utilisateur
$stmt = $pdo->prepare('call insertUtilisateur(:prenom, :nom, :email, :idType)');
$stmt->bindValue(':prenom', 'BOB', PDO::PARAM_STR);
$stmt->bindValue(':nom', 'Doublinage', PDO::PARAM_STR);
$stmt->bindValue(':email', 'bob@doblina.fr', PDO::PARAM_STR);
$stmt->bindValue(':idType', 11, PDO::PARAM_INT);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
// liste dernier utilisateur inséré
$stmt = $pdo->prepare('call selectUtilisateurs(:limit)');
$stmt->bindValue(':limit', 1, PDO::PARAM_INT);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
