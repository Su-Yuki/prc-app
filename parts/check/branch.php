<?php 
// var_dump($_POST["text"]);

if(!$_POST["text"]){
    echo "ボックスが空です";
    echo '<a href="./index.php"><button>戻る</button></a>';
    // header("location: index.php");
}

// $pattern = "";
$pattern = "/(\d{3}-\d{4})/";

if(preg_match($pattern, $_POST["text"])){
    echo "マッチ";
} else {
    echo "マッチしません";
    echo '<a href="./index.php"><button>戻る</button></a>';
}

?>