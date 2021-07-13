<?php 
// ファイルの読み込み
require_once('dbconnect.php');

$stmt = $dbh->prepare('SELECT count(*) AS count_table FROM view');
$stmt->execute();
$tests = $stmt->fetchAll();
// var_dump($tests[0]["count_table"]);

define('MAX','3');
$total_num = $tests[0]["count_table"];
$max_page = ceil($total_num / MAX);
// var_dump($total_num);
 
if(!isset($_GET['page_id'])){
    $now_page = 1;
}else{
    $now_page = $_GET['page_id'];
}
 
$start_no = ($now_page - 1) * MAX;

$stmt = $dbh->prepare('SELECT *  FROM view LIMIT 5 OFFSET ?');
$stmt->execute([$start_no]);
$panding_arr = $stmt->fetchAll();
// var_dump($panding_arr);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo '全件数'. $total_num. '件'. '　'; 
    
        if($now_page > 1){ 
            echo '<a href=../part/paging.php?page_id='.($now_page - 1).'>前へ</a>'. '　';
        } else {
            echo '前へ'. '　';
        }
        
        for($i = 1; $i <= $max_page; $i++){
            if ($i == $now_page) {
                echo $now_page. '　'; 
            } else {
                echo '<a href=../part/paging.php?page_id='. $i. '>'. $i. '</a>'. '　';
            }
        }
        
        if($now_page < $max_page){ 
            echo '<a href=../part/paging.php?page_id='.($now_page + 1).'>次へ</a>'. '　';
        } else {
            echo '次へ';
        }    
    ?>
    <table border="1">
        <tr>
            <th>no</th>
            <th>name</th>
            <th>date</th>
            <th>created</th>
        </tr>
        <?php foreach($panding_arr as $key => $val): ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $val["name"]; ?></td>
            <td><?php echo $val["date"]; ?></td>
            <td><?php echo $val["created"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>