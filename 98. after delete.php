<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <!-- css -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/userdb.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<?php
session_start();
$kanri_flg = "";
$life_flg = "";

switch ($_SESSION['life_flg']){
    case 0:
        $life_flg = "管理者";
    case 1:
        $life_flg = "スーパー管理者";
}

switch ($_SESSION['kanri_flg']){
    case 0:
        $kanri_flg = "退社";
    case 1:
        $kanri_flg = "入社";
    }


?>

<body>
    <h1>以下の情報を削除しました</h1>
    <table id="table">
        <tr>
            <td class='table_left'>氏名</td>
            <td class='table_left'><?=$_SESSION['name']?></td>
        </tr>
        <tr>
            <td class='table_left'>ログインID</td>
            <td class='table_left'><?=$_SESSION['lid']?></td>
        </tr>
        <tr>
            <td class='table_left'>ログインパスワード</td>
            <td class='table_left'>セキュリティ上非表示</td>
        </tr>
        <tr>
            <td class='table_left'>管理権限</td>
            <td class='table_left'><?=$kanri_flg?></td>
        </tr>
        <tr>
            <td class='table_left'>ステータス</td>
            <td class='table_left'><?=$life_flg?></td>
        </tr>
    </table>
   
<div class="btn-wrapper">
    <button class="btn topBtn" onclick="location.href='index.php'">トップページへ戻る</button>
</div>
 
</body>
</html>