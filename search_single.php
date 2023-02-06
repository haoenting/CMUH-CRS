<?php
require_once('conn.php');

$act = $_POST['choose'];
$value = $_POST['value'];
$sql;
if($act == 'Chart'){ // 查找病例
    $sql = "SELECT * from `basic_information` 
    WHERE (Chart = '$value')";
}
elseif($act == 'ID'){ // 查找身分證
    $sql = "SELECT * from `basic_information` 
    WHERE (ID = '$value')";
}
else{ // 查找姓名
    $sql = "SELECT * from `basic_information` 
    WHERE (Name = '$value')";
}
$result = mysqli_query($link,$sql);

if()
?>