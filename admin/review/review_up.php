<?php
session_start();
$title = "수강평 등록";
$css1 = '<link rel="stylesheet" href="../../css/review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>

<div class="review_wrap grid review_answer">
  <div class="user_write">
    <div class="profile df aic pb-5">
      <div class="username d-flex">
        <img src="/clean_kangaroo/images/favicon.png" alt="프로필 이미지" class="user_profile_img">
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
  <form action="" method="POST">
    <div class="admin_answer">
      <h4 class="body2b mb-3">관리자</h4>
      <div class="content">
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
          <label for="floatingTextarea">Comments</label>
        </div>
      </div>
      <div class="answer_btn_wrap df pt-5">
        <a href="" class="primary_btn">등록</a>
        <a href="" class="basic_btn">취소</a>
      </div>
    </div>
  </form>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>