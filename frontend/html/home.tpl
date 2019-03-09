<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Кабінет</title>
    <link href="../../frontend/css/home.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../frontend/js/home.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="login-form">
    <div id="formContent">
        <form method="post" action="home.php">
            <input type="text" id="login" class="second" name="login" placeholder="Логін">
            <input type="password" id="password" class="third" name="password" placeholder="Пароль">
            <input type="submit" name="login_post" class="fourth" value="Увійти">
        </form>
    </div>
    <div id="formContent" class="error-msg">{$error_msg}</div>
</div>
</body>
</html>