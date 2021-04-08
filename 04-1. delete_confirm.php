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
<body>
<?php
require_once('funcs.php');
// GETで変数取得
session_start();
$_SESSION['id'] = $_GET['id'];
$id = $_SESSION['id'];

//1.  DB接続します
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=$id");
$status = $stmt->execute();

//３．データ表示
$product = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . print_r($error, true));
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $table .= 
        "
        <tr>
            <td>$result[name]</td>
            <td>$result[lid]</td>
            <td>$result[lpw]</td>
            <td>$result[kanri_flg]</td>
            <td>$result[life_flg]</td>
            <td><a href='03-1. update_input.php?id=$result[id]'>更新</td>
            <td><a href='04-1. delete_confirm.php?id=$result[id]'>削除</td>
        </tr>
        ";
    }

}
?>

<h1>削除する情報の確認</h1>
    <table>
        <tr>
            <th class="table-left">氏名</th>
            <th class="table-left">ログインID</th>
            <th class="table-left">ログインパスワード</th>
            <th class="table-left">管理権限</th>
            <th class="table-left">ステータス</th>
            <th class="table-left">更新</th>
            <th class="table-left">削除</th>
        </tr>
            <?=$table?>
    </table>

<div class="btn-wrapper">
    <button class="btn" onclick="location.href='04-2. delete_exe.php'">削除</button>
    <button class="btn topBtn" onclick="location.href='index.php'">トップページへ戻る</button>
</div>

</body>
</html>
