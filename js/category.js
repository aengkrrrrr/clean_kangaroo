let categorySubmitBtn = $(".modal button[type='submit']");

  categorySubmitBtn.click(function() {
    let step = $(this).attr('data-step');
    save_category(step);
  });

  function save_category(step) {
    let code = $(`#code${step}`).val();
    let name = $(`#name${step}`).val();
    let pcode = $(`#pcode${step} option:selected`).val();

    if (step > 1 && !pcode) {
      alert('부모 분류를 선택하세요');
      return;
    }
    if (!code) {
      alert('분류코드를 입력하세요');
      return;
    }
    if (!name) {
      alert('분류명을 입력하세요');
      return;
    }

    let data = {
      name: name,
      code: code,
      pcode: pcode,
      step: step
    }
    console.log(data);
    $.ajax({
      async: false,
      type: 'post',
      data: data,
      url: "save_category.php",
      dataType: 'json',
      error: function(error) {
        console.log(error);
      },
      success: function(data) {
        console.log(data.result, typeof(data.result));
        
        if (data.result === 1) {
          alert('등록 성공');
          location.reload(); // 새로고침
        } else if (data.result === '-1') {
          alert('코드가 중복됩니다.');
          location.reload(); //강제 새로고침
        } else if (data.result === 'members') {
          alert('관리자가 아닙니다.');
          location.href = '/clean_kangaroo/admin/login/login.php';
        } else {
          alert('등록 실패');
          location.reload(); // 새로고침
        }
      }
    }); //ajax
  }