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
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
<?php
require_once('funcs.php');

session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['id'] = $_POST['id'];
$_SESSION['lpw'] = $_POST['lpw'];
$_SESSION['lid'] = $_POST['lid'];
$_SESSION['kanri_flg'] = $_POST['kanri_flg'];
$_SESSION['life_flg'] = $_POST['life_flg'];

if($_SESSION['kanri_flg']==0){
    $kanri_flg = "管理者";
}else {
    $kanri_flg = "スーパー管理者";
}

if($_SESSION['life_flg']==0){
    $life_flg = "退社";
} else {
    $life_flg = "入社";
}

?>

<h1>ユーザー情報更新</h1>
<form action="03-3. update_exe.php" method="post">
    <table>
        <tr>
            <td class='table_left'>氏名</td>
            <td name='name'><?=h($_SESSION['name'])?></td>
        </tr>
        <tr>
            <td class='table_left'>ログインID</td>
            <td name='lid'><?=h($_SESSION['lid'])?></td>
        </tr>
        <tr>
            <td class='table_left'>ログインパスワード</td>
            <td name='lpw'><?=h($_SESSION['lpw'])?></td>
        </tr>
        <tr>
            <td class='table_left'>管理権限</td>
            <td name='kanri_flg'><?=h($kanri_flg)?></td>
        </tr>
        <tr>
            <td class='table_left'>ステータス</td>
            <td name='life_flg'><?=h($life_flg)?></td>
        </tr>
    </table>
    <input type="submit" value="更新を確定" id="submit">
</form>

<div class="btn-wrapper">
    <button class="btn backBtn" onclick="location.href='javascript:history.back()'">前のページへ戻る</button><br>
    <button class="btn topBtn" onclick="location.href='index.php'">トップページへ戻る</button>
</div>
    
</body>
</html>