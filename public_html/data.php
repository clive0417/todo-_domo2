<?php

include('../db.php');
// 嘗試寫連結到server 
try {
    $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port=$db[port];charset=$db[charset]",$db['username'],$db['password']);//3307 是MAMP mySQL 的port
} catch (PDOException $e) {
    echo "database connection failed.";//echo 呼叫  = javascript 的 console.log
    exit;//離開
}
$sql = 'SELECT * FROM `todos` ORDER BY `order` ASC';// 用php 的變數 SQL 選資料
$statement = $pdo->prepare($sql);// 讀取不用Binvalue
$statement -> execute();
$todos = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<script>
   var todos = <?= json_encode($todos,JSON_NUMERIC_CHECK)?>
</script>