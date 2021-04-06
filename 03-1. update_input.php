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
$id = $_GET['id'];


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
            <td class='table_left'>ログインID（変更不可）</td>
            <td>$result[lid]</td>
            <td><input type='hidden' name='lid' value='$result[lid]'></td>
        </tr>
        <tr>
            <td class='table_left'>氏名</td>
            <td><input type='text' name='name' value='$result[name]'></td>
        </tr>
        <tr>
            <td class='table_left'>ログインパスワード</td>
            <td><input type='text' name='lpw' value='$result[lpw]'></td>
        </tr>
        <tr>
            <td class='table_left'>管理権限</td>
            <td><input type='text' name='kanri_flg' value='$result[kanri_flg]'></td>
        </tr>
        <tr>
            <td class='table_left'>ステータス</td>
            <td><input type='text' name='life_flg' value='$result[life_flg]'></td>
        </tr>
        <input type='hidden' name='lpw' value='$result[lpw]'>
        ";
    }

}
?>

<h1>ユーザー情報更新</h1>
<form action="03-2. update_confirm.php" method="POST">
    <table>
            <?=$table?>
    </table>
    <input type="submit" value="更新内容確認" id="submit">
</form>

<div class="btn-wrapper">
    <button class="btn topBtn" onclick="location.href='00. toppage.php'">トップページへ戻る</button>
</div>
    
</body>
</html>