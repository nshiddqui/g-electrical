$(function () {
    //Initialize Select2 Elements
    $('.select2').select2({width: '100%'});
    $('input[datepicker]').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    })
});