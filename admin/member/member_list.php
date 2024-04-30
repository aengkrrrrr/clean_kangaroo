<?php
$title = '회원 관리';
$css1 = '<link rel="stylesheet" href="../../css/member.css">';
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
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
          <input class="form-control search" type="text" id="search_keyword" name="keyword">
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
      <tr>
        <td>츄츄</td>
        <td>chukangaroo</td>
        <td>chukangaroo@net</td>
        <td>2023-04-23</td>
        <td>신규회원</td>
      </tr>
      </tbody>
    </table>
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
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
