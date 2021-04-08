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
        <input type='hidden' name='id' value='$result[id]'>
        ";


        if($result[kanri_flg]==0){
            $kanri_flg .= 
            "<tr>
                <td class='table_left'>管理権限</td>
                <td>
                    <select name='kanri_flg' id='kanri_flg'>
                        <option value='0' selected>管理者</option>
                        <option value='1'>スーパー管理者</option>
                    </select>
                </td>
            </tr>
            ";
        } else {
            $kanri_flg .= 
            "<tr>
                <td class='table_left'>管理権限</td>
                <td>
                    <select name='kanri_flg' id='kanri_flg'>
                        <option value='0'>管理者</option>
                        <option value='1' selected>スーパー管理者</option>
                    </select>
                </td>
            </tr>
            ";
        }

        if($result[life_flg]==0){
            $life_flg = "
                <tr>
                    <td class='table_left'>ステータス</td>
                    <td>
                        <select name='life_flg' id='life_flg'>
                            <option value='0' selected>退社</option>
                            <option value='1'>入社</option>
                        </select>
                    </td>
                </tr>";
        } else{
            $life_flg = "
                <tr>
                    <td class='table_left'>ステータス</td>
                    <td>
                        <select name='life_flg' id='life_flg'>
                            <option value='0'>退社</option>
                            <option value='1' selected>入社</option>
                        </select>
                    </td>
                </tr>";
        }
    }

}
?>

<h1>ユーザー情報更新</h1>
<form action="03-2. update_confirm.php" method="POST">
    <table>
        <?=$table?>
        <?=$kanri_flg?>
        <?=$life_flg?>
    </table>
    <input type="submit" value="更新内容確認" id="submit">
</form>

<div class="btn-wrapper">
    <button class="btn topBtn" onclick="location.href='index.php'">トップページへ戻る</button>
</div>
    
</body>
</html>