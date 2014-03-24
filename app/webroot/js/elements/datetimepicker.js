$(document).ready(function() {
    $('.datetimepicker').datetimepicker({
        language: language.substr(0,2),
        weekStart: 1,
        pickSeconds: false,
        format: 'dd.MM.yyyy hh:ss'
    });

    $('.datepicker').datetimepicker({
        language: language.substr(0,2),
        weekStart: 1,
        pickTime: false,
        format: 'dd.MM.yyyy'
    });

    $('.timepicker').datetimepicker({
        language: language.substr(0,2),
        weekStart: 1,
        pickDate: false,
        pickSeconds: false,
        format: 'hh:ss'
    });
});
