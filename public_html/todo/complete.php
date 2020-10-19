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

//load todo
$sql = 'SELECT is_complete FROM todos WHERE id=:id'; //抓comple
$statement = $pdo->prepare($sql);

$statement->bindValue(':id',$_POST['id'],PDO::PARAM_INT);//PARAM_STR 說明傳入為string        
$result = $statement->execute();
//$todo = $statement->fetch(PDO::FETCH_ASSOC); [此行無法work] 多一個空白
$todo = $statement->fetch(PDO::FETCH_ASSOC);


//toggle complete status

//save
$sql = 'UPDATE todos SET is_complete=:is_complete WHERE id=:id'; 
//抓comple
$statement = $pdo->prepare($sql);
$statement->bindValue(':id',$_POST['id'],PDO::PARAM_INT);//PARAM_STR 說明傳入為string 
$statement->bindValue(':is_complete',!$todo['is_complete'],PDO::PARAM_INT);       
$result = $statement->execute();


if ($result) {
    echo json_encode(['id' => $_POST['id']]);
}else {
    echo 'error';
}

//  $_POST['todo'];// 先假想，傳來的資料叫做 todo.如何接球

?>