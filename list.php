<?php
include_once("config.php");



$sql = "SELECT * FROM `article`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$titlelist = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($titlelist); exit;