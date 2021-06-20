<?php 
// var_dump($_POST["text"]);

if(!$_POST["text"]){
    echo "ボックスが空です";
    echo '<a href="./index.php"><button>戻る</button></a>';
    // header("location: index.php");
}

// $pattern = "/()/";
// これにマッチ
// $pattern = "/([東京])/";
// $pattern = "/([^東京])/";
// これにマッチ
// $pattern = "/([1-5])/";
// $pattern = "/([^1-5])/";
// なんでもおk
// $pattern = "/(東.都)/";
// 数字
// $pattern = "/(\d{3}-\d{4})/";
// 文字マッチ
// $pattern = "/(\w)/";
// $pattern = "/([ぁ-ん])/";
// $pattern = "/([ァ-ン])/";
// \メタ
// . * + ? \ | ^ $ {} [] ()
// $pattern = "/(\\)/";
// 記号
// s（空白） d（数字） t（タブ） w（英文字） n（改行）
// $pattern = "/(りんご|オレンジ)/";
// 先頭、末尾
// ^..県
// ..県$
// 繰り返し
// $pattern = "/(やったー*)/";
$pattern = "/(やったー+)/";


if(preg_match($pattern, $_POST["text"])){
    echo "マッチ";
    echo '<a href="./index.php"><button>戻る</button></a>';
} else {
    echo "マッチしません";
    echo '<a href="./index.php"><button>戻る</button></a>';
}

?>