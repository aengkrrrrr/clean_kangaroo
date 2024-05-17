<?php
$title='수강 목록';
$css1 =' <link rel="stylesheet" href="./css/u_lecture_list.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';




// 필터
$pcode = $_GET['code'] ?? '';
$step2sql = "SELECT * from product_category where step=2 and pcode='{$pcode}'";
$step2result = $mysqli->query($step2sql);
while ($step2rs = $step2result->fetch_object()) {
  $cate2Arr[] = $step2rs;
}



//필터 카테고리 조회
$c_where = '';

if($cate != ''){
  if($cate == $step2sql){
    $c_where .= " and cate LIKE '%{$cate}%'";
  }
}else{
  $c_where .= "";
}


// 검색창
$search_where = "";
$search_keyword = $_GET['search_keyword'] ?? '';

if($search_keyword){
  $search_where .= " and (title LIKE '%{$search_keyword}%')";
} else {
  $search_where = "";
}

$paginationTarget = 'products';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/lecture_pagination.php';

$sql = "SELECT * FROM products where 1=1";
$sql .= $search_where;
$order = " order by title desc";
$sql .= $order;
$limit = " LIMIT $startLimit, $endLimit";
$sql .= $limit;

$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}
?>
  <main class="usergrid">
    <div class="user_sublecture_title">
      <h2 class="h2">
        <?php
          if (isset($cate1Arr) && !empty($cate1Arr)) {
            echo $cate1Arr[0]->name;
          } else {
            echo '카테고리명';
          }
        ?>
      </h2>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="search_wrap df user_lecture_search">
      <input class="form-control search" type="text" id="search_keyword" name="search_keyword" placeholder="강의명으로 검색">
      <button class="primary_btn">검색</button>
    </form>
    <section class="user_sublecture_wrap">
      <div class="user_filter_wrap">
        <div class="user_sublecture_filter">
          <h4 class="body1b">category</h4>
          <form action="">
            <div class="form-check">  
              <input class="form-check-input" type="checkbox" value="" id="checkAlls">
              <label class="form-check-label" for="flexCheckDefault" value="">전체선택</label>
            </div>
            <div class="select_lecture">
            <?php
              if(isset($cate2Arr)){
                foreach($cate2Arr as $cate2){
            ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?= $cate2->pcode?>" id="flexCheckDefault" name="pcode">
                <label class="form-check-label" for="flexCheckDefault"><?= $cate2->name?></label>
              </div>
              <?php
                    }
                  }
                ?>
            </div>
            <button id="filter-submit-btn" class="btn primary_btn">filter</button>
          </form>
        </div>  
        <div class="user_sublecture_filter">
          <h4 class="body1b">class</h4>  
          <form action="">
            <div class="form-check">  
              <input class="form-check-input" type="checkbox" value="" id="checkAll">
              <label class="form-check-label" for="flexCheckDefault">전체선택</label>
            </div>
            <div class="select_lecture">
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="6" id="flexCheckDefault" name="code2">
                <label class="form-check-label" for="flexCheckDefault">초급</label>
              </div>
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="7" id="flexCheckDefault" name="code2">
                <label class="form-check-label" for="flexCheckDefault">중급</label>
              </div>
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="8" id="flexCheckDefault" name="code2">
                <label class="form-check-label" for="flexCheckDefault">고급</label>
              </div>
            </div>
            <button id="filter-submit-btn" class="btn primary_btn">filter</button>
          </form>
        </div>
      </div>  
      <div class="user_sublecture_contentwrap">
        <ul>
        <?php
          if (isset($rsArr)) {
          foreach ($rsArr as $item) {
        ?>
          <li class="user_lecture_contents">
            <a href="u_lecture_view.php?pid=<?= $item->pid; ?>">
              <img src="<?= $item->thumbnail; ?>" alt="">
            </a>
            <p class="user_lecture_keyword">
              <span class="lec_word1 body5">UI/UX</span>
              <span class="lec_word2 body5">초급</span>
            </p>
            <a href="u_lecture_view.php?pid=<?= $item->pid; ?>"><p class="body3b"><?= $item->title; ?></p></a>
            <p class="lecture_price">
              <span class="body1b user_price"><?= $item->price; ?></span>
              <span class="body4b">원</span>
            </p>
          </li>
          <?php
              }
            }
          ?>
        </ul>
      </div>
    </section>
    <nav aria-label="" class="user_lecture_pager">
      <ul class="pagination">
      <?php
      if($pageNumber > 1){
        echo "<li class=\"page-item\"><a href=\"u_lecture_list.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
        //이전
        if($block_num > 1){
          $prev = 1 + ($block_num - 2) * $block_ct;
          echo "<li class=\"page-item\"><a href=\"u_lecture_list.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
        }
      }

        for($i=$block_start;$i<=$block_end;$i++){
          if($i == $pageNumber){
            echo "<li class=\"page-item active\"><a href=\"u_lecture_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
          }else{
            echo "<li class=\"page-item\"><a href=\"u_lecture_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
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
    $script1 = '<script src="./js/u_lecture.js"></script>';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
  ?>