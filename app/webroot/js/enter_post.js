$('.new-comment').keydown(function (event) {
    var keypressed = event.keyCode || event.which;
    if (keypressed == 13) {
        $(this).closest('form').submit();
    }
});

$('#new-message').keydown(function (event) {
    var keypressed = event.keyCode || event.which;
    if (keypressed == 13) {
        $(this).closest('form').submit();
    }
});
$('.addNote').click(function(event){
    $(this).closest('form').submit();

});