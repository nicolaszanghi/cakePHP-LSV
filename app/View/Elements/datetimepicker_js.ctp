<?php
$lang = substr(Configure::read('Config.language'), 0, -1);
$this->Html->scriptBlock("
$(document).ready(function() {
    $('.datetimepicker').datetimepicker({
        language: '$lang',
        weekStart: 1,
        pickSeconds: false
    });
    $('.datepicker').datetimepicker({
        language: '$lang',
        weekStart: 1
        pickTime: false
    });
    $('.timepicker').datetimepicker({
        language: '$lang',
        weekStart: 1,
        pickDate: false,
        pickSeconds: false
    });
});
", array('inline'=>false));
