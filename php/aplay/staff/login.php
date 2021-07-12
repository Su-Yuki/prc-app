<?php 
require_once('./../common/dbconnect.php');
require_once('./../common/function.php');

// ページ判定
isset($_GET["p_kind"]) ?  $p_kind = $_GET["p_kind"] : $p_kind = "defo";
switch ($p_kind) {
    case "defo":
    break;
    case "check":
        F_GET_login();
    break;
    case "login":
    break;
    default:
//     header('Location:login.php');
}
function F_GET_login(){
    global $dbh;

    $name = h($_POST['name']);
    $pass = h($_POST['pass']);

    $stmt = $dbh->prepare('SELECT name, pass FROM users WHERE name = ? AND pass = ?');
    $stmt->execute([$name, $pass]);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if($rec == false){
        print '色々間違っています。<br />';
        print '<a href="login.php">戻る</a>';
    } else {
        $_SESSION['login'] = 1;
        $_SESSION['name'] = $name;
        header('Location:login.php?p_kind=login');
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- defo -->
    <?php if($p_kind == "defo"): ?>
    <h3>スタッフログイン</h3>
    <form action="login.php?p_kind=check" method="POST">
        <p>スタッフ</p>
        <input type="text" name="name">
        <p>パスワード</p>
        <input type="password" name="pass">
        <br>
        <br>
        <input type="submit" value="ログイン">
    </form>
    <?php endif; ?>

    <!-- check -->
    <?php if($p_kind == "check"): ?>

    <?php endif; ?>

    <!-- login -->
    <?php if($p_kind == "login"): ?>

    <?php endif; ?>
</body>
</html>