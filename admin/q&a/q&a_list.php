<?php
$title = 'Q&A 관리';
$css1 = '<link rel="stylesheet" href="../../css/qna.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

//검색창 키워드
$search_keyword = $_GET['search_keyword'] ?? '';
$search_where = "";

if($search_keyword){
  $search_where .= " and (name LIKE '%{$search_keyword}%' or title LIKE '%{$search_keyword}%')";
}
//페이지네이션
$paginationTarget = 'qna_board';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/pagination.php';

//큐앤에이 조회
$sql = "SELECT * FROM qna_board where 1=1";
$sql .= $search_where;
$order = " order by date desc";
$sql .= $order;
$limit = " LIMIT $startLimit, $endLimit";
$sql .= $limit;

$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}

?>

<body>
  <div class="board_container grid">
    <form action="" id="">
      <div class="board_category df">
        <div class="select_wrap">
          <select class="form-select" onchange="window.open(value,'_self');" aria-label="" id="" name="">
            <option value="/clean_kangaroo/admin/notice/notice_list.php">공지사항 관리</option>
            <option value="/clean_kangaroo/admin/q&a/q&a_list.php" selected>Q&A 관리</option>
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
            <th scope="col">처리현황</th>
            <th scope="col">제목</th>
            <th scope="col">일자</th>
            <th scope="col">조회수</th>
            <th scope="col">이름</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(isset($rsArr)){
            foreach($rsArr as $ra){
          ?>
        <tr>
          <td><?php if($ra->status == 0){echo '답변대기';}else{echo '답변완료'; color:'blue';}?></td>
          <td><a href="/clean_kangaroo/admin/q&a/q&a_answer.php?idx=<?=$ra->idx?>"><?=$ra->title;?></a></td>
          <td><?=$ra->date;?></td>
          <td><?=$ra->hit;?></td>
          <td><?=$ra->name;?></td>
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
        if($pageNumber > 1){
          echo "<li class=\"page-item\"><a href=\"q&a_list.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
          //이전
          if($block_num > 1){
            $prev = 1 + ($block_num - 2) * $block_ct;
            echo "<li class=\"page-item\"><a href=\"q&a_list.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
          }
        }
       
          for($i=$block_start;$i<=$block_end;$i++){
            if($i == $pageNumber){
              echo "<li class=\"page-item active\"><a href=\"q&a_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }else{
              echo "<li class=\"page-item\"><a href=\"q&a_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }            
          }  

          if($pageNumber < $total_page){
            if($total_block > $block_num){
              $next = $block_num * $block_ct + 1;
              echo "<li class=\"page-item\"><a href=\"q&a_list.php?pageNumber=$next\" class=\"page-item\">다음</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"q&a_list.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
          }        
        ?>
      </ul>
        </nav>
      <!------------- 공통 pagination-->
    </div>
  </div>

<script>
  const status = document.querySelector('.table>tbody tr td');
  for(let st of status){
    if(st.text() == '답변완료'){
      st.css({color:'red'})
    }
  }
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>