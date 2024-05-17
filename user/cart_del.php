<?php
 include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

 $cartid = $_POST['cartid'];

 $cartids_str = implode(',', $cartid);

 // SQL 쿼리를 작성합니다.
 $sql = "DELETE FROM cart WHERE cartid IN ({$cartids_str})";
 $result = $mysqli -> query($sql);
 
 if($result){
    $data = array('result'=>'ok');
 }else{
    $data = array('result'=>'no');
 }
 echo json_encode($data);
?>