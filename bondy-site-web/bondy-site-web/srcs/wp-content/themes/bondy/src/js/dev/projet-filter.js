$(document).ready(function(){

    $('.date-apartir').datepicker(
        {
            dateFormat: "dd/mm/yy",
            onClose: function (date) {
                var date2 = $('.date-apartir').datepicker('getDate');
                date2.setDate(date2.getDate() + 1);
                $('.date-anterieur').datepicker('option', 'minDate', date2);
            }
        }
    );
    $('.date-anterieur').datepicker(
        {
            dateFormat: "dd/mm/yy",
            onClose: function () {
                var dt1 = $('.date-apartir').datepicker('getDate');
                var dt2 = $('.date-anterieur').datepicker('getDate');
                //check to prevent a user from entering a date below date of dt1
                if (dt2 <= dt1) {
                    var minDate = $('.date-anterieur').datepicker('option', 'minDate');
                    $('.date-anterieur').datepicker('setDate', minDate);
                }
            }
        }
    );
})