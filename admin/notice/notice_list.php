<?php
$title = "공지사항 관리";
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>
  <!----------- 헤더 -->
  <body>
  <div class="board_container">
    <form action="" id="">
      <div class="board_category df">
        <div class="select_wrap">
          <select class="form-select" aria-label="" id="" name="">
            <option selected>대분류</option>
            <option>중분류</option>
            <option>소분류</option>
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
            <th scope="col" colspan="5">제  목</th>
            <th scope="col">카테고리</th>
            <th scope="col">일자</th>
            <th scope="col">조회수</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <td colspan="5"> 업데이트 입니다.</td>
          <td>전  체</td>
          <td>24.04.25</td>
          <td>105</td>
          <td class="lectureSvg">
            <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
            <a href=""><img src="/admin/images/delete.svg" alt=""></a>
          </td>
        </tr>
        <tr>
          <td colspan="5"> 업데이트 입니다.</td>
          <td>전  체</td>
          <td>24.04.25</td>
          <td>105</td>
          <td class="lectureSvg">
            <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
            <a href=""><img src="/admin/images/delete.svg" alt=""></a>
          </td>
        </tr>
        <tr>
          <td colspan="5"> 업데이트 입니다.</td>
          <td>전  체</td>
          <td>24.04.25</td>
          <td>105</td>
          <td class="lectureSvg">
            <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
            <a href=""><img src="/admin/images/delete.svg" alt=""></a>
          </td>
        </tr>
        <tr>
          <td colspan="5"> 업데이트 입니다.</td>
          <td>전  체</td>
          <td>24.04.25</td>
          <td>105</td>
          <td class="lectureSvg">
            <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
            <a href=""><img src="/admin/images/delete.svg" alt=""></a>
          </td>
        </tr>
        <tr>
          <td colspan="5"> 업데이트 입니다.</td>
          <td>전  체</td>
          <td>24.04.25</td>
          <td>105</td>
          <td class="lectureSvg">
            <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
            <a href=""><img src="/admin/images/delete.svg" alt=""></a>
          </td>
        </tr>
        <td colspan="5"> 업데이트 입니다.</td>
        <td>전  체</td>
        <td>24.04.25</td>
        <td>105</td>
        <td class="lectureSvg">
          <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
          <a href=""><img src="/admin/images/delete.svg" alt=""></a>
        </td>
      </tr>
      <tr>
        <td colspan="5"> 업데이트 입니다.</td>
        <td>전  체</td>
        <td>24.04.25</td>
        <td>105</td>
        <td class="lectureSvg">
          <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
          <a href=""><img src="/admin/images/delete.svg" alt=""></a>
        </td>
      </tr>
      <tr>
        <td colspan="5"> 업데이트 입니다.</td>
        <td>전  체</td>
        <td>24.04.25</td>
        <td>105</td>
        <td class="lectureSvg">
          <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
          <a href=""><img src="/admin/images/delete.svg" alt=""></a>
        </td>
      </tr>
      <tr>
        <td colspan="5"> 업데이트 입니다.</td>
        <td>전  체</td>
        <td>24.04.25</td>
        <td>105</td>
        <td class="lectureSvg">
          <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
          <a href=""><img src="/admin/images/delete.svg" alt=""></a>
        </td>
      </tr>
      <tr>
        <td colspan="5"> 업데이트 입니다.</td>
        <td>전  체</td>
        <td>24.04.25</td>
        <td>105</td>
        <td class="lectureSvg">
          <a href="notice_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
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
        <a href="notice_up.html" class="primary_btn board_btn">공지 등록</a>
    </div>
  </div>




</body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>

<!-------------------- 스크립트 -->
</html>