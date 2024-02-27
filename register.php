<section>
    <form action="" method="post">
        <!-- 番号:<br>
        <input type="number" name="num" value=""><br>
        <br> -->
        名前:<br>
        <input type="text" name="name" value=""><br>
        <br>
        パスワード:<br>
        <input type="text" name="password" value=""><br>
        <input type="submit" value="登録">
    </form>
</section>
<?php
// 接続
$mysqli = new mysqli('localhost', 'yuki', '228136', 'test');

//接続状況の確認
if($mysqli->connect_error){
        echo $mysqli->connect_error;
        exit();
}else{
        $mysqli->set_charset('utf8');
}

// $num = htmlspecialchars($_POST["num"],ENT_QUOTES,null);
$name = htmlspecialchars($_POST["name"],ENT_QUOTES,null);
$pass = htmlspecialchars($_POST["password"],ENT_QUOTES,null);

// $sql = "INSERT INTO user VALUES (". strval($num) .",'".$name."','".$pass."')";
// $mysqli->query($sql);

$stmt=$mysqli->prepare("insert into user(name,password) values(?,?)");
$stmt->bind_param('ss',$name,$pass);
$res=$stmt->execute();
$stmt->close();

// 切断
$mysqli->close();
?>