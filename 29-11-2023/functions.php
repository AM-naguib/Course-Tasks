<?php

function valid_data($v){
    return trim(htmlentities(htmlspecialchars($v)));
}


function empty_input($value){
    return empty($value) ? true : false;
}


function min_char($value,$number){
    return (strlen($value) < $number) ? true : false;
}

function max_char($value,$number){
    return (strlen($value) > $number) ? true : false;
}

