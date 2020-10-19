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

//撰寫mySQLDb輸入事項
$sql = 'DELETE FROM todos WHERE id=:id'; // Sql 輸入數值
$statement = $pdo->prepare($sql);
$statement->bindValue(':id',$_POST['id'],PDO::PARAM_INT);//PARAM_STR 說明傳入為string        
$result = $statement->execute();

if ($result) {
    echo json_encode(['id' => $_POST['id']]);
}else {
    echo 'error';
}

//  $_POST['todo'];// 先假想，傳來的資料叫做 todo.如何接球

?>