<?php
$title = '수강평';
$css1 =' <link rel="stylesheet" href="./css/u_review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

// 수강평 조회
$idx = $_GET['idx'];
$sql = "SELECT * FROM review_board WHERE idx = {$idx}";
$result = $mysqli -> query($sql);
$rs = $result->fetch_object();

// 회원 아이디 불러오기
$membersql = "SELECT * FROM members";
$memberresult = $mysqli->query($membersql);
$memberrs = $memberresult->fetch_object();
?>

<main class="usergrid">
  <div class="user_review_writett">
    <h2 class="h2">수강평 수정</h2>
  </div>
  <section class="user_review_writecn">
    <form action="u_review_edit_ok.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="idx" value="<?= $rs->idx; ?>">
      <p class="review_userid">
        <span class="body2">NAME : <?= $memberrs->username ?></span>
      </p>
      <div class="user_review_titlewrap df user_review_form">
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="title"><?= $rs->title; ?></textarea>
          <label for="floatingTextarea">제목</label>
        </div>
        <div class="make_star df">
          <select id="makeStar" class="form-select">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <div class="rating" data-rate="<?= $rs->star; ?>" name="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>	
          </div>
        </div>
      </div>
      <div class="form-floating user_review_form">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="content" style="height: 500px"><?= $rs->content; ?></textarea>
        <label for="floatingTextarea2">내용</label>
      </div>
      <p class="df">
        <a href="u_review_list.php" class="basic_btn rvbackbtn">취소</a>
        <button class="primary_btn">수정</button>
      </p>
    </form>
  </section>
  
</main>

<?php

  $script1 = '<script src="./js/u_review.js"></script>';
  $script2 = '<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>';

  include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';

?>