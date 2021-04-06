<?php
// 変数の受け取り
session_start();
// $_SESSION['name'] = $_POST['name'];
// $_SSESSION['lid']= $_POST['lid'];
// $_SSESSION['lpw']= $_POST['lpw'];
// $_SSESSION['kanri_flg'] = $_POST['kanri_flg'];
// $_SSESSION['life'] = $_POST['life'];

// データベース接続
// データベース接続
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare(
    "INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg)
    VALUES(null, :name,:lid,:lpw, :kanri_flg, :life_flg)
    ");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $_SESSION['name'], PDO::PARAM_STR);
$stmt->bindValue(':lid', $_SESSION['lid'], PDO::PARAM_STR);
$stmt->bindValue(':lpw', $_SESSION['lpw'], PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $_SESSION['kanri_flg'], PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $_SESSION['life_flg'], PDO::PARAM_INT);

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    //*** function化する！******\
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit("SQLError:" . print_r($error, true));
} else {
    //*** function化する！*****************
    redirect('99. after processing.php');
}


?>