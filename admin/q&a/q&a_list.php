<?php
$title = 'Q&A 관리';
$css1 = '<link rel="stylesheet" href="../../css/qna.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>

<body>
  <div class="board_container grid">
    <form action="" id="">
      <div class="board_category df">
        <div class="select_wrap">
          <select class="form-select" aria-label="" id="" name="">
            <option>공지사항 관리</option>
            <option selected>Q&A 관리</option>
            <option>수강평 관리</option>
          </select>
        </div>
        <div class="search_wrap df">
          <input class="form-control search" type="text" id="search_keyword" name="keyword">
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
        <tr>
          <td>답변대기</td>
          <td>쿠폰 사용 문의드립니다.</td>
          <td>2024-04-23</td>
          <td>10</td>
          <td>츄츄림</td>
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
    </div>
  </div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
?>