<?php 
date_default_timezone_set('Asia/Tokyo');
require_once('./../common/dbconnect.php');
require_once('./../common/function.php');

// ページ判定
isset($_GET["p_kind"]) ?  $p_kind = $_GET["p_kind"] : $p_kind = "defo";
// switch ($p_kind) {
//     case "defo":
//     break;
//     case "check":
//         F_GET_login();
//     break;
//     case "login":
//     break;
//     default:
// //     header('Location:login.php');
// }

isset($_GET['ym']) ? $ym = $_GET['ym'] : $ym = date('Y-m');

$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

$today = date('Y-m-j');
$html_title = date('Y年n月', $timestamp);

$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

$day_count = date('t', $timestamp);

$youbi = date('w', $timestamp);

$weeks = [];
$week = '';

$week .= str_repeat('<td></td>', $youbi);

for ( $day = 1; $day <= $day_count; $day++, $youbi++) {
    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    if ($youbi % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
        }
        $weeks[] = '<tr>' . $week . '</tr>';
        $week = '';
	}
}
















require_once('./../tpl/process_tpl.php');