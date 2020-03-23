<?php
    if(isset($_POST['formulaireEnvoye']) && $_POST['formulaireEnvoye'] == "OK"){

        if(isset($_POST['id_compte'])){
            $id_compte=$_POST['id_compte'];
        }

        if(isset($_POST['mdp'])){
            $mdp=$_POST['mdp'];
        }

        require_once('model/modele.php');
        $unUtilisateur = seConnecterApplication($id_compte,$mdp);

        $id_carte = $unUtilisateur[0]['id_carte'];

        if (!empty($unUtilisateur)) {
           
           session_start();
           $_SESSION['Solde'] = $unUtilisateur [0]['solde'];
           $_SESSION['Nom'] = $unUtilisateur [0]['nom'];
           $_SESSION['Prenom'] = $unUtilisateur [0]['prenom'];
           $_SESSION['transactions'] = getTransaction($id_carte);
           
           
           //echo $id_carte;
           //var_dump(getTransaction($id_carte));
           require_once('views/accueilApplication.php');

        } else {
            $echecConnexion = TRUE;
            require_once('views/login.php');
        }
    }
    else require_once('views/404.php');

    
    //$transactions = getTransaction($id_carte);
    




        