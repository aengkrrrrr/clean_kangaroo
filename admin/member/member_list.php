<?php
$title = '회원 관리';
$css1 = '<link rel="stylesheet" href="../../css/member.css">';
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$search_keyword = $_GET['search_keyword'] ?? '';
$status = $_GET['status'] ?? '';
$search_where = "";

if($search_keyword){
  $search_where .= " and (userid LIKE '%{$search_keyword}%' or userid LIKE '%{$search_keyword}%')";
}
if($status){
  $search_where .= " and status = {$status}";
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
      <div class="board_category df aic">
        <div class="select_wrap">
          <select class="form-select" aria-label="" id="" name="status">
            <option value="" selected>전체회원</option>
            <option value="0">신규회원</option>
            <option value="-1">탈퇴회원</option>
          </select>
        </div>
        <div class="search_wrap df">
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
          <td><?php if($ra->status == 0){echo '신규회원';}else{echo '탈퇴회원';}?></td>

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
              echo "<li class=\"page-item\"><a href=\"member_list.php?pageNumber=$next\" class=\"page-link\">다음</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"member_list.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
          }        
        ?>
      </ul>
        </nav>
      <!------------- 공통 pagination-->
    </div>
  </div>
  <script>
  //header 메뉴 액티브
  document.addEventListener('DOMContentLoaded',function(){
  const title = "<?php if(isset($menutitle)){ echo $menutitle;} else{echo $title;}  ?>";


  console.log(title);
  const headerMenu = document.querySelectorAll('#header .gnb_wrap li');
  for(let menu of headerMenu){
    menu.classList.remove('active');
    if(menu.innerText === title){
      menu.classList.add('active');
    }
  }
});

</script>

  <?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
