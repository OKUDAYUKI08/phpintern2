<?php
echo $_GET["message"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="form.php" method="get">
        メッセージ: <input type="text" name="message" /><br/>
 <input type="submit" />
</form>
</body>
</html>