<?php

    $url = $_SERVER['REQUEST_URI'];
    $url = explode('/', $url);
    $_GLOBALS['SERVER'] = "http://127.0.0.1/Banque/"; 
    if(count($url) == 3){

        $route = $url[count($url) - 1];

        switch($route){

            case '':
                require_once('views/login.php');
                break;

            case 'profile':
                echo "Profile";
                break;

            default:
                echo "ERROR 404";
        }
    }else{

        echo "ERROR 404"; 
    }

?>



