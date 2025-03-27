<?php
$title = "공지사항 관리";
$menutitle = '게시판 관리';
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

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

// //조회수 업데이트
// $hit = $rs->hit + 1;
// $sqlUpdate = "UPDATE notice_board SET hit={$hit} WHERE idx = {$idx}";
// $mysqli->query($sqlUpdate);
// $result2 = $mysqli->query($sqlUpdate);
// while ($rs = $result2->fetch_object()) {
//   $rsArr[] = $rs;
// }
?>
<!----------- 헤더 -->

<body>
  <div class="board_container grid">
    <form action="" id="">
      <div class="board_category df">
        <div class="select_wrap">
          <select class="form-select" onchange="window.open(value,'_self');" aria-label="" id="" name="">
            <option value="/clean_kangaroo/admin/notice/notice_list.php" selected>공지사항 관리</option>
            <option value="/clean_kangaroo/admin/q&a/q&a_list.php">Q&A 관리</option>
            <option value="/clean_kangaroo/admin/review/review_list.php">수강평 관리</option>
          </select>
        </div>
        <div class="search_wrap df">
          <input class="form-control search" type="text" id="search_keyword" name="search_keyword">
          <button class="primary_btn">검색</button>
        </div>
      </div>
    </form>

    <form action="">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" colspan="5">제 목</th>
            <th scope="col">일자</th>
            <th scope="col">조회수</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($rsArr)) {
            foreach ($rsArr as $ra) {
          ?>
              <tr>
                <td colspan="5"><a href="notice_view.php?idx=<?= $ra->idx; ?>"><?= $ra->title; ?></a></td>
                <td><?= $ra->date; ?></td>
                <td><?= $ra->hit; ?></td>
                <td class="lectureSvg">
                  <a href="notice_edit.php?idx=<?= $ra->idx; ?>"><img src="/clean_kangaroo/images/edit.svg" alt=""></a>
                  <a href="notice_del.php?idx=<?= $ra->idx; ?>" class="cart_item_del"><img src="/clean_kangaroo/images/delete.svg" alt=""></a>
                </td>
              </tr>
          <?php
            }
          }
          ?>
        </tbody>
      </table>
    </form>
    <!--공통 pagination-->
    <div class="nav_wrap df aic">
      <nav aria-label="">
        <ul class="pagination">
          <?php
          if ($pageNumber > 1) {
            echo "<li class=\"page-item\"><a href=\"notice_list.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
            //이전
            if ($block_num > 1) {
              $prev = 1 + ($block_num - 2) * $block_ct;
              echo "<li class=\"page-item\"><a href=\"notice_list.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
            }
          }

          for ($i = $block_start; $i <= $block_end; $i++) {
            if ($i == $pageNumber) {
              echo "<li class=\"page-item active\"><a href=\"notice_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            } else {
              echo "<li class=\"page-item\"><a href=\"notice_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }
          }

          if ($pageNumber < $total_page) {
            if ($total_block > $block_num) {
              $next = $block_num * $block_ct + 1;
              echo "<li class=\"page-item\"><a href=\"notice_list.php?pageNumber=$next\" class=\"page-item\">다음</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"notice_list.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
          }
          ?>
        </ul>
      </nav>
      <!------------- 공통 pagination-->
      <a href="notice_up.php" class="primary_btn board_btn">공지 등록</a>
    </div>
  </div>

  <script>
    //header 메뉴 액티브
    document.addEventListener('DOMContentLoaded', function() {
      const title = "<?php if (isset($menutitle)) {
                        echo $menutitle;
                      } else {
                        echo $title;
                      }  ?>";


      console.log(title);
      const headerMenu = document.querySelectorAll('#header .gnb_wrap li');
      for (let menu of headerMenu) {
        menu.classList.remove('active');
        if (menu.innerText === title) {
          menu.classList.add('active');
        }
      }
    });
  </script>
  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
  ?>

  <!-------------------- 스크립트 -->

  </html>