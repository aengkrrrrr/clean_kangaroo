<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$idx = $_POST['idx'];
$sql = "DELETE FROM qna_reply WHERE idx = {$idx}";
$result = $mysqli -> query($sql);

if($mysqli->query($sql) === true){
    echo "<script>
    alert('삭제성공');
    location.href='/clean_kangaroo/admin/q&a/q&a_list.php';
    </script>";
  };
// if($result){
//     $data = array('result'=>'ok');
// }else{
//     $data = array('result'=>'no');
// }
// echo json_encode($data);

?>