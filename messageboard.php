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
        <h1>留言</h1>
        <a href="/test1/logout.php" data-icon="gear" class="ui-btn-right">登出</a>
        <a href="/test1/home.php" data-icon="gear" class="ui-btn-left">上一頁</a>
    </div>
    
    <div class="ui-content" role="main">
    <label for="">標題:</label>
    <input type="text" id="title" value="">

    <label for="">內容:</label>
    <textarea id="article"></textarea>
    <a href="" class="ui-btn" id="messagewatch">留言</a>
    </div>
   

<script>
$(function() {
            $("#messagewatch").click(function() {
                var title = $("#title").val();
                var article = $("#article").val();
                var data = {
                    'title': title,
                    'article': article
                };

                if(data.title == ""){
                    alert("請輸入標題，標題為空白!");
                    return;
                }

                if(data.article == ""){
                    alert("請輸入文章，文章欄為空白!");
                    return;
                }
               
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/test1/messagewatch.php",
                    data: data,
                    success: function(msg) {
                       
                    }
                });
            });
        });
     
     </script>
 </body>
 
 </html> 