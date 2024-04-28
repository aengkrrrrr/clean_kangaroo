<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/inc/admin_check.php';

$search_where = "";
$search_keyword = $_GET['keyword'] ?? '';

if($search_keyword){
  $search_where .= " and (coupon_name LIKE '%{$search_keyword}%')";
}

$paginationTarget = 'coupons';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/admin/inc/pagination.php';

$sql = "SELECT * FROM coupons where 1=1"; //모든 상품 조회 쿼리
$sql .= $search_where;
$order = " order by cid desc";
$sql .= $order;
$limit = " LIMIT $startLimit, $endLimit";
$sql .= $limit;

$result = $mysqli->query($sql);

while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}

?>

        <thead>
          <?php
            if (isset($rsArr)) {
            foreach ($rsArr as $item) {
          ?>
            <tr>
              <th>
                <img src="<?= $item->coupon_image; ?>" alt="">
              </th>
              <th><?= $item->coupon_name; ?></th>
              <th><?= $item->coupon_type; ?></th>
              <th><?= $item->coupon_price; ?></th>
              <th><?= $item->coupon_ratio; ?></th>
              <th><?= $item->use_min_price; ?></th>
              <th><?= $item->max_value; ?></th>
              <th><?= $item->userid; ?></th>
            </tr>  
        <?php
          }
        }
        ?>                     
        </thead>
    </table>
    <a href="coupon_up.php" class="btn btn-primary">쿠폰등록</a>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/footer.php';
?>