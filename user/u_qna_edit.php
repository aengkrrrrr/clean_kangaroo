<?php
$title = 'Q&A 게시판';
$css1 = ' <link rel="stylesheet" href="./css/u_notice_qna.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

//테이블조회
$idx = $_GET['idx'];
$sql = "SELECT * FROM qna_board WHERE idx={$idx}";
$result = $mysqli->query($sql);
$row = $result->fetch_object();


//$userid = trim($_POST['userid']);
//$msql = "SELECT * FROM members where userid='{$userid}'";
//$result2 = $mysqli->query($msql);
//$rs = $result2->fetch_object();

// 로그인되어 있는지 확인
// if (!isset($_SESSION['UID'])) {
//   header("Location: u_login.php");
//   exit();
// }

// if ($rs) {
// $_SESSION['UNAME'] = $rs->username;
// $_SESSION['UID'] = $rs->userid;
// }
// ?>

<main class="u_body">
    <div class="wrapper usergrid">
    <form action="u_qna_edit_ok.php" method="POST" enctype="multipart/form-data" id="product_save">
    <input type="hidden" name="idx"  value="<?=$idx?>">
    <input type="hidden" name="

    ">
      <h3 class="h3">Q&A 게시판</h3>
      <ul class="u_qna up body3">
        <li>
          <div class="form-floating mb-3 body3">
            <input type="text" class="form-control" id="floatingInput_title" placeholder="제목"  name="title"  value="<?=$row->title?>">
            <label for="floatingInput_title">제목</label>
          </div>
        </li>
        <li>
            <div class="form-floating textarea body3">
              <textarea class="form-control" placeholder="공지 설명" id="floatingTextarea"  name="content"><?=$row ->content;?></textarea>
              <label for="floatingTextarea " hidden>comment</label>
            </div>   
        </li>  
        <li class="btn_collect">
          <button class="primary_btn">등록 완료</button>
          <a href="javascript:history.back();" class="basic_btn">목록</a>
        </li>
      </ul>
      </form>
    </div>
</main>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';


?>