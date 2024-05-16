<?php
function issue_coupon($mysqli, $uid, $num, $reason){


    $due_date = date("Y-m-d 23:59:59", strtotime("+30 days"));

    $ucSql = "INSERT INTO user_coupons (couponid,userid,status,use_max_date,regdate,reason) VALUES (
        '{$num}',
        '{$uid}',
        1,
        '{$due_date}',
        now(),
        '{$reason}'
    )";
    $ucResult = $mysqli -> query($ucSql);

    echo "<script>
        alert('회원가입 완료!, $reason 쿠폰이 발행되었습니다.');
        location.href = 'index.php';
    </script>";


}
?>