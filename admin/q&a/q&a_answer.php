<?php
$title = 'Q&A 관리';
$css1 = '<link rel="stylesheet" href="../../css/qna.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

//테이블조회
$idx = $_GET['idx'];
$sql = "SELECT * FROM qna_board WHERE idx={$idx}";
$result = $mysqli->query($sql);
$row = $result->fetch_object();

//조회수 업데이트
$hit = $row->hit + 1;
$sqlUpdate = "UPDATE qna_board SET hit={$hit} WHERE idx = {$idx}";
$mysqli->query($sqlUpdate);

//답변 테이블 조회
$replySql = "SELECT * FROM qna_reply WHERE idx = {$idx}";
$replyresult = $mysqli->query($replySql);
$replyrow = $replyresult->fetch_object();
?>

<body>
  <div class="answer_wrap">
      <div class="user_write">
          <div class="profile df aic pb-5">
            <img src="../../images/favicon.png" alt="프로필 이미지" class="user_profile_img">
            <h5 class="body3b"><?=$row->name?></h5>
          </div>
          <div class="title df aic pb-5">
            <h4 class="h4"><?=$row->title?></h4>
            <span class="body3b"><?=$row->date?>-MM-DD</span>
          </div>
          <div class="content">
            <p class="body2"><?=$row->content?></p>
          </div>
      </div>
      <div class="admin_answer">
        <div class="content">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" name="content" id="content"></textarea>
            <label for="content"> <?= $replyrow->content?></label>
          </div>
        </div>
      </div>
  
    <form action="q&a_answer_ok.php" method="POST">
      <div class="admin_answer">
        <h4 class="body2b mb-3">관리자</h4>
        <div class="content">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" name="content" id="content"></textarea>
            <label for="content">Comments</label>
          </div>
        </div>
        <div class="answer_btn_wrap df pt-5">
          <a href="q&a_answer_ok.php" class="primary_btn">등록</a>
          <a href="q&a_list.php" class="basic_btn">취소</a>
        </div>
      </div>
    </form>
  </div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>