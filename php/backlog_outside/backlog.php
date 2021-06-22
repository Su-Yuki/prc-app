<?php
$sname = "";
$akey = "";
$projectId = "";

$params = array(
    'apiKey' => $akey,
    'projectId[]' => $projectId,
    'statusId' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4),
    'parentChild' => 0,
    'sort' => 'created',
    'order' => 'asc',
    'count' => 100,       
    'offset' => $offset,
);
$url = 'https://' . $sname . '.backlog.com/api/v2/issues?'.http_build_query($params, '','&');

$headers = array('Content-Type:application/x-www-form-urlencoded');
$context = array(
    'http' => array(
        'method' => 'GET',
        'header' => $headers,
        'ignore_errors' => true,
    )
);
$response = file_get_contents($url, false, stream_context_create($context));

$json = mb_convert_encoding($response, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$json = json_decode($json, true);
var_dump($json);
// var_dump(count($json));


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
    <table border="1">
        <tr>
            <th>種別</th>
            <th>キー</th>
            <th>件名</th>
            <th>担当者</th>
            <th>状態</th>
            <th>優先度</th>
            <th>登録日</th>
            <th>期限日</th>
            <th>更新日</th>
            <th>登録者</th>
        </tr>
        <?php foreach ($json as $value) : ?>
        <tr>
            <td><?php echo $value["issueType"]['name'];?></td>
            <td><?php echo $value["issueKey"];?></td>
            <td><?php echo $value["summary"];?></td>
            <td><?php echo $value["assignee"]["name"];?></td>
            <td><?php echo $value["status"]["name"];?></td>
            <td><?php echo $value["priorityId"];?></td>
            <td><?php echo $value["created"];?></td>
            <td><?php echo $value["dueDate"];?></td>
            <td><?php echo $value["updated"];?></td>
            <td><?php echo $value["updatedUser"]["name"];?></td> 
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>