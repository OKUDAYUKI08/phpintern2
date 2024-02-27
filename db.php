<?php
$mysqli=new mysqli('localhost','yuki','228136','test');

if($mysqli->connect_error){
    echo $mysqli->connect_error;
    exit();
}else{
    $mysqli->set_charset("utf8");
    echo 'データベース接続成功';
}
// $sql="insert into user values(1,'aiueo','1234')";
$sql = "SELECT * FROM user";
$result=$mysqli->query($sql);

while($row = $result->fetch_assoc() ){
    echo $row['id'] . " " .$row['name'] . "<br/>";
}

$mysqli->close();

?>