<?php
$title = '수강평';
$css1 =' <link rel="stylesheet" href="./css/u_review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

$search_where = "";
$search_keyword = $_GET['search_keyword'] ?? '';

if($search_keyword){
  $search_where .= " and (name LIKE '%{$search_keyword}%')";
}

$paginationTarget = 'review_board';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/pagination.php';

$sql = "SELECT * FROM review_board where 1=1";
$sql .= $search_where;
$order = " order by name desc";
$sql .= $order;
$limit = " LIMIT $startLimit, $endLimit";
$sql .= $limit;

$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}

// 회원 아이디 불러오기
$membersql = "SELECT * FROM members";
$memberresult = $mysqli->query($membersql);
$memberrs = $memberresult->fetch_object();
?>
<main class="usergrid">
  <div class="user_subreview_title">
    <h2 class="h2">REVIEW</h2>
    <p class="body1">수강하며 느낀 점을 자세히 공유해요!</p>
  </div>

    <ul class="df user_review_list">
    <?php
      if (isset($rsArr)) {
      foreach ($rsArr as $item) {
    ?>
      <li class="user_profile">
        <div class="df user_review_img">
          <img src="../images/user_profile1.png" alt="">
          <p>
            <span class="h4"><?= $memberrs->username ?></span><br>
            <span class="body1">3d애니메이터</span>
          </p>
        </div>
          <p class="body3"><?= $item->content; ?></p>
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
                <option value="0">제목</option>
                <option value="1">내용</option>
              </select>
            </div>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="검색할 내용을 입력하세요.">
            <button class="primary_btn">검색</button>
          </div>
        </form>
      </div>
    </div>
    <section class="user_intreview ">
    <?php
      if (isset($rsArr)) {
      foreach ($rsArr as $item) {
    ?>
      <ul class="intreview_box">
        <li>
          <div class="user_intreview_tbox df">
            <div class="df">
              <div class="user_intreview_title df">
                <img src="../images/user_profile1.png" alt="">
                <p class="body4b">비주얼 디자인 포트폴리오</p>
                <p class="body4b"><?= $item->name; ?></p>
                <p class="body4b">
                  <i class="fas fa-star"><?= $item->star; ?></i>
                </p>
              </div>
              <p class="body4b"><?= $item->date; ?></p>
            </div>
          </div>
          <div class="user_intreview_cbox">
            <p><?= $item->content; ?></p>
          </div>
        </li>
      </ul>
      <?php
          }
        }
      ?>
    </section>
    <nav aria-label="">
    <ul class="pagination">
      <?php
      if($pageNumber > 1){
        echo "<li class=\"page-item\"><a href=\"coupon_list.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
        //이전
        if($block_num > 1){
          $prev = 1 + ($block_num - 2) * $block_ct;
          echo "<li class=\"page-item\"><a href=\"coupon_list.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
        }
      }

        for($i=$block_start;$i<=$block_end;$i++){
          if($i == $pageNumber){
            echo "<li class=\"page-item active\"><a href=\"coupon_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
          }else{
            echo "<li class=\"page-item\"><a href=\"coupon_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
          }            
        }  

        if($pageNumber < $total_page){
          if($total_block > $block_num){
            $next = $block_num * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"coupon_list.php?pageNumber=$next\" class=\"page-item\">다음</a></li>";
          }
          echo "<li class=\"page-item\"><a href=\"coupon_list.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
        }        
      ?>
    </ul>
    </nav>
</main>

<?php
  $script1 = '<script src="./js/u_review.js"></script>';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>