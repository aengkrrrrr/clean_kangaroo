<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
$pid = $_GET['pid'];
$sql = "DELETE FROM products WHERE pid = {$pid}";
$result = $mysqli -> query($sql);


if($mysqli->query($sql) === true){
    echo "<script>
    alert('삭제성공');
    location.href='/clean_kangaroo/admin/lecture/lecture_list.php';
    </script>";
  };
// if($result){
//     $data = array('result'=>'ok');
// }else{
//     $data = array('result'=>'no');
// }
// echo json_encode($data);

?>

