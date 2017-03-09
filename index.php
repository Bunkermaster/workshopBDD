<?php
use \app\Connect;

require_once "vendor/autoload.php";
$pdo = Connect::get();
$stmt = $pdo->prepare('call selectTable(:table)');
$stmt->bindValue(':table', 'sale-type', PDO::PARAM_INT);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
$stmt = $pdo->prepare('call insertUtilisateur(:prenom, :nom, :email, :idType)');
$stmt->bindValue(':prenom', 'BOB', PDO::PARAM_STR);
$stmt->bindValue(':nom', 'Doublinage', PDO::PARAM_STR);
$stmt->bindValue(':email', 'bob@doblina.fr', PDO::PARAM_STR);
$stmt->bindValue(':idType', 11, PDO::PARAM_INT);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
$stmt = $pdo->prepare('call selectUtilisateurs(:limit)');
$stmt->bindValue(':limit', 1, PDO::PARAM_INT);
$stmt->execute();
dump($stmt->fetchAll(PDO::FETCH_OBJ));
