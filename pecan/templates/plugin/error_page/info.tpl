<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="refresh" content="5" >
    <meta http-equiv="Content-Security-Policy" content=" style-src 'unsafe-inline'; img-src data:; connect-src: 'self'">
    <title>404 - Not Found · ArkPHP</title>
    <style type="text/css" media="screen">
        body {
            background-color: #f1f1f1;
            margin: 0;
            font-family: '微软雅黑','Helvetica Neue',sans-serif,SimHei;
        }

        .container { margin: 50px auto 40px auto; width: 600px; text-align: center; }

        a { color: #4183c4; text-decoration: none; }
        a:hover { text-decoration: underline; }

        h1 { width: 800px; position:relative; left: -100px; letter-spacing: -1px; line-height: 60px; font-size: 60px; font-weight: 100; margin: 0px 0 50px 0; text-shadow: 0 1px 0 #fff; }
        p { color: rgba(0, 0, 0, 0.5); margin: 20px 0; line-height: 1.6; }

        ul { list-style: none; margin: 25px 0; padding: 0; }
        li { display: table-cell; font-weight: bold; width: 1%; }

        .logo { display: inline-block; margin-top: 35px; }

        #suggestions {
            margin-top: 35px;
            color: #ccc;
        }
        #suggestions a {
            color: #666666;
            font-weight: 200;
            font-size: 14px;
            margin: 0 10px;
        }

    </style>
</head>
<body>

<div class="container">

    <h1>{$error_info}</h1>
    <p><strong>{$info}</strong></p>
        <div id="suggestions">
        <a href="javascript:history.back(-1);">返回上一页</a>  &mdash;
        <a href="<!--{ACTION_URL}-->">返回首页</a> 
    </div>
 		　
    <div id="suggestions">
        <a href="http://arkphp.com">官方网址</a> &mdash;
        <a href="https://arkphp.com">帮助中心</a>
    </div>

	</div>
</div>

</body>

</html>
