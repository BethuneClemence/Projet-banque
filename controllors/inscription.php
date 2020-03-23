<?php

    if(isset($_POST['formulaireEnvoye']) && $_POST['formulaireEnvoye'] == "OK"){


        if(isset($_POST['nom'])){ //si il existe quelque chose dans $_POST['nom'] (dans ce quon recup), on le stock dans $nom
            $nom=$_POST['nom'];
        }

        if(isset($_POST['prenom'])){
            $prenom=$_POST['prenom'];
        }

        if(isset($_POST['email'])){
            $email=$_POST['email'];
        }

        if(isset($_POST['tel'])){
            $tel=$_POST['tel'];
        }

        if(isset($_POST['mdp'])){
            $mdp=$_POST['mdp'];
        }

        if(isset($_POST['type_compte'])){
            $type_compte=$_POST['type_compte'];
        }

    
        
        
        require_once('model/modele.php'); // on fait appel a notre page modele.php pour avoir acces aux variables etc
        // consernant le client ==> insertion avec la fonction getDernierClient et recuperation de son ID pour ensuite créer un compte

        $resultat = inscription($nom, $prenom, $email, $tel); // on stocke nos variables dans $resultat
        $clients = getDernierClientInscrit(); // $clients : on fait appel a la fonction pour recuperer le tableau entier des inscrits
        $dernierInscrit = $clients[count($clients)-1]; // par le biai d'un count() de notre tableau - 1 on accede au dernier élement de notre tableau
        $idDernierClientInscrit = ($dernierInscrit["id_utilisateur"]); // on recupere de ce dernier inscrit seulement son identifiant

        // consernant le client, creation d'une carte
        $carte = creerCarte();
        // recuperation de l'identifiant de la carte
        $cartes = getDerniereCarteAjouter();
        $derniereCarteAjouter = $cartes[count($cartes)-1];
        $idDerniereCarte = ($derniereCarteAjouter["id_carte"]);
        

        //Creer un compte

        

        $compte = creerCompte($idDernierClientInscrit, $idDerniereCarte, $mdp, $type_compte);

        if($resultat == TRUE){ // si $resultat n'est pas vide, on cree une variabke inscriptionOk qui va nous servir a afficher un msg sur notre page
            $inscriptionOk = TRUE;
            require_once('views/login.php');

        }else{
            $inscriptionKo = TRUE;
            require_once('views/login.php');
        }

    }
    else echo "permission non accordee";
