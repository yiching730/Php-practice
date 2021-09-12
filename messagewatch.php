<?php
include_once("config.php");

$title = $_POST["title"];
$article = $_POST["article"];
$accid = $_COOKIE['loginId'];


$sql = "INSERT INTO `article` (`accid`, `title`, `article`) VALUES (:accid, :title, :article)";
$stmt = $pdo->prepare($sql);
$pdo->query("SET NAMES utf8");	
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':article', $article, PDO::PARAM_STR);
$stmt->bindParam(':accid', $accid, PDO::PARAM_STR);

$stmt->execute();
$rowCount = $stmt->fetchColumn();

