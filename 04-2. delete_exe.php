<?php
require_once('funcs.php');
// 変数の受け取り
session_start();

//１．PHP
//select.phpのPHP部分コードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正、GETの内容をSELECTする！
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare(
    "DELETE FROM gs_user_table
    WHERE id=:id
    ");
$status = $stmt->execute();

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    //*** function化する！******\
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit("SQLError:" . print_r($error, true));
} else {
    //*** function化する！*****************
    redirect('98. after delete.php');
}



?>