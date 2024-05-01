<?php
session_start();
$title = "수강평 목록";
$css1 = '<link rel="stylesheet" href="../../css/review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

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


?>

  <div class="board_container grid review_board">
    <div class="board_category df">
      <div class="select_wrap">
        <select class="form-select" onchange="window.open(value,'_self');" aria-label="" id="" name="">
          <option value="/clean_kangaroo/admin/notice/notice_list.php">공지사항 관리</option>
          <option value="/clean_kangaroo/admin/q&a/q&a_list.php">Q&A 관리</option>
          <option value="/clean_kangaroo/admin/review/review_list.php" selected>수강평 관리</option>
        </select>
      </div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="search_wrap df">
        <input class="form-control search" type="text" id="search_keyword" name="search_keyword">
        <button class="primary_btn">검색</button>
      </form>
    </div>
    <?php
        if (isset($rsArr)) {
        foreach ($rsArr as $item) {
      ?>
    <form class="review_wrap">

      <div class="review_wraps">
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
        
        <a href="review_up.php" class="primary_btn reviewbtn">댓글 달기</a>
        <a href="review_delete.php" class="basic_btn reviewbtn review_del">삭제</a>
        
      </div>
      
    </form>
    <?php
          }
        }
        ?>
  </div>
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

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
$script1 = '<script src="../../js/coupon.js"></script>';
?>