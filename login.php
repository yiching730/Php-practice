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
        <h1>login</h1>
        <a href="/test1/register.php" data-icon="gear" class="ui-btn-right">註冊</a>
    </div>

    <div class="ui-content" role="main">
        <label>帳號:</label>
        <input type="text" id="acc" value="">
        <label>密碼:</label>
        <input type="password" data-clear-btn="true" id="pw" value="">
        <a href="" class="ui-btn" id="login">登入</a>
    </div>
    <script>
        $(function() {
            $("#login").click(function() {
                var acc = $("#acc").val();
                var pw = $("#pw").val();
                var data = {
                    'acc': acc,
                    'pw': pw
                };
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/test1/verify.php",
                    data: data,
                    success: function(msg) {
                        alert(msg.message);
                        if(msg.message == "登入成功"){
                            window.location = "/test1/home.php";
                        }
                    }
                });
            });
        });
    </script>
</body>

</html> 