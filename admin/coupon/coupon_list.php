<?php
session_start();
$title = "쿠폰 관리";
$css1 = '<link rel="stylesheet" href="../../css/coupon.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$search_keyword = $_GET['search_keyword'] ?? '';
$search_where = "";

if($search_keyword){
  $search_where .= " and (name LIKE '%{$search_keyword}%' or content LIKE '%{$search_keyword}%')";
}

$paginationTarget = 'coupons';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/pagination.php';

$sql = "SELECT * FROM coupons where 1=1";
$sql .= $search_where;
$order = " order by regdate desc";
$sql .= $order;
$limit = " LIMIT $startLimit, $endLimit";
$sql .= $limit;

$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}

?>


  <body>
    <div class="grid">
      <div class="totalcp">
        <p>전체 등록 쿠폰리스트 총 n개의 쿠폰이 등록되어 있습니다.</p>
      </div>
      <div class="board_container">
          <div class="board_category df">
            <div class="select_wrap">
              <select class="form-select" aria-label="전체보기" id="cate1" name="cate1" required>
                <option selected>전체보기</option>
                <option>사용중</option>
                <option>보류중</option>
                <?php
                  foreach ($cate1 as $c1) {
                ?>
                <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="search_wrap df">
              <input class="form-control search" type="text" id="search_keyword" name="search_keyword">
              <button class="primary_btn">검색</button>
            </div>
          </div>
        <hr>  
        <form action="">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">쿠폰이미지</th>
                <th scope="col">쿠폰명</th>
                <th scope="col">행사기간</th>
                <th scope="col">종류</th>
                <th scope="col">할인금액(률)</th>
                <th scope="col">조건</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td><img src="/admin/images/test_coupon.png" alt=""></td>
              <td>회원가입 쿠폰</td>
              <td>2024.04.22 <br>- 2024.05.22</td>
              <td>사용중</td>
              <td>10%</td>
              <td>10,000원</td>
              <td class="couponSvg">
                <a href="coupon_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
                <a href=""><img src="/admin/images/delete.svg" alt=""></a>
              </td>
            </tr>
            </tbody>
          </table>
        </form>
        
    </div>
    </div>
    <!--공통 pagination-->
    <div class="nav_wrap df aic">
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
    <!------------- 공통 pagination-->
      <a href="coupon_up.php" class="primary_btn">쿠폰 등록</a>
  </div>



<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';

?>