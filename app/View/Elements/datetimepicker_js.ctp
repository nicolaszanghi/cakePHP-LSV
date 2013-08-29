<?php
$lang = substr(Configure::read('Config.language'), 0, -1);
$this->Html->scriptBlock("
$(document).ready(function() {
    $('.datetimepicker').datetimepicker({
        language: '$lang',
        weekStart: 1
    });
});
",array('inline'=>false));