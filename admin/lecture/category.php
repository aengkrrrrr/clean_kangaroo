<?php
session_start();
$title = "카테고리 관리";
$css1 = '<link rel="stylesheet" href="../../css/lecture.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

$sql = "SELECT * FROM product_category where step = 1";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
  $cate1[] = $row;
}
?>

<div class="container grid d-flex catewrap">
<div class="buttons mt-3">
    <!-- 대분류 등록 버튼 -->
    <button type="button" class="btn primary_btn" data-bs-toggle="modal" data-bs-target="#cate1Modal">
      대분류 등록
    </button>

    <!--대분류 등록 Modal -->
    <div class="modal fade" id="cate1Modal" tabindex="-1" aria-labelledby="cate1ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="cate1ModalLabel">대분류 등록</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row">
            <div class="col">
              <input type="text" class="form-control" id="code1" name="code1" placeholder="코드명 입력">
            </div>
            <div class="col">
              <input type="text" class="form-control" id="name1" name="name1" placeholder="대분류명 입력">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn basic_btn" data-bs-dismiss="modal">닫기</button>
            <button type="submit" class="btn primary_btn" data-step="1">등록</button>
          </div>
        </div>
      </div>
    </div>

    <!-- 중분류 등록 버튼 -->
    <button type="button" class="btn primary_btn" data-bs-toggle="modal" data-bs-target="#cate2Modal">
      중분류 등록
    </button>

    <!-- 중분류 등록 Modal -->
    <div class="modal fade" id="cate2Modal" tabindex="-1" aria-labelledby="cate2ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="cate2ModalLabel">중분류 등록</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <select class="form-select" aria-label="대분류" id="pcode2">
                <option disabled>대분류를 선택해주세요</option>
                <?php
                foreach ($cate1 as $c1) {
                ?>
                  <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" class="form-control" id="code2" name="code2" placeholder="코드명 입력">
              </div>
              <div class="col">
                <input type="text" class="form-control" id="name2" name="name2" placeholder="중분류명 입력">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn basic_btn" data-bs-dismiss="modal" class="">닫기</button>
            <button type="submit" class="btn primary_btn" data-step="2">등록</button>
          </div>
        </div>
      </div>
    </div>

    <!-- 소분류 등록 버튼 -->
    <button type="button" class="btn primary_btn" data-bs-toggle="modal" data-bs-target="#cate3Modal">
      소분류 등록
    </button>

    <!--소분류 등록 Modal -->
    <div class="modal fade" id="cate3Modal" tabindex="-1" aria-labelledby="cate3ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="cate3ModalLabel">소분류 등록</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="row">
              <div class="col">
                <select class="form-select" aria-label="대분류" id="pcode2_1">
                  <option selected disabled>대분류를 선택해주세요</option>
                  <?php
                  foreach ($cate1 as $c1) {
                  ?>
                    <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col">
                <select class="form-select" aria-label="중분류" id="pcode3">
                  <option selected disabled>대분류를 먼저 선택해주세요</option>
                </select>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" class="form-control" id="code3" name="code3" placeholder="코드명 입력">
              </div>
              <div class="col">
                <input type="text" class="form-control" id="name3" name="name3" placeholder="대분류명 입력">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn basic_btn" data-bs-dismiss="modal">닫기</button>
            <button type="submit" class="btn primary_btn" data-step="3">등록</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="category row">

    <div class="col-md-4">

      <select class="form-select" aria-label="대분류" id="cate1">
        <option selected>대분류</option>
        <?php
        foreach ($cate1 as $c1) {
        ?>

          <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>

        <?php
        }
        ?>

      </select>
    </div>
    <div class="col-md-4">

      <select class="form-select" aria-label="중분류" id="cate2">

      </select>
    </div>
    <div class="col-md-4">

      <select class="form-select" aria-label="소분류" id="cate3">

      </select>
    </div>

  </div>
</div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
$script1 = '<script src="../../js/category.js"></script>';
$script2 = '<script src="../../js/makeoption.js"></script>';
?>