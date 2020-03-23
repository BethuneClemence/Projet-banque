<?php
//CETTE FONCTION PERMET DE SE CONNECTER A LA BASE DE DONNER EN UTILISANT LES PARAMETRES CI DESSOUS
    function connectionBD(){
        $dsn = "mysql:host=localhost;dbname=bank" ;
        $user = "root" ;
        $pwd = "" ;
        
        $options = array (
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ) ;
            
        $connection = new PDO($dsn,$user,$pwd,$options) ;
        
        return $connection ;
    }


    function inscription($nom, $prenom,$email,$tel){ // on recup les variables dans inscription.php
        $connexion = connectionBD(); // pour faire des changements dans la bdd, on lance une connexion
        if($connexion == TRUE){ // si la connexion fonctionne bien, on prepare une requete
            $connexion = $connexion->prepare("INSERT INTO utilisateur (nom, prenom, email, tel) VALUES (:nom, :prenom, :email, :tel)");
            // on stocke notre requete dans la variable $connecxion en précisant $connexion la bdd en question
            $connexion->bindParam(':nom', $nom);             // en utilisant la fonction bindParam, on indique que 
                                                        // des que on tombe sur :nom, on doit le stocker dans $nom etc
            $connexion->bindParam(':prenom', $prenom);
            $connexion->bindParam(':email', $email);
            $connexion->bindParam(':tel', $tel);
            
            $resultat = $connexion->execute(); // execution de la requete
            $connexion = NULL;
            return $resultat ;
        }
        return FALSE;
        
    }


    function getDernierClientInscrit(){
        $connexion = connectionBD(); //on a besoin de recup des infos(id de l'utilisateur), on lance une co
        if($connexion == TRUE){ //connexion se passe bien, on a acces a la bdd
            $clients = array();
            $requete = "SELECT * from utilisateur" ;
           
            $resultat = $connexion->query($requete) ; // on appel la connexion pour aller sur la bdd pour lancer la requete
            $resultat->setFetchMode(PDO::FETCH_ASSOC) ; // ouvre moi le tableau assoc avec setFetchMode() par le biais de $resultat

            $clients = $resultat->fetchAll(); // fetchAll() permet de voir l'ensemble de notre tableau
            $connexion = null ; // on passe la connexion a null pour couper et sortir
            return $clients ;

        }  
        return FALSE;
      
    }


    // la methode bindParam est utile = elle permet de proteger les données 
    // par exemple si un utilisateur veut s'inscrire et quil ecrit "bethune, cette methode ne va pas prendre en compte les caracteres speciaux
    
    function creerCarte(){ // on recup les variables dans inscription.php
        $connexion = connectionBD(); // pour faire des changements dans la bdd, on lance une connexion
        if($connexion == TRUE){ // si la connexion fonctionne bien, on prepare une requete
            $connexion = $connexion->prepare("INSERT INTO carte (numero_carte, date_expiration, code) VALUES (:numero_carte, :date_expiration,:code)");
            //generer une carte
            $numero_carte = "";
            for($i = 0; $i < 16; $i++){
                $numero = rand(0,9);
                $numero_carte = $numero_carte.$numero;
            }
            //generer un code avec la fonctionn rand()
            $code = rand(1000, 9999);
            //generer la dateExpiration en faisant appel a la fonction date qui retourne la date courante

            $jour = date('d');
            $mois = date('m');
            $annee = date('Y') + 2;

            $date_expiration = $annee."-".$mois."-".$jour;

            // on stocke notre requete dans la variable $connecxion en précisant $connexion la bdd en question
            $connexion->bindParam(':numero_carte', $numero_carte);             // en utilisant la fonction bindParam, on indique que 
                                                        // des que on tombe sur :nom, on doit le stocker dans $nom etc
            $connexion->bindParam(':date_expiration', $date_expiration);
            $connexion->bindParam(':code', $code);
            
            
            $resultat = $connexion->execute(); // execution de la requete
            $connexion = NULL;
            return $resultat ;
        }
        return FALSE;
        
    }

    function getDerniereCarteAjouter(){
        $connexion = connectionBD(); //on a besoin de recup des infos(id de l'utilisateur), on lance une co
        if($connexion == TRUE){ //connexion se passe bien, on a acces a la bdd
            $cartes = array();
            $requete = "SELECT * from carte" ;
           
            $resultat = $connexion->query($requete) ; // on appel la connexion pour aller sur la bdd pour lancer la requete
            $resultat->setFetchMode(PDO::FETCH_ASSOC) ; // ouvre moi le tableau assoc avec setFetchMode() par le biais de $resultat

            $cartes = $resultat->fetchAll(); // fetchAll() permet de voir l'ensemble de notre tableau
            $connexion = null ; // on passe la connexion a null pour couper et sortir
            return $cartes ;

        }  
        return FALSE;
      
    }

    function creerCompte($id_utilisateur, $id_carte, $mdp, $type_compte){
        $connexion = connectionBD(); // pour faire des changements dans la bdd, on lance une connexion
        if($connexion == TRUE){ // si la connexion fonctionne bien, on prepare une requete
            $connexion = $connexion->prepare("INSERT INTO compte (id_utilisateur, id_carte, type_compte,mdp) VALUES (:id_utilisateur, :id_carte, :type_compte, :mdp)");
            // on stocke notre requete dans la variable $connecxion en précisant $connexion la bdd en question
            $connexion->bindParam(':id_utilisateur', $id_utilisateur);             // en utilisant la fonction bindParam, on indique que 
                                                        // des que on tombe sur :nom, on doit le stocker dans $nom etc
            $connexion->bindParam(':id_carte', $id_carte);
            $connexion->bindParam(':type_compte', $type_compte);
            $connexion->bindParam(':mdp', $mdp);
            
            $resultat = $connexion->execute(); // execution de la requete
            $connexion = NULL;
            return $resultat ;
        }
        return FALSE;

    }


    function seConnecterApplication($id_compte, $mdp){
        $connexion = connectionBD();
        if($connexion == TRUE){

            $utilisateur = array();
              $requete = "select *";
              $requete .= " from compte as c inner join utilisateur as u";
              $requete .= " on c.id_utilisateur = u.id_utilisateur";
              $requete .= " inner join carte as ca";
              $requete .= " on ca.id_carte = c.id_carte";
              $requete .= " where id_compte ='$id_compte' and mdp ='$mdp';";
                
            $resultat = $connexion->query($requete) ; // on appel la connexion pour aller sur la bdd pour lancer la requete
            $resultat->setFetchMode(PDO::FETCH_ASSOC) ; // ouvre moi le tableau assoc avec setFetchMode() par le biais de $resultat

            $utilisateur = $resultat->fetchAll(); // fetchAll() permet de voir l'ensemble de notre tableau
            $connexion = null ; // on passe la connexion a null pour couper et sortir
            return $utilisateur ;


        }
        else return FALSE;

    }


    function getTransaction($id_carte){
        $connexion = connectionBD();
        if($connexion == TRUE){

            $transaction = array();
              $requete = "select *";
              $requete .= " from transaction";
              $requete .= " where id_carte = $id_carte";
            
                
            $resultat = $connexion->query($requete) ; // on appel la connexion pour aller sur la bdd pour lancer la requete
            $resultat->setFetchMode(PDO::FETCH_ASSOC) ; // ouvre moi le tableau assoc avec setFetchMode() par le biais de $resultat

            $transaction = $resultat->fetchAll(); // fetchAll() permet de voir l'ensemble de notre tableau
            $connexion = null ; // on passe la connexion a null pour couper et sortir
            return $transaction ;


        }
        else return FALSE;

    }

    //recuperer la table utilisateur
    // boucler sur l'ensemble des ID _tilisateur
    //les recuperer et a chaque fois les stocker quelque part pour les réutiliser
    //

  
    