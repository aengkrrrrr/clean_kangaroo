<?php
$title = 'Q&A 관리';
$css1 = '<link rel="stylesheet" href="../../css/qna.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$idx = $_GET['idx'];
$sql = "SELECT * FROM qna_board WHERE idx={$idx}";

$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}

?>
<body>
  <div class="answer_wrap">
         <?php
          if(isset($rsArr)){
            foreach($rsArr as $ra){
        ?>
      <div class="user_write">
          <div class="profile df aic pb-5">
            <img src="../../images/favicon.png" alt="프로필 이미지" class="user_profile_img">
            <h5 class="body3b"><?=$ra->name?></h5>
          </div>
          <div class="title df aic pb-5">
            <h4 class="h4"><?=$ra->title?></h4>
            <span class="body3b"><?=$ra->date?>-MM-DD</span>
          </div>
          <div class="content">
            <p class="body2"><?=$ra->content?></p>
          </div>
      </div>
      <?php
            }
          }
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
        <a href="q&a_answer_ok.php" class="primary_btn">등록</a>
        <a href="q&a_list.php" class="basic_btn">취소</a>
      </div>
    </div>
  </div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>