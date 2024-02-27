<?php
session_start();
if(isset($_POST["logout"])){
    if(isset($_SESSION["user_name"])){
        $_SESSION["user_name"]=null;
        $_SESSION["user_id"]=null;
        session_destroy();
        echo("ログアウトしました");
        echo "<a href='login.php'>ログインページへ</a>";
    }else{
        echo("ログインしていません");
        $html=<<< TEXT
        <a href="login.php">ログインページへ</a>
        TEXT;
        echo($html);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
</head>
<body>
    <h2>ログアウト</h2>
    <form action="logout.php" method="post">
        <button type="submit" name="logout" value="send">ログアウト</button>
    </form>

</body>
</html>