$(document).ready(function(){
    $('#date_label').on('click', function(){
        $('#date_picker_form').css('display', 'block');
        $('#date_label').css('display', 'none');
    });

    $('#date_form_submit').on('click', function () {
        if ($('#date_start').val().length == 0 || $('#date_start').val().length == 0) {
            alert('Date range is not set');

            return false;
        }
    });
});