<?php
// session_start();
// $toke_byte=random_bytes(16);
// $csrf_token=bin2hex($toke_byte);
// $_SESSION['csrf_token']=$csrf_token;

$mysqli = new mysqli('localhost', 'yuki', '228136', 'test');
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    $mysqli->set_charset('utf8');
}
//POSTで取得した情報を取得
$username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if($username==""||$password==""){
    echo "入力してください";
}else if (isset($_POST["username"]) && isset($_POST["password"])) {
    $password_hash = hash("sha256", $password);


    // 入力したpasswordと一致するusernameをデータべースからとってくる
    $usersql = "select user_name from trx_users where `user_name` = '" . $username . "'";
    $userresult = $mysqli->query($usersql);
    $userrow = $userresult->fetch_assoc();

    // 入力したpasswordと一致するidをデータべースからとってくる
    $idsql = "select id from trx_users where `password` = '" . $password_hash . "'";
    $idresult = $mysqli->query($idsql);
    $idrow = $idresult->fetch_assoc();

    // 入力したpasswordと一致するidをデータべースからとってくる
    $passsql = "select password from trx_users where `password` = '" . $password_hash . "'";
    $passresult = $mysqli->query($idsql);
    $passrow = $passresult->fetch_assoc();

    if (isset($userrow) == true && isset($passrow) == false) {
        echo "パスワードが違います";
    } else if (isset($userrow) == false && isset($id_row) == false) {
        echo "登録されてません";
    } else if (strcmp(implode($userrow), $username) == 0) {
        session_start();
        if (isset($_SESSION["user_id"])) {
            echo "すでにログインしています";
            echo "<a href='table.php'>投稿画面へ</a>";
            exit();
        } else {
            $_SESSION["user_id"] = $idrow;
            $_SESSION["user_name"] = $userrow;
            echo "ログインしました";
            header("location:http://192.168.64.10/table.php");
        }
    }

} 


/**
 * 課題２：データベースにPOSTで取得したusername,password(ハッシュ化)と一致するものがあればセッションを開始し
 * $_SESSION['user_id']にユーザIDを,$_SESSION['user_name']にユーザ名を格納する処理を書いてください
 */


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <h2>ログイン</h2>
    <form action="login.php" method="post">
        ユーザ: <input type="text" name="username" /><br />
        パスワード: <input type="password" name="password" /><br />
        <!-- <input type="hidden" name="csrf_token" value="<?=$csrf_token; ?>"/> -->
        <input type="submit" />
    </form>
</body>

</html>
