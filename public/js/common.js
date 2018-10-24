$(function(){
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
});
