$(".select_all").change(function() {
  let $this = $(this);
  let parentform = $this.closest('form');


  if( $this.is(":checked")) {    
    parentform.find('.select_lecture input').prop("checked", true);
  }  else {
    parentform.find('.select_lecture input').prop("checked", false)
  };
});
