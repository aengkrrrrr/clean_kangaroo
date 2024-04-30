<?php
$title = "강좌관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
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
          <input class="form-control search" type="text" id="search_keyword" name="keyword">
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
          <li class="page-item disabled">
            <a class="page-link">&laquo;</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">&raquo;</a>
          </li>
        </ul>
      </nav>
    <!------------- 공통 pagination-->
<div class="btn_collect">
        <a href="../lecture/category.php" class="primary_btn board_btn">카테고리 등록</a>
        <a href="lecture_up.html" class="primary_btn board_btn">강좌 등록</a>
</div>   
  </div>
    <!------------- 공통 pagination-->

  
  </div>

</body>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>

</html>