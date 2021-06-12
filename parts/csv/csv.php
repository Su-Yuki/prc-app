<?php
$today = date("YmdHis");

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$today.".csv");
header("Content-Transfer-Encoding: binary");

//DB接続
$user = '';
$dbName = "";
$host = "";
$password = '';
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


try {
  $dsn = "mysql:host=$host;dbname=$dbName;charser=utf8";
  $pdo = new PDO($dsn, $user, $password, $options);
       
  $sql = "SELECT * from sample";
  $stm = $pdo->prepare($sql);
  $stm->execute();
  $result = $stm->fetchAll(PDO::FETCH_ASSOC);
     
  $stm = null;
 
} catch (PDOException $e) { 
  print $e->getMessage() . "<br/gt;";
  die();
}

$row = '"ID","タイトル","価格","日付"' . "\n";
foreach ($result as $val ){
   $row .= '"' . $val['id'] . '","' . $val['title'] . '","' . $val['price'] . '","' . $val['date'] . '"' . "\n";
}

print $row;

return;
?>