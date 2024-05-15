<?php
$title='수강 목록';
$css1 =' <link rel="stylesheet" href="./css/u_lecture_list.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';


$search_where = "";
$search_keyword = $_GET['search_keyword'] ?? '';

if($search_keyword){
  $search_where .= " and (name LIKE '%{$search_keyword}%')";
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
    <from action="" class="df user_lecture_search">
      <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="강의명 검색">
      <button class="primary_btn">검색</button>
    </from>
    <section class="user_sublecture_wrap">
      <div class="user_filter_wrap">
        <div class="user_sublecture_filter">
          <h4 class="h4">category</h4>  
          <form action="">  
          <div class="form-check">  
          <input type="radio" class="form-check-input" name="optradio" value="good">  
          <label class="form-check-label" for="btn1">전체선택</label>  
          </div>
          <div class="form-check">  
          <input type="radio" class="form-check-input" name="optradio" value="good">  
          <label class="form-check-label" for="btn1">포토샵</label>  
          </div>
          <div class="form-check">  
          <input type="radio" class="form-check-input" name="optradio" value="good">  
          <label class="form-check-label" for="btn1">일러스트</label>  
          </div>
          <div class="form-check">  
          <input type="radio" class="form-check-input" name="optradio" value="good">  
          <label class="form-check-label" for="btn1">인디자인</label>  
          </div>
          <div class="form-check">  
          <input type="radio" class="form-check-input" name="optradio" value="good">  
          <label class="form-check-label" for="btn1">비주얼디자인</label>  
          </div>
          <div class="form-check">  
          <input type="radio" class="form-check-input" name="optradio" value="good">  
          <label class="form-check-label" for="btn1">피그마</label>  
          </div>
          <button class="primary_btn">filter</button>
          </form>  
        </div>  
        <div class="user_sublecture_filter">
          <h4 class="h4">class</h4>  
          <form action="">
            <div class="form-check">  
              <input type="radio" class="form-check-input" name="optradio" value="good">  
              <label class="form-check-label" for="btn1">전체선택</label>  
              </div>
            <div class="form-check">  
              <input type="radio" class="form-check-input" name="optradio" value="good">  
              <label class="form-check-label" for="btn1">초급</label>  
            </div>
            <div class="form-check">  
              <input type="radio" class="form-check-input" name="optradio" value="good">  
              <label class="form-check-label" for="btn1">중급</label>
            </div>
            <div class="form-check">  
              <input type="radio" class="form-check-input" name="optradio" value="good">  
              <label class="form-check-label" for="btn1">고급</label>
            </div>
            <button class="primary_btn">filter</button>
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
            <a href=""><p class="body3b"><?= $item->title; ?></p></a>
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
  <footer>
    <div class="user_countainer">
      <div class="df u_footer_wrap">
        <h2><a href="index.php">딥러닝캥거루</a></h2>
        <ul class="df">
          <li class="body3">딥러닝캥거루</li>
          <li class="body3">사업자번호 : 640-81-01354</li>
          <li class="body3">대표 : 깨끗한 아기 캥거루</li>
          <li class="body3">개인정보책임자 : 김동주</li>
          <li class="body3">제휴&마케팅 문의 : dlkang@create.co.kr</li>
          <li class="body3">Copyright © DEEP LEARNING KANGAROO. All Rights Reserved.</li>
        </ul>
        <p class="h4">대표전화<br><strong>1988-8782</strong></p>
      </div>
    </div>
  </footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./js/jquery.bxslider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
<script src="./js/u_review.js"></script>
<script src="./js/u_common.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</html>