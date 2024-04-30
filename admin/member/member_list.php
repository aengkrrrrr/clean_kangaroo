<?php
$title = '회원 관리';
$css1 = '<link rel="stylesheet" href="../../css/member.css">';
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$search_keyword = $_GET['search_keyword'] ?? '';
$search_where = "";

if($search_keyword){
  $search_where .= " and (userid LIKE '%{$search_keyword}%' or userid LIKE '%{$search_keyword}%')";
}

$paginationTarget = 'members';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/pagination.php';

$sql = "SELECT * FROM members where 1=1";
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
  <div class="board_container grid">
    <form action="" id="">
      <div class="board_category df">
        <div class="select_wrap">
          <select class="form-select" aria-label="" id="" name="">
            <option selected>전체회원</option>
            <option>신규회원</option>
            <option>탈퇴회원</option>
          </select>
        </div>
        <div class="search_wrap df">
          <input class="form-control search" type="text" id="search_keyword" name="search_keyword">
          <button class="primary_btn">검색</button>
        </div>
      </div>
    </form>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">이름</th>
          <th scope="col">아이디</th>
          <th scope="col">이메일</th>
          <th scope="col">가입날짜</th>
          <th scope="col">상태</th>
        </tr>
      </thead>
      <tbody>
      <?php
          if(isset($rsArr)){
            foreach($rsArr as $ra){
          ?>
        <tr>
          <td><?=$ra->username?></td>
          <td><?=$ra->userid?></td>
          <td><?=$ra->email?></td>
          <td><?=$ra->regdate?></td>
          <td><?php if($ra->status == 0){echo '전체회원';}?></td>

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
        if($pageNumber > 1){
          echo "<li class=\"page-item\"><a href=\"member_list.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
          //이전
          if($block_num > 1){
            $prev = 1 + ($block_num - 2) * $block_ct;
            echo "<li class=\"page-item\"><a href=\"member_list.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
          }
        }
       
          for($i=$block_start;$i<=$block_end;$i++){
            if($i == $pageNumber){
              echo "<li class=\"page-item active\"><a href=\"member_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }else{
              echo "<li class=\"page-item\"><a href=\"member_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }            
          }  

          if($pageNumber < $total_page){
            if($total_block > $block_num){
              $next = $block_num * $block_ct + 1;
              echo "<li class=\"page-item\"><a href=\"member_list.php?pageNumber=$next\" class=\"page-item\">다음</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"member_list.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
          }        
        ?>
      </ul>
        </nav>
      <!------------- 공통 pagination-->
    </div>
  </div>
  

  <?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
