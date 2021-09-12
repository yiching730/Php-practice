<?php 
if (!$_COOKIE['loginStatus']) {
    header("Location: http://localhost/test1/login.php");
}

include_once("config.php");
$sql = "SELECT * FROM `article`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$titlelist = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
    <title>HTML Tutorial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <div data-role="header" style="overflow:hidden;">
        <h1>home</h1>
        <a href="" data-icon="gear" class="ui-btn-left">回目錄</a>
        <a href="/test1/logout.php" data-icon="gear" class="ui-btn-right">登出</a>
    </div>

    <div class="ui-content" role="main">
        <a href="/test1/messageboard.php" class="ui-btn ui-shadow ui-btn-inline ui-btn-icon-left ui-icon-comment">留言</a>

        <div style="height:20px">
        </div>

        <a href="#popupCloseRight" data-rel="popup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">留言</a>
        <div data-role="popup" id="popupCloseRight" class="ui-content" style="max-width:280px">
        <a href="/test1/messageboard.php" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
        <form>
            <label for="textarea-1">Textarea:</label>
            <textarea name="textarea-1" id="textarea-1"></textarea>
            <input type="submit" id="submit" value="送出">
        </form>
        </div>

        <div style="height:20px">
        </div>

        <ul data-role="listview" data-inset="true">
            <?php foreach ($titlelist as $k => $v): ?>
                <li><a href="#"><?= ($v['title']) ?? "" ?><p><?= ($v['article']) ?? "" ?></p><p><?= ($v['datetime']) ?? "" ?></p></a></li>       
            <?php endforeach; ?>
        </ul>
    </div>

</body>

</html> 

