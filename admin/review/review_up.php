<?php
session_start();
$title = "수강평 보기";
$css1 = '<link rel="stylesheet" href="../../css/review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$idx = $_GET['idx']; 
$sql = "SELECT * FROM review_board WHERE idx = {$idx}";
$result = $mysqli -> query($sql);
$rs = $result->fetch_object();


$optSql = "SELECT * FROM review_reply WHERE idx = {$idx}";
$optrs = $mysqli -> query($optSql);

while ($ors = $optrs->fetch_object()) {
    $optArr[] = $ors;
}
?>

<div class="review_wrap grid review_answer">
<?php
  if (isset($rsArr)) {
  foreach ($rsArr as $item) {
?>
  <div class="user_write">
    <div class="profile df aic pb-5">
      <div class="username d-flex">
        <img src="/clean_kangaroo/images/favicon.png" alt="프로필 이미지" class="user_profile_img">
        <h5 class="body3b"><?= $item->name; ?></h5>
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
        <h4 class="h4"><?= $item->title; ?></h4>
        <span class="body3b"><?= $item->date; ?></span>
      </div>
      <div class="content">
        <p class="body2"><?= $item->content; ?></p>
      </div>
  </div>
  <?php
          }
        }
        ?>

<?php
        if (isset($rsArr)) {
        foreach ($rsArr as $item) {
      ?>
  <div class="admin_answer">
    <h4 class="body2b mb-3">관리자</h4>
    <div class="content">
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Comments</label>
      </div>
    </div>
    <div class="answer_btn_wrap df pt-5">
      <a href="" class="primary_btn">수정</a>
      <a href="" class="basic_btn">취소</a>
    </div>
  </div>
  <?php
          }
        }
        ?>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
$script1 = '<script src="../../js/review.js"></script>';
?>