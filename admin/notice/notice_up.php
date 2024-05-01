<?php
session_start();
$title = "공지사항 관리";
$css1 = '<link rel="stylesheet" href="../../css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';
$sql = "SELECT * FROM product_category where step = 1";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
  $cate1[] = $row;
}
?>
  <!----------- 헤더 -->
<body>
<div class="notice_container">
  <h3>공지사항 등록</h3>
  <form action="notice_ok.php" method="POST" enctype="multipart/form-data" id="product_save">
    <input type="hidden" name="product_image" id="product_image_id">
    <input type="hidden" name="contents" id="contents">
  <ul>
      <p class="form-label">카테고리</p>
      <li class="category">
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
      <select class="form-select" aria-label="중분류" id="cate2">

      </select>
      </li>
    </ul>
<ul>
  <li>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput_title" placeholder="제목">
      <label for="floatingInput_title">제목</label>
    </div>
  </li>
  <li>
      <div class="form-floating textarea">
        <textarea class="form-control" placeholder="공지 설명" id="floatingTextarea"></textarea>
        <label for="floatingTextarea" hidden>공지 설명</label>
      </div>   
  </li>
</ul>
<ul>
  <li><div class="mb-3">
    <label for="formFile" class="form-label">이미지 업로드</label>
    <input class="form-control" type="file" id="formFile">
  </div></li>
</ul>
<ul>
  <li class="btn_collect">
    <button class="primary_btn">등록 완료</button>
    <button class="basic_btn">닫기</button>
  </li>
</ul>
</div>

</body>
<!-- 스크립트 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="/clean_kangaroo/js/makeoption.js"></script>
<script>
    $(document).ready(function() {
     $('#product_save').on('submit', save);
  } );

    //추가 이미지 등록
    $('#addImage').click(function() {
      $('#upfile').trigger('click');
    });
    $('#upfile').change(function() {
      let files = $(this).prop('files');
      console.log(files);
      for (let i = 0; i < files.length; i++) {
        attachFile(files[i]);
      }
      $('#upfile').val('');
    });

    function attachFile(file) {
      var formData = new FormData();
      formData.append('savefile', file); //<input name="savefile" value="파일명">

      $.ajax({
        url: 'lecture_save_image.php',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        type: 'POST',
        success: function(return_data) {
          console.log(return_data);
          if (return_data.result == 'size') {
            alert('10메가 이하만 첨부할수 있습니다.');
            return; //함수 종료(빈값을 리턴);
          } else if (return_data.result == 'image') {
            alert('이미지만 첨부할 수 있습니다.');
            return;
          } else if (return_data.result == 'error') {
            alert('파일 첨부 실패, 관리자에게 문의하세요');
            return;
          } else {
            let imgid = $('#product_image_id').val() + return_data.imgid + ',';
            $('#product_image_id').val(imgid);
            let html = `
                <div class="card" style="width: 200px height: 120px;" id="${return_data.imgid}">
<div class="image_preview">
<img src="/clean_kangaroo/admin/upload/${return_data.savefile}" class="img-fluid" alt="...">
                  <button type="button" class="primary_btn del">이미지 삭제</div></button>
                </div>
              `;

            $('#addedimages').append(html);
          }
        }
      });
    }

    $('#addedimages').on('click', 'button', function() {
      let imgid = $(this).parent().attr('id');
      file_delete(imgid);
    });

    function file_delete(imgid) {
      if (!confirm('정말 삭제할까요?')) {
        return false;
      }
      let data = {
        imgid: imgid
      }
      $.ajax({
        async: false, //결과가 있으면 반영해줘
        type: 'POST',
        url: 'image_delete.php',
        data: data,
        dataType: 'json',
        error: function(error) {
          console.log('error:', error);
        },
        success: function(return_data) {
          if (return_data.result === 'member') {
            alert('권한이 없습니다.');
            return;
          } else if (return_data.result === 'mine') {
            alert('본인이 등록한 이미지만 삭제할 수 있습니다.');
            return;
          } else if (return_data.result === 'fail') {
            alert('삭제 실패!');
            return;
          } else {
            $('#' + imgid).remove();
          }
        }
      });
    };
  </script>
<!-------------------- 스크립트 -->
</html>