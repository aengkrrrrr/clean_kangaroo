<?php
$userid = $_SESSION['UID'];

$sql = "SELECT * FROM members where userid='{$userid}'";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();
?>

<div class="mypage_common">
    <h2 class="h4"><?=$_SESSION['UNAME']?>님 반갑습니다.</h2>
    <span class="body3"><?=$rs->email?></span>
    <nav class="mypage_menu">
      <ul class="menu df fdc">
        <li><a href="/clean_kangaroo/user/mypage_lecture.php" class="line_btn">내 강의실</a></li>
        <li><a href="/clean_kangaroo/user/mypage_coupon.php" class="line_btn">내 쿠폰함</a></li>
        <li><a href="/clean_kangaroo/user/mypage_review.php" class="line_btn">수강 후기</a></li>
        <li><a href="/clean_kangaroo/user/mypage_qna.php" class="line_btn">1:1 질문</a></li>
        <li><a href="" class="secondary_btn">회원탈퇴</a></li>
        <li><a href="/clean_kangaroo/user/u_logout.php" class="primary_btn">로그아웃</a></li>
      </ul>
    </nav>
</div>