<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/user_check.php';

$pid = $_POST['pid'];
$userid = $_SESSION['UID'];

//pid 장바구니 중복체크
$sql = "SELECT COUNT(*) AS cnt FROM cart WHERE pid = '{$pid}' AND userid = '{$userid}'";
// $data = array('result' => $sql);
// echo json_encode($data);
$result = $mysqli -> query($sql);
$row = $result -> fetch_object(); // $row->cnt

if($result){    
    if($row->cnt > 0){
        $data = array('result' => '중복');
        echo json_encode($data);
    }else {
        $cartsql = "INSERT INTO cart (pid,userid) VALUES (
            {$pid},
            '{$userid}'
        )";
        
        $cartresult = $mysqli -> query($cartsql);
        if($cartresult){
            $data = array('result' => 'ok');
        } else{
            $data = array('result' => 'fail');
        }
        echo json_encode($data);
    }
}       




?>