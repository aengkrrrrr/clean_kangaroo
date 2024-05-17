$("#checkAlls").click(function() {
  if($("#checkAlls").is(":checked")) $("input[name=chk]").prop("checked", true);
  else $("input[name=chk]").prop("checked", false);
});

$("input[name=chk]").click(function() {
  var total = $("input[name=chk]").length;
  var checked = $("input[name=chk]:checked").length;
  
  if(total != checked) $("#checkAlls").prop("checked", false);
  else $("#checkAlls").prop("checked", true); 
});

$("#checkAll").click(function() {
  if($("#checkAll").is(":checked")) $("input[name=chks]").prop("checked", true);
  else $("input[name=chks]").prop("checked", false);
});

$("input[name=chks]").click(function() {
  var total = $("input[name=chks]").length;
  var checked = $("input[name=chks]:checked").length;
  
  if(total != checked) $("#checkAll").prop("checked", false);
  else $("#checkAll").prop("checked", true); 
});