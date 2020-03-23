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
                require_once('model/modele.php');
                break;

            case 'inscription':
                require_once('controllors/inscription.php');
                break;
            
            case 'connexion':
                require_once('controllors/connexion.php');
                break;

            case 'accueilApplication':
                require_once('accueilApplication.php');
                break;
            
            case 'seDeconnecter':
                require_once('controllors/seDeconnecter.php');
                break;
            
            case '404' :
                require_once('views/404.php');
        
            case 'login' :
                require_once('views/login.php');


            default:
                echo "ERROR";
        }
    }else{

        require_once('views/404.php'); 
    }

?>



