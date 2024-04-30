<?php
$title = "강좌관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$search_keyword = $_GET['search_keyword'] ?? '';
$search_where = "";
if($search_keyword){
  $search_where .= " and (name LIKE '%{$search_keyword}%' or content LIKE '%{$search_keyword}%')";
}
$paginationTarget = 'products';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/pagination.php';

$sql = "SELECT * FROM products where 1=1";
$sql .= $search_where;
$order = " order by reg_date desc";
$sql .= $order;
$limit = " LIMIT $startLimit, $endLimit";
$sql .= $limit;

$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}


?>

<body>
  <div class="board_container">
    <form action="" id="">
      <div class="board_category df">
        <div class="select_wrap">
          <select class="form-select" aria-label="" id="" name="">
            <option selected>대분류</option>
            <option>중분류</option>
          </select>
        </div>
        <div class="search_wrap df">
          <input class="form-control search" type="text" id="search_keyword" name="search_keyword">
          <button class="primary_btn">검색</button>
        </div>
      </div>
    </form>

    <hr>

    <form action="">
      <table class="table">
        <thead>
          <tr>
            <th colspan="3">제 목</th>
            <th scope="col">카테고리</th>
            <th scope="col">일자</th>
            <th scope="col">조회수</th>
            <th scope="col">공개상태</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a href="lecture_view.html">
                <img src="../../images/test_coupon.png" alt=""></a></td>
              <td colspan="2">
                <div class="lecdesc">
                  <a href="lecture_view.html">
                  강의 제목 1<br>
                  강의설명<br>
                  개강일 : <span class="rel_date">24/04/15</span> <br>
                  수강생 수 : <span class="sub_p">105</span>
            </a>
    </td>
  <td>웹디자인</td>
  <td>2024.04.24</td>
  <td>105</td>
  <td>전체 공개</td>
  <td class="lectureSvg">
    <a href="lecture_edit.html"><img src="../../images/edit.svg" alt=""></a>
    <a href=""><img src="../../images/delete.svg" alt=""></a>
  </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
    <tr>
    <td>
      <a href="lecture_view.html">
        <img src="../../images/test_coupon.png" alt=""></a></td>
        <td colspan="2">
          
      <div class="lecdesc">
        <a href="lecture_view.html">
          강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span></a>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td><img src="/admin/images/test_coupon.png" alt=""></td>
    <td colspan="2">
      <div class="lecdesc">
        강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td><span class="partview">일부 공개</span></td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td><img src="/admin/images/test_coupon.png" alt=""></td>
    <td colspan="2">
      <div class="lecdesc">
        강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td>전체 공개</td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  <tr>
    <td><img src="/admin/images/test_coupon.png" alt=""></td>
    <td colspan="2">
      <div class="lecdesc">
        강의 제목 1<br>
        강의설명<br>
        개강일 : <span class="rel_date">24/04/15</span> <br>
        수강생 수 : <span class="sub_p">105</span>
      </div>
    </td>
    <td>웹디자인</td>
    <td>2024.04.24</td>
    <td>105</td>
    <td><span class="nottoshow">비공개</span></td>
    <td class="lectureSvg">
      <a href="lecture_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
      <a href=""><img src="/admin/images/delete.svg" alt=""></a>
    </td>
  </tr>
  </tbody>
  </table>
  </form>
    <!--공통 pagination-->
    <div class="nav_wrap df aic">
      <nav aria-label="">
      <ul class="pagination">
         <?php
        if($pageNumber > 1){
          echo "<li class=\"page-item\"><a href=\"lecture_list.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
          //이전
          if($block_num > 1){
            $prev = 1 + ($block_num - 2) * $block_ct;
            echo "<li class=\"page-item\"><a href=\"lecture_list.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
          }
        }
       
          for($i=$block_start;$i<=$block_end;$i++){
            if($i == $pageNumber){
              echo "<li class=\"page-item active\"><a href=\"lecture_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }else{
              echo "<li class=\"page-item\"><a href=\"lecture_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }            
          }  

          if($pageNumber < $total_page){
            if($total_block > $block_num){
              $next = $block_num * $block_ct + 1;
              echo "<li class=\"page-item\"><a href=\"lecture_list.php?pageNumber=$next\" class=\"page-item\">다음</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"lecture_list.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
          }        
        ?>
      </ul>
      </nav>
    <!------------- 공통 pagination-->
<div class="btn_collect">
        <a href="../lecture/category.php" class="primary_btn board_btn">카테고리 등록</a>
        <a href="../lecture/lecture_up.php" class="primary_btn board_btn">강좌 등록</a>
</div>   
  </div>
    <!------------- 공통 pagination-->

  
  </div>

</body>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>

</html>