<?php
  /**
   * 課題１：mysqliを用いてMySQLに接続し，POSTで受け取ったデータをtrx_usersにINSERTする処理を書いてください
   * パスワードはハッシュ化する必要があるので，以下の$password_hashを用いてください
   */
$mysqli=new mysqli('localhost','yuki','228136','test');
if($mysqli->connect_error){
	echo $mysqli->connect_error;
	exit();
}else{
	$mysqli->set_charset('utf8');
}
if(!isset($_POST[""])){
    $password=htmlspecialchars($_POST["passoword"],ENT_QUOTES,null);
    $username=htmlspecialchars($_POST["username"],ENT_QUOTES,null);
    $password_hash = hash("sha256", $password);
    $stmt=$mysqli->prepare("insert into trx_users (user_name,password) values(?,?)");
    $stmt->bind_param("ss",$username,$password_hash);
    $res=$stmt->execute();
    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
  <head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>ユーザ追加</h2>
		<form action="newUser.php" method="post">
		  ユーザ: <input type="text" name="username" /><br/>
		  パスワード: <input type="password" name="password" /><br/>
		  <input type="submit" />
		</form>
	</body>
</html>