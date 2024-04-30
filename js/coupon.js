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
