<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="server.php" method="post">
<!--        post get-->
        <p>
            用户名：
            <input type="text" name="username" id="uname">
            <span id="tip"></span>
        </p>
        <p>
            密码：
            <input type="password" name="password">
        </p>
        <p>
            <input type="submit" value="确定">
        </p>
        <p>
            <a href="reg.php?status=teacher">老师注册</a>
            <a href="reg.php?status=student">学生注册</a>
        </p>
    </form>
    <script src="jquery-3.4.0.min.js"></script>
    <script>
        $('#uname').blur(function () {
            $.get('checkName.php?username='+this.value,function (data) {
                $('#tip').text(data);
            })
        })
    </script>
</body>
</html>

<!--get 输入数据暴露给url 不安全 提交数据量不能太大-->
<!--post-->