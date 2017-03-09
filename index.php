<?php
use \app\Connect;

require_once "vendor/autoload.php";
function colorMessage($msg)
{
    echo "\033[44m".$msg.PHP_EOL;
}
$pdo = Connect::get();
// load procedures
colorMessage("load procedures");
$pdo->query('source procedure.sql');
// select * de la table sale-type
colorMessage("select * de la table sale-type");
$stmt = $pdo->prepare('call selectTable(:table)');
$stmt->bindValue(':table', 'sale-type', PDO::PARAM_STR);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
// select * de la table sale-table
colorMessage("select * de la table sale-table");
$stmt = $pdo->prepare('call selectTable(:table)');
$stmt->bindValue(':table', 'sale-table', PDO::PARAM_STR);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
// insertion utilisateur
colorMessage("insertion utilisateur");
$stmt = $pdo->prepare('call insertUtilisateur(:prenom, :nom, :email, :idType)');
$stmt->bindValue(':prenom', 'BOB', PDO::PARAM_STR);
$stmt->bindValue(':nom', 'Doublinage', PDO::PARAM_STR);
$stmt->bindValue(':email', 'bob@doblina.fr', PDO::PARAM_STR);
$stmt->bindValue(':idType', 11, PDO::PARAM_INT);
$stmt->execute();
// >= 5.4 ou fatal error
$insertId = $stmt->fetchAll(PDO::FETCH_OBJ)[0]->lastInsertID;
dump($insertId);
// liste dernier utilisateur inséré
colorMessage("liste dernier utilisateur inséré");
$stmt = $pdo->prepare('call selectUtilisateurs(:limit)');
$stmt->bindValue(':limit', 1, PDO::PARAM_INT);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
// update utilisateur
colorMessage("update utilisateur");
$stmt = $pdo->prepare('call updateUtilisateur(:id, :prenom, :nom, :email, :idType)');
$stmt->bindValue(':idType', 11, PDO::PARAM_INT);
$stmt->bindValue(':id', $insertId, PDO::PARAM_INT);
$stmt->bindValue(':prenom', 'Batman', PDO::PARAM_STR);
$stmt->bindValue(':nom', 'Doublinananananage', PDO::PARAM_STR);
$stmt->bindValue(':email', 'blob@doblina.fr', PDO::PARAM_STR);
$stmt->execute();
// liste dernier utilisateur inséré
$stmt = $pdo->prepare('call selectUtilisateurs(:limit)');
$stmt->bindValue(':limit', 1, PDO::PARAM_INT);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
