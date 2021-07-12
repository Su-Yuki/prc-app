<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    .container {
        /* margin-top: 80px; */
    }
    h3 {
        /* margin-bottom: 30px; */
    }
    th {
        height: 30px;
        width: 150px;
        /* text-align: center; */
    }
    td {
        height: 100px;
    }
    .today {
        background: orange;
    }
    th:nth-of-type(1), td:nth-of-type(1) {
        color: red;
    }
    th:nth-of-type(7), td:nth-of-type(7) {
        color: blue;
    }
</style>


<body>
    <!-- 共有部 -->
    <?php require_once('./../tpl/head_tpl.php'); ?>
    <p class="">「<?php echo $_SESSION["name"]; ?>」でログイン中</p>
    <div style="display: flex;width:80%;"> 
        <div class="justify-content:start;">
            <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
            <table class="table table-bordered">
                <tr>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                </tr>
                <?php
                    foreach ($weeks as $week) {
                        echo $week;
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>

</body>
</html>