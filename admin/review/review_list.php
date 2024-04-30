<?php
session_start();
$title = "수강평 목록";
$css1 = '<link rel="stylesheet" href="../../css/review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>

  <div class="board_container grid review_board">
    <form action="" id="">
      <div class="board_category df">
        <div class="select_wrap">
          <select class="form-select" aria-label="" id="" name="">
            <option selected>수강평 관리</option>
            <option>공지사항 관리</option>
            <option>Q&A 관리</option>
          </select>
        </div>
        <div class="search_wrap df">
          <input class="form-control search" type="text" id="search_keyword" name="keyword">
          <button class="primary_btn">검색</button>
        </div>
      </div>
    </form>
    <div class="review_wrap">
      <div class="user_write">
        <div class="profile df aic pb-5">
          <div class="username d-flex">
            <img src="images/favicon.png" alt="프로필 이미지" class="user_profile_img">
            <h5 class="body3b">사용자이름</h5>
          </div>
          <div class="rating" data-rate="3">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
        <div class="title df aic pb-5">
          <h4 class="h4">제목입니다.</h4>
          <span class="body3b">YYYY-MM-DD</span>
        </div>
        <div class="content">
          <p class="body2">사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용 사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용 사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용사용자가 작성한 내용</p>
        </div>
      </div>
    </div>
    <nav aria-label="">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link">&laquo;</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">&raquo;</a>
        </li>
      </ul>
    </nav>
    <a href="coupon_up.php" class="primary_btn">쿠폰등록</a>
  </div>
  

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/php/footer.php';
?>