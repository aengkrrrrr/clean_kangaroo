<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';


  // $pid = $_POST['pid'];
  $pid = $_POST['pid'];
  $pidstr = implode(',', $pid);

  $cartid = $_POST['cartid'];
  $cartidstr = implode(',', $cartid);
  $userid = $_POST['userid'];
  $total = $_POST['total_price'];
  
// 	pid	userid	total	regdate	


    $sql = "INSERT into payment
        (pid,userid,total) values
        ('{$pidstr}','{$userid}',{$total})
    ";
    $result = $mysqli -> query($sql);

    if($result === true){ // INSERT가 성공한 경우

    //구매한 상품 삭제
    $sql2 = "DELETE from cart where cartid IN({$cartidstr})";
    $result2 = $mysqli->query($sql2);

      echo "<script>
      alert('결제가 완료되었습니다.');
      location.href='/clean_kangaroo/user/index.php';
      
      </script>";
    } else { // INSERT가 실패한 경우
      echo "<script>
      alert('결제실패.');
      </script>";
    }

  $mysqli->close();

 
?>