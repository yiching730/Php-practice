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
        <h1>註冊</h1>
        <a href="/test1/login.php" data-icon="gear" class="ui-btn-right">登入</a>
    </div>

    <div class="ui-content" role="main">
        <label>請輸入帳號:</label>
        <input type="text" id="acc" value="">
        <label>請輸入密碼:</label>
        <input type="password" data-clear-btn="true" id="pw" value="">
        <a href="" class="ui-btn" id="register">註冊</a>
    </div>
    <script>
        $(function() {
            $("#register").click(function() {
                var acc = $("#acc").val();
                var pw = $("#pw").val();
                var data = {
                    'acc': acc,
                    'pw': pw
                };

                if(data.acc == ""){
                    alert("請輸入帳號，帳號為空白!");
                    return;
                }

                if(data.pw == ""){
                    alert("請輸入密碼，密碼欄為空白!");
                    return;
                }
               
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/test1/user.php",
                    data: data,
                    success: function(msg) {
                        if (msg.message == "該帳號已被註冊過~"){
                            alert(msg.message);
                            return;
                        }

                        if (msg.message ==  "註冊成功"){
                            alert(msg.message);
                            return;
                        }                       
                    }
                });
            });
        });
    </script>
</body>

</html> 