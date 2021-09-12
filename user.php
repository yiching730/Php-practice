<?php
include_once("config.php");

$msg = [];
$acc = $_POST["acc"];
$pw = $_POST["pw"];
$salt = randtext(4);
$pw2 = md5($pw . $salt);

$sql = "SELECT count(*) FROM `user` WHERE `account` = :account";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':account', $acc, PDO::PARAM_STR);
$stmt->execute();
$rowCount = $stmt->fetchColumn();

if ($rowCount >= 1) {
    $msg['message'] = "該帳號已被註冊過~";
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "INSERT INTO user (`account`, `password`, `salt`) VALUES (:account, :password, :salt)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':account', $acc, PDO::PARAM_STR);
$stmt->bindParam(':password', $pw2, PDO::PARAM_STR);
$stmt->bindParam(':salt', $salt, PDO::PARAM_STR);

$stmt->execute();


$sql = "SELECT count(*) FROM `user` WHERE `account` = :account";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':account', $acc, PDO::PARAM_STR);
$stmt->execute();
$rowCount = $stmt->fetchColumn();

if ($rowCount == 1) {
    $msg['message'] = "註冊成功";
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    exit;
}

function randtext($length)
{
    $password_len = $length;    //字串長度
    $password = '';
    $word = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';   //亂數內容
    $len = strlen($word);
    for ($i = 0; $i < $password_len; $i++) {
        $password .= $word[rand() % $len];
    }
    return $password;
}
