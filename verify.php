<?php 
include_once("config.php");

$acc = $_POST["acc"];
$pw = $_POST["pw"];

$sql = "SELECT * FROM `user` WHERE `account` = :account";
$stmt = $pdo->prepare($sql);
$stmt->execute(['account' => $acc]);
$user = $stmt->fetch();

$msg = [];

$pw2 = md5($pw . $user['salt']);

if (!isset($user) || !$user) {
    $msg['message'] = "沒有此帳號";
    echo json_encode($msg);
    exit;
}

if ($pw2 !== $user['password']) {
    $msg['message'] = "密碼輸入錯誤";
    echo json_encode($msg);
    exit;
}

$msg['message'] = "登入成功";
setcookie("loginStatus", true);
setcookie("loginId", $user['id']);
echo json_encode($msg, JSON_UNESCAPED_UNICODE);
exit;
