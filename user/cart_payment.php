<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$mysqli->autocommit(FALSE); // 자동 커밋을 비활성화

try {
    $pid = $_POST['pid'];
    $pidstr = implode(',', $pid);

    $cartid = $_POST['cartid'];
    $cartidstr = implode(',', $cartid);
    $userid = $_POST['userid'];
    $total = $_POST['total_price'];
    $date = date("Y-m-d");

    // Payment 테이블에 삽입
    $sql = "INSERT INTO payment (pid, userid, total, regdate) VALUES ('{$pidstr}', '{$userid}', {$total},'{$date}')";
    echo $sql;
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