<?php
session_start();
$title = "수강평 등록";
$menutitle = '게시판 관리'; 
$css1 = '<link rel="stylesheet" href="../../css/review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

// 수강평 조회
$idx = $_GET['idx']; 
$sql = "SELECT * FROM review_board WHERE idx = {$idx}";
$result = $mysqli -> query($sql);
$rs = $result->fetch_object();

// 수강평 답글 조회
$reply_sql = "SELECT * FROM review_reply WHERE b_idx = {$idx}";
$reply_result = $mysqli -> query($reply_sql);
$reply_row = mysqli_fetch_object($reply_result);
$reply_content = $reply_row->content ?? "";

?>

<div class="review_wrap grid review_answer">
  <div class="user_write">
    <div class="profile df aic pb-5">
      <div class="username d-flex">
        <img src="/clean_kangaroo/images/favicon.png" alt="프로필 이미지" class="user_profile_img">
        <h5 class="body3b"><?= $rs->name; ?></h5>
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
        <h4 class="h4"><?= $rs->title; ?></h4>
        <span class="body3b"><?= $rs->date; ?></span>
      </div>
      <div class="content">
        <p class="body2"><?= $rs->content; ?></p>
      </div>
  </div>
  <?php
  if(isset($reply_content) && $reply_content !== ""){
  ?>
    <form action="review_edit_ok.php" method="POST">
    <input type="hidden" name="idx" value="<?= $reply_row->idx; ?>">
    <div class="admin_answer">
      <h4 class="body2b mb-3">관리자</h4>
      <div class="content">
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content"><?= $reply_content; ?></textarea>
        </div>
      </div>
      <div class="answer_btn_wrap df pt-5">
        <button class="primary_btn">수정</button>
        <a href="../review/review_list.php" class="basic_btn">취소</a>
      </div>
    </div>
  </form>
  <?php  
  }else {
    ?>
      <form action="review_ok.php" method="POST">
    <input type="hidden" name="idx" value="<?= $rs->idx; ?>">
    <div class="admin_answer">
      <h4 class="body2b mb-3">관리자</h4>
      <div class="content">
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content"></textarea>
        </div>
      </div>
      <div class="answer_btn_wrap df pt-5">
        <button class="primary_btn">저장</button>
        <a href="../review/review_list.php" class="basic_btn">취소</a>
      </div>
    </div>
  </form>
    <?php
  }
  ?>



</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
$script1 = '<script src="../../js/review.js"></script>';
?>