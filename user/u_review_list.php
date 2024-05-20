<?php
$title = '수강평';
$css1 =' <link rel="stylesheet" href="./css/u_review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

$search_where = "";
$search_keyword = $_GET['search_keyword'] ?? '';
$name = "";
$name = $_GET['name'] ?? '';
$content = "";
$content = $_GET['content'] ?? '';

if($search_keyword){
  $search_where .= " and (content LIKE '%{$search_keyword}%')";
}else {
  $search_where = "";
}


$paginationTarget = 'review_board';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/pagination.php';

$sqlrb = "SELECT p.*,rb.* FROM review_board rb
JOIN products p ON p.pid = rb.pid
WHERE rb.userid = '{$userid}'
ORDER BY rb.idx DESC";

$resultrb = $mysqli->query($sqlrb);
while ($rs = $resultrb->fetch_object()) {
  $rbArr[] = $rs;
}


// 수강평 답글 조회
// $reply_sql = "SELECT * FROM review_reply";
// $reply_result = $mysqli -> query($reply_sql);
// $rr = $reply_result->fetch_object();
?>
<main class="usergrid">
  <div class="user_subreview_title">
    <h2 class="h2">REVIEW</h2>
    <p class="body1">수강하며 느낀 점을 자세히 공유해요!</p>
  </div>

    <ul class="df user_review_list">
    <?php
      if (isset($rbArr)) {
      foreach ($rbArr as $rview) {
    ?>
      <li class="user_profile">
        <div class="df user_review_img">
          <img src="../images/user_profile1.png" alt="">
          <p>
            <span class="body2b"><?= $rview->userid?></span><br>
            <span class="body1"><?=$rview->title?></span>
          </p>
        </div>
        <p class="body3"><?= $rview->content; ?></p>
      </li>
      <?php
          }
        }
      ?>
    </ul>

    <div class="review_form_wrap df">
      <div class="totalcp">
        <p class="body3b">전체 <span><?= $count;  ?></span>건</p>
      </div>
      <div class="board_container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="search_wrap">
          <div class="board_category df aic">
            <div class="select_wrap">
              <select class="form-select" id="coupon_status" class="form-select" name="status">
                <option value="" selected>전체보기</option>
                <option value="title">제목</option>
                <option value="content">내용</option>
              </select>
            </div>
            <input class="form-control" type="text" list="datalistOptions" id="search_keyword" name="search_keyword" placeholder="검색할 내용을 입력하세요.">
            <button class="primary_btn">검색</button>
          </div>
        </form>
      </div>
    </div>
    <ul class="user_intreview ">
    <?php
      if (isset($rbArr)) {
      foreach ($rbArr as $rview) {
    ?>
      <li class="intreview_box">
        <div>
          <div class="user_intreview_tbox df">
            <div class="df">
              <div class="user_intreview_title df">
                <img src="../images/user_profile1.png" alt="">
                <p class="body4b"><?=$rview->title?></p>
                <span class="body4b"><?= $rview->userid ?></span><br>
                <div class="body4b rating" data-rate="<?= $rview->star; ?>">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>	
                </div>
              </div>
              <p class="body4b"><?= $rview->date; ?></p>
            </div>
          </div>
          <div class="user_intreview_cbox">
            <p><?= $rview->content; ?></p>
          </div>
          <?php
          $idx = $rview->idx;
          $reply_sql = "SELECT * FROM review_reply WHERE b_idx={$idx}";
          $reply_result = $mysqli -> query($reply_sql);
          
          $rpArr= [];
          while ($rp = $reply_result->fetch_object()) {
            $rpArr[] = $rp;
          }

          if (isset($rpArr)) {
            foreach ($rpArr as $rply) {

          ?>
          <div class="admina user_intreview_cbox">
            <p><?=$rply->content?></p>
          </div>
          <?php
            }
          }
          ?>
        </div>
      </li>
      <?php
          }
        }
      ?>
    </ul>
    <nav aria-label="">
    <ul class="pagination">
      <?php
      if($pageNumber > 1){
        echo "<li class=\"page-item\"><a href=\"u_review_list.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
        //이전
        if($block_num > 1){
          $prev = 1 + ($block_num - 2) * $block_ct;
          echo "<li class=\"page-item\"><a href=\"u_review_list.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
        }
      }

        for($i=$block_start;$i<=$block_end;$i++){
          if($i == $pageNumber){
            echo "<li class=\"page-item active\"><a href=\"u_review_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
          }else{
            echo "<li class=\"page-item\"><a href=\"u_review_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
          }            
        }  

        if($pageNumber < $total_page){
          if($total_block > $block_num){
            $next = $block_num * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"u_review_list.php?pageNumber=$next\" class=\"page-item\">다음</a></li>";
          }
          echo "<li class=\"page-item\"><a href=\"u_review_list.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
        }        
      ?>
    </ul>
    </nav>
</main>

<?php
  $script1 = '<script src="./js/u_review.js"></script>';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>