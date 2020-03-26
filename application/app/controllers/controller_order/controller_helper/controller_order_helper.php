<?php
function humanity_date($date){
    $explode_date = explode('-', $date);
    $year = $explode_date[0];
    $month = $explode_date[1];
    $day =  $explode_date[2];
    if($day[0] == 0){
        $day = $day[1];
    }
    switch ($month){
        case '01':
            $month = 'января';
            break;
        case '02':
            $month = 'февраля';
            break;
        case '03':
            $month = 'марта';
            break;
        case '04':
            $month = 'апреля';
            break;
        case '05':
            $month = 'мая';
            break;
        case '06':
            $month = 'июня';
            break;
        case '07':
            $month = 'июля';
            break;
        case '08':
            $month = 'августа';
            break;
        case '09':
            $month = 'сентября';
            break;
        case '10':
            $month = 'октября';
            break;
        case '11':
            $month = 'ноября';
            break;
        case '12':
            $month = 'декабря';
            break;
    }
    return $day.' '.$month.' '.$year.' г.';
}