<?php
session_start();
$title = "쿠폰 관리";
$css1 = '<link rel="stylesheet" href="../../css/coupon.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$search_keyword = $_GET['search_keyword'] ?? '';
$status = $_GET['status'] ?? '';
$search_where = "";

if($search_keyword){
  $search_where .= " and (coupon_name LIKE '%{$search_keyword}%')";
}
if(isset($status) && $status !== ''){
  $search_where .= " and status = {$status}";
}

$paginationTarget = 'coupons';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/pagination.php';

$sql = "SELECT * FROM coupons where 1=1";
$sql .= $search_where;
$order = " order by coupon_name desc";
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
        <p>전체 등록 쿠폰리스트 중 총 <?= $count;  ?>개의 쿠폰이 등록되어 있습니다.</p>
      </div>
      <div class="board_container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="search_wrap df">
          <div class="board_category df aic">
            <div class="select_wrap">
              <select class="form-select" id="coupon_status" class="form-select" name="status">
                <option value="" selected>전체보기</option>
                <option value="0">사용중</option>
                <option value="1">보류중</option>
              </select>
            </div>
              <button class="primary_btn">검색</button>
          </div>
        </form>
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
            <?php
              if (isset($rsArr)) {
              foreach ($rsArr as $item) {
            ?>
            <tr class="coupon_post">
              <td><img src="<?= $item->coupon_image; ?>" alt=""></td>
              <td><?= $item->coupon_name; ?></td>
              <td><?= $item->max_date; ?></td>
              <td><?php
                if($item->status == '2'){echo '전체보기';} 
                else if($item->status == '0'){echo '사용중';} 
                else if($item->status == '1'){echo '보류중';}
              ?></td>
              <td><?= $item->coupon_ratio; ?></td>
              <td><?= $item->coupon_price; ?></td>
              <td class="couponSvg">
                <a href="coupon_edit.php?cid=<?= $item->cid; ?>"><img src="/clean_kangaroo/images/edit.svg" alt=""></a>
                <a href="coupon_delete.php?cid=<?= $item->cid; ?>" class="coupon_del"><img src="/clean_kangaroo/images/delete.svg" alt=""></a>
              </td>
            </tr>
            <?php
              }
            }
            ?>
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
  $script1 = '<script src="../../js/coupon.js"></script>';

<<<<<<< HEAD
  ?>
=======
  <script>
document.addEventListener('DOMContentLoaded', ()=>{
    $('.coupon_del').click(function(){

        $(this).closest('tr').remove();
        let cartid =  $(this).find('.qty-text').attr('data-id');
        let data = {
            cartid :cartid
        }
        $.ajax({
            url:'lecture_del.php',
            async:false,
            type: 'POST',
            data:data,
            dataType:'json',
            error:function(){},
            success:function(data){
            console.log(data);
            if(data.result=='ok'){
                alert('선택한 강의가 삭제되었습니다.');  
                location.reload();                      
            }else{
                alert('오류, 다시 시도하세요');                        
                }
            }
        });
    });
      });
   
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';

?>
  
>>>>>>> main-park
