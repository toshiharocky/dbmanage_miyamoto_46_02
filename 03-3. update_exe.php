<?php

require_once('funcs.php');

// 変数の受け取り
session_start();
$name = $_SESSION['name'];
$id = $_SESSION['id'];
$lpw = $_SESSION['lpw'];
$lid = $_SESSION['lid'];
$kanri_flg = $_SESSION['kanri_flg'];
$life_flg = $_SESSION['life_flg'];

echo $name;
echo $id;
echo $lpw;
echo $lid;
echo $kanri_flg;
echo $life_flg;

// 情報更新処理（DB更新）
$pdo = db_conn();

// SQL
$stmt = $pdo->prepare(
    "UPDATE gs_user_table
    SET 
        name=:name,
        lid=:lid,
        lpw=:lpw,
        kanri_flg=:kanri_flg,
        life_flg=:life_flg
    WHERE
        id=:id
    ");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $_SESSION['name'], PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
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