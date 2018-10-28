$(document).ready(function () {
    $('#date_from').datepicker({
        //オプション
        todayHighlight : false,
        autoclose : true,
        keyboardNavigation : false,
        format: 'yyyy/mm/dd'
    });

    $('#date_to').datepicker({
        //オプション
        todayHighlight : false,
        autoclose : true,
        keyboardNavigation : false,
        format: 'yyyy/mm/dd'
    });

    $(document).on('change', ':file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().next(':text').val(label);
    });
});
