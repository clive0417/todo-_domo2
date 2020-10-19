<?php
//header 指定 content-Type  類型
header('Content-Type: application/json; charset=utf-8');
// 嘗試寫連結到server 
try {
    $pdo = new PDO("mysql:host=localhost;dbname=todolist_demo;port=3307;charset=utf8",'root','root');//3307 是MAMP mySQL 的port
} catch (PDOException $e) {
    echo "database connection failed.";//echo 呼叫  = javascript 的 console.log
    exit;//離開
}

$sql = 'UPDATE todos SET `order`=:order WHERE id=:id';
$statement = $pdo->prepare($sql);
foreach ($_POST['orderPair'] as $key => $orderPair) {
	$statement->bindValue(':order', $orderPair['order'], PDO::PARAM_INT);
	$statement->bindValue(':id', $orderPair['id'], PDO::PARAM_INT);
	$result = $statement->execute();
}

if (!$result) {
	echo 'error';
}

?>