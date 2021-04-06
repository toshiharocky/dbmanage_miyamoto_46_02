<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
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


<form action="02-2. insert_confirm.php" method="POST">
    <div class="input-wrapper">
    <div class="input-wrapper">
        氏名：
        <input type="text" name="name" id="name"></input>
    </div>
    <div class="input-wrapper">
        ログインID：
        <input type="text" name="lid" id="lid"></input>
    </div>
    <div class="input-wrapper">
        ログインパスワード：
        <input type="text" name="lpw" id="lpw"></input>
    </div>
    <div class="input-wrapper">
        ログインパスワード（確認用）：
        <input type="text" id="lpw_dc"></input>
    </div>
    <div class="input-wrapper">
        権限：
        <select name="kanri_flg" id="kanri_flg">
            <option value="0">管理者</option>
            <option value="1">スーパー管理者</option>
        </select>
    </div>
    <div class="input-wrapper">
        ステータス：
        <select name="life_flg" id="life_flg">
            <option value="0">退社</option>
            <option value="1">入社</option>
        </select>
    </div>
    <input type="submit" value="送信" id="submit">
</form>


<!-- // データベース接続
// require_once('funcs.php');
// $pdo = db_conn();

//２．データ登録SQL作成
// $stmt = $pdo->prepare(
//     "SELECT * FROM gs_user_table
//     WHERE id = 
//     ");
// $status = $stmt->execute();

// idの配列作成
// $view = [];
// if ($status == false) {
//     sql_error($stmt);
// } else {
//     while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         //GETデータ送信リンク作成
//         // <a>で囲う。
//         array_push ($view, $result["id"]);
//         return $view;
//     }
// } -->



<script>
// 送信ボタンが押された際に発火
// console.log(<?=$view?>.includes('$(#"lid').val());

$("#submit").on("click",function(){
    console.log($("#lpw").val() != $("#lpw_dc").val());
    // ログインIDが重複していないか
    // if(<?=$view?>.includes('$(#"lid').val()){
    //     alert('同じログインIDが使われています');
    //     return false;
    // } else 
    if ($("#lpw").val() != $("#lpw_dc").val()){
    // ログインパスワードが合っているかどうか⇨alert「パスワードが一致していません」
        alert('パスワードが一致していません');
        return false;
    }
    
})



</script>

</body>
</html>