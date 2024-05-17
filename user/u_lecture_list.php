<?php
$title='수강 목록';
$css1 =' <link rel="stylesheet" href="./css/u_lecture_list.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';


$search_where = "";
$search_keyword = $_GET['search_keyword'] ?? '';

if($search_keyword){
  $search_where .= " and (title LIKE '%{$search_keyword}%')";
}

$paginationTarget = 'products';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/pagination.php';

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
      <h2 class="h2">웹디자인/편집</h2>
    </div>
    <from action="<?php echo $_SERVER['PHP_SELF']; ?>" class="df user_lecture_search">
      <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="강의명 검색">
      <button class="primary_btn">검색</button>
    </from>
    <section class="user_sublecture_wrap">
      <div class="user_filter_wrap">
        <div class="user_sublecture_filter">
          <h4 class="body1b">category</h4>  
          <form action="">
            <div class="form-check">  
              <input class="form-check-input" type="checkbox" value="" id="checkAlls">
              <label class="form-check-label" for="flexCheckDefault">전체선택</label>
            </div>
            <div class="select_lecture">
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="chk">
                <label class="form-check-label" for="flexCheckDefault">포토샵</label>
              </div>
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="2" id="flexCheckDefault" name="chk">
                <label class="form-check-label" for="flexCheckDefault">일러스트</label>
              </div>
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="3" id="flexCheckDefault" name="chk">
                <label class="form-check-label" for="flexCheckDefault">인디자인</label>
              </div>
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="4" id="flexCheckDefault" name="chk">
                <label class="form-check-label" for="flexCheckDefault">비주얼디자인</label>
              </div>
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="5" id="flexCheckDefault" name="chk">
                <label class="form-check-label" for="flexCheckDefault">피그마</label>
              </div>
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
                <input class="form-check-input" type="checkbox" value="6" id="flexCheckDefault" name="chks">
                <label class="form-check-label" for="flexCheckDefault">초급</label>
              </div>
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="7" id="flexCheckDefault" name="chks">
                <label class="form-check-label" for="flexCheckDefault">중급</label>
              </div>
              <div class="form-check">  
                <input class="form-check-input" type="checkbox" value="8" id="flexCheckDefault" name="chks">
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
    $script1 = '<script src="./js/u_lecture.js"></script>';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
  ?>