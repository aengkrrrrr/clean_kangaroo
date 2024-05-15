<?php
$title = '공지사항';
$css1 = ' <link rel="stylesheet" href="./css/u_notice_qna.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';


$search_keyword = $_GET['search_keyword'] ?? '';
$search_where = "";
if ($search_keyword) {
  $search_where .= " and (title LIKE '%{$search_keyword}%' or title LIKE '%{$search_keyword}%')";
}
$paginationTarget = 'notice_board';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/pagination.php';

$sql = "SELECT * FROM notice_board where 1=1";
$sql .= $search_where;
$order = " order by idx desc";
$sql .= $order;
$limit = " LIMIT $startLimit, $endLimit";
$sql .= $limit;

$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}

$csql = "SELECT COUNT(*) AS cnt FROM notice_board";
$cresult = $mysqli->query($csql);
$crow = $cresult->fetch_array();
?>

<main class="u_body">
  <div class="wrapper usergrid">
    <h3 class="h3">공지사항</h3>
    <div class="upper_wrapper df">
      <div class="total">전체 <span class="strong figure"><?= $crow['cnt'] ?></span>건</div>
      <form action="" id="">
        <div class="board_category df">
          <div class="search_wrap df">
            <input class="form-control search" type="text" id="search_keyword" name="search_keyword">
            <button class="primary_btn">검색</button>
          </div>
        </div>
      </form>
    </div>
    <table class="u_notice table body3">
      <thead>
        <tr class="body3b">
          <th scope="col">번호</th>
          <th colspan="3" scope="col">제목</th>
          <th scope="col">작성일</th>
          <th scope="col">조회수</th>
        </tr>
      </thead>
      <tbody class="notice_list">
        <?php
        if (isset($rsArr)) {
          foreach ($rsArr as $ra) {
        ?>
            <tr class="body3">
              <td><?= $ra->idx; ?></td>
              <td colspan="3" scope="col">
                <a href="u_notice_view.php?idx=<?= $ra->idx; ?>"><?= $ra->title; ?></a></td>
              <td><?= $ra->date; ?></td>
              <td><?= $ra->hit; ?></td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
    <!--공통 pagination-->
    <div class="nav_wrap df aic">
      <nav aria-label="">
        <ul class="pagination">
          <?php
          if ($pageNumber > 1) {
            echo "<li class=\"page-item\"><a href=\"u_notice_list.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
            //이전
            if ($block_num > 1) {
              $prev = 1 + ($block_num - 2) * $block_ct;
              echo "<li class=\"page-item\"><a href=\"u_notice_list.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
            }
          }

          for ($i = $block_start; $i <= $block_end; $i++) {
            if ($i == $pageNumber) {
              echo "<li class=\"page-item active\"><a href=\"u_notice_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            } else {
              echo "<li class=\"page-item\"><a href=\"u_notice_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }
          }

          if ($pageNumber < $total_page) {
            if ($total_block > $block_num) {
              $next = $block_num * $block_ct + 1;
              echo "<li class=\"page-item\"><a href=\"u_notice_list.php?pageNumber=$next\" class=\"page-item\">다음</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"u_notice_list.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
          }
          ?>
        </ul>
      </nav>
    </div>
    <!------------- 공통 pagination-->
  </div>
  </div>
</main>


<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';


?>