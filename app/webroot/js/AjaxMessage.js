$(function() {
    $("#TaskAddForm").submit(function() {
      $.post('/tasks/ajax_add', {
        title: $("#TaskTitle").val()
      }, function(rs) {
        $("#tasks").prepend(rs);
        $("#TaskTitle").val('').focus();
      });
    });
});