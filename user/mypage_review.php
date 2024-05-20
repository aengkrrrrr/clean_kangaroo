<?php
$title='마이페이지_내 강의실';
$css1 ='<link rel="stylesheet" href="css/cart.css">';
$css2 ='<link rel="stylesheet" href="css/mypage.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';


//구매한 강좌 조회
if (isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];

  $paysql = "SELECT p.*,pm.* FROM payment pm
          JOIN products p ON p.pid = pm.pid
          WHERE pm.userid = '{$userid}'
          ORDER BY pm.pmid DESC";
  
  $payresult = $mysqli-> query($paysql);
  while($pay = $payresult->fetch_object()){
    $payarr[]=$pay;
  }
}

//구매한 강좌 리뷰 유무 조회
if (isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];

  $rvsql = "SELECT rv.*,pm.* FROM payment pm
          JOIN review_board rv
          WHERE pm.userid = '{$userid}'
          ORDER BY pm.pid DESC";
  
  $rvresult = $mysqli-> query($rvsql);
  while($rv = $rvresult->fetch_object()){
    $rvarr[]=$rv;
  }
}


?>

<main class="usergrid">
  <div class="mypage_wrap df">
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/mypage_common.php';?>
    <div class="my_review">
      <h2 class="body1b">내 수강평</h3>
      <div class="mypage_ct df">
        <table class="review_table">
          <thead>
            <tr class="df aic">
              <th scope="col">구매날짜</th>
              <th scope="col">강의명</th>
              <th scope="col">수강평</th>
            </tr>
          </thead>
          <tbody>
          <?php
            if (isset($payarr)) {
              foreach ($payarr as $pay) {
          ?>
          <tr class="df aic">
            <td><?=$pay->regdate?></td>
            <td class="review_tit"><?=$pay->title?></td>


            <?php
              $pid = $pay->pid;
              //review_board에 유저가 수강한 강의가 있는지 확인
              $countSql = "SELECT count(*) AS cnt FROM review_board WHERE userid='{$userid}' and pid={$pid}";
              $countResult = $mysqli->query($countSql);
              $countrow = $countResult->fetch_object();
              if($countrow->cnt == 0){        
                //수강평이 없다면
              ?>
                <td>
                  <!-- 강의 번호pid에 리뷰를 작성하겠다 -->
                  <a href="u_review_up.php?pid=<?=$pay->pid?>" class="primary_btn">작성하기</a>
                  
                </td>
              <?php
              } else {
                //수강평이 있다면, 수강평 정보 조회 -  수정, 삭제 링크에 활용
                $reviewSql = "SELECT * FROM review_board WHERE userid='{$userid}' and pid={$pid}";
                $reviewResult = $mysqli->query($reviewSql);
                $rvrow = $reviewResult->fetch_object();  
              ?>
              <td class="rv_btn_wrap df">
                <a href="u_review_edit.php?idx=<?=$rvrow->idx?>" class="secondary_btn edit">수정</a>
                <a href="u_review_delete.php?idx=<?=$rvrow->idx?>" class="delete_btn del">삭제</a>
              </td>
              <?php
              }
            ?>
          </tr>
          <?php
              }
            }
          ?>
          </tbody>
        </table>        
      </div>

      

    </div>
  </div>
  <div class="nav_wrap mypage_pager">
      <nav aria-label="">
        <ul class="pagination review">
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
  </div>
</main>


<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>