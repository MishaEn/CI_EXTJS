<?php
    function pretty_print($in,$opened = false){
        if($opened)
            $opened = ' open';
        if(is_object($in) or is_array($in)){
            echo '<div>';
            echo '<details'.$opened.'>';
            echo '<summary>';
            echo (is_object($in)) ? 'Object {'.count((array)$in).'}':'Array ['.count($in).']';
            echo '</summary>';
            pretty_print_rec($in, $opened);
            echo '</details>';
            echo '</div>';
        }
    }
    function pretty_print_rec($in, $opened, $margin = 10){
        if(!is_object($in) && !is_array($in))
            return;

        foreach($in as $key => $value){
            if(is_object($value) or is_array($value)){
                echo '<details style="margin-left:'.$margin.'px" '.$opened.'>';
                echo '<summary>';
                echo (is_object($value)) ? $key.' {'.count((array)$value).'}':$key.' ['.count($value).']';
                echo '</summary>';
                pretty_print_rec($value, $opened, $margin+10);
                echo '</details>';
            }
            else{
                switch(gettype($value)){
                    case 'string':
                        $bgc = 'red';
                        break;
                    case 'integer':
                        $bgc = 'green';
                        break;
                    case 'array':
                        $bgc = 'blue';
                        break;
                    case 'boolean':
                        $bgc = '#B30060';
                        break;
                    default:
                        $bgc = 'gray';
                        break;
                }
                echo '<div style="margin-left:'.$margin.'px">'.$key . ' : <span style="color:'.$bgc.'">' . $value .'</span> ('.gettype($value).')</div>';
            }
        }
    }
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);


    define('ROOTDIR', __DIR__.'/application');
    define('ROOTCONFIG', __DIR__.'/application/config');
    define('ROOTCONTROLLERS', __DIR__.'/application/app/controllers');
    define('ROOTKERNEL', __DIR__ . '/application/kernel');
    define('ROOTMODELS', __DIR__.'/application/app/models');
    define('ROOTVIEWS', __DIR__.'/application/app/views');
    define('ROOTPUBLIC', __DIR__.'/public');
    $ip = ['127.1.1.1', '92.38.11.252', '178.76.229.90', '193.111.3.246'];
    if(!in_array($_SERVER['REMOTE_ADDR'], $ip)){
        header('Location: http://dedal-service.ru');
    }



    include_once ROOTDIR.'/bootstrap.php';