<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録確認</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<?php
// <!-- funcs.phpの読み込み -->
    require_once("funcs.php");


// 変数の受け取り
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['lid']= $_POST['lid'];
$_SESSION['lpw']= $_POST['lpw'];
$_SESSION['kanri_flg'] = $_POST['kanri_flg'];
$_SESSION['life_flg'] = $_POST['life_flg'];

$kanri_flg = "";
$life_flg = "";

switch ($_SESSION['kanri_flg']){
    case 0:
        $kanri_flg = "管理者";
    case 1:
        $kanri_flg = "スーパー管理者";
}

switch ($_SESSION['life_flg']){
    case 0:
        $life_flg = "退社";
    case 1:
        $life_flg = "入社";
}


?>

<h1>登録確認画面</h1>
    <table id="table">
        <tr>
            <td class='table_left'>氏名</td>
            <td class='table_left'><?=h($_SESSION['name'])?></td>
        </tr>
        <tr>
            <td class='table_left'>ログインID</td>
            <td class='table_left'><?=h($_SESSION['lid'])?></td>
        </tr>
        <tr>
            <td class='table_left'>ログインパスワード</td>
            <td class='table_left'>セキュリティ上非表示</td>
        </tr>
        <tr>
            <td class='table_left'>管理権限</td>
            <td class='table_left'><?=h($kanri_flg)?></td>
        </tr>
        <tr>
            <td class='table_left'>ステータス</td>
            <td class='table_left'><?=h($life_flg)?></td>
        </tr>
        </table>
    <div class="btn-wrapper">
        <button onclick="location.href='02-3. insert_exe.php'">送信</button>
    </div>

    
</body>
</html>
