<?php
$title = '수강평';
$css1 =' <link rel="stylesheet" href="./css/u_review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

$idx = $_GET['idx'];
  $sql = "DELETE FROM coupons WHERE idx = {$idx}";
  $result = $mysqli -> query($sql);

  if($mysqli->query($sql) === true){
    echo "<script>
    alert('삭제성공');
    location.href='/clean_kangaroo/user/u_review_list.php';
    </script>";
  };
  
  $script1 = '<script src="./js/u_review.js"></script>';
?>