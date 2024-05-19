<?php
// include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';


//   // $pid = $_POST['pid'];
//   $pid = $_POST['pid'];
//   $pidstr = implode(',', $pid);

//   $cartid = $_POST['cartid'];
//   $cartidstr = implode(',', $cartid);
//   $userid = $_POST['userid'];
//   $total = $_POST['total_price'];
  
// // 	pid	userid	total	regdate	


//     $sql = "INSERT into payment
//         (pid,userid,total) values
//         ('{$pidstr}','{$userid}',{$total})
//     ";
//     $result = $mysqli -> query($sql);

//     if($result === true){ // INSERT가 성공한 경우

//     //구매한 상품 삭제
//     $sql2 = "DELETE from cart where cartid IN({$cartidstr})";
//     $result2 = $mysqli->query($sql2);

//       echo "<script>
//       alert('결제가 완료되었습니다.');
//       location.href='/clean_kangaroo/user/index.php';
      
//       </script>";
//     } else { // INSERT가 실패한 경우
//       echo "<script>
//       alert('결제실패.');
//       </script>";
//     }

//   $mysqli->close();



include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$mysqli->autocommit(FALSE); // 자동 커밋을 비활성화

try {
    $pid = $_POST['pid'];
    $pidstr = implode(',', $pid);

    $cartid = $_POST['cartid'];
    $cartidstr = implode(',', $cartid);
    $userid = $_POST['userid'];
    $total = $_POST['total_price'];

    // Payment 테이블에 삽입
    $sql = "INSERT INTO payment (pid, userid, total) VALUES ('{$pidstr}', '{$userid}', {$total})";
    if (!$mysqli->query($sql)) {
        throw new Exception("Payment 삽입 실패: " . $mysqli->error);
    }

    // Cart 테이블에서 해당 항목 삭제
    $sql2 = "DELETE FROM cart WHERE cartid IN({$cartidstr})";
    if (!$mysqli->query($sql2)) {
        throw new Exception("Cart 삭제 실패: " . $mysqli->error);
    }

    // 모든 작업이 성공하면 커밋
    $mysqli->commit();

    echo "<script>
        alert('결제가 완료되었습니다.');
        location.href='/clean_kangaroo/user/index.php';
    </script>";

} catch (Exception $e) {
    // 에러 발생 시 롤백
    $mysqli->rollback();
    echo "<script>
        alert('결제 실패: " . $e->getMessage() . "');
    </script>";
}

$mysqli->close();






 
?>