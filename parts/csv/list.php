<?php 

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

?>
<table>
  <thead>
      <tr>
          <th>ID</th>
          <th>タイトル</th>
          <th>価格</th>
          <th>日付</th>
      </tr>
  </thead>
  <tbody>
      <?php
          foreach ($result as $val){
              print "<tr>";
              print "<td>".$val['id']."</td>";
              print "<td>".$val['title']."</td>";
              print "<td>".$val['price']."</td>";
              print "<td>".$val['date']."</td>";
              print "</tr>";
          }
      ?>
  </tbody>    
</table>

<a href="csv.php">csvダウンロード<a>