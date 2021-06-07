<?php
$id = $_POST['id'];

//DBに接続
$host = "localhost";
$dbname = "test";
$charset = "utf8mb4";
$user = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
try {
    $dbh = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e) {
    var_dump($e->getMessage());
    exit;
}

$sql = "SELECT id, name, mail FROM member WHERE id = ?";
$stmt = ($dbh->prepare($sql));
$stmt->execute(array($id));

$memberList = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 $memberList[]=array(
  'id' =>$row['id'],
  'name'=>$row['name'],
  'mail'=>$row['mail']
 );
}

//json
header('Content-type: application/json');
echo json_encode($memberList,JSON_UNESCAPED_UNICODE);