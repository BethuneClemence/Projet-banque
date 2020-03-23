<?php
  require_once('views/enTete.php');
?>


<body class="register-page">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/blk-design-system/index.html" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
          <span>Ma vie•</span> Ma banque
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                BLK•
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Besoins d'aide ? </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://github.com/creativetimofficial/blk-design-system/issues">Mot de passse oublié ?</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header">
      <div class="page-header-image"></div>
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-6 offset-lg-0 offset-md-3">
              <div id="square7" class="square square-7"></div>
              <div id="square8" class="square square-8"></div>
              <div class="card card-register">
                <div class="card-header">
                  <img class="card-img" src="assets/img/square1.png" alt="Card image">
                  <h4 id="titre" class="card-title">Connexi <span style="color:#1F87F7">on</span></h4>
                </div>
                <div class="card-body">
                  <form id="form-connexion" class="form" action="<?php echo $_GLOBALS['SERVER'];?>connexion" method="POST">
                    <?php if(isset($inscriptionOk)){ ?>
                    <div class="alert alert-success" role="alert">
                      Votre compte a bien été crée, vous pouvez désormais vous connecter !
                    </div>
                    <?php } ?>
                    <?php if(isset($inscriptionKo)){ ?>
                    <div class="alert alert-danger" role="alert">
                      Oups, une erreur s'est produite... Veuillez réessayez ! 
                    </div>
                    <?php } ?>

                    <?php if(isset($echecConnexion)){ ?>
                    <div class="alert alert-danger" role="alert">
                        Votre idenfiant et/ou mot de passe est incorrect !  
                    </div>
                    <?php } ?>

                    <?php if(isset($deconexionSucces)){ ?>
                    <div class="alert alert-success" role="alert">
                      Vous avez été déconnecté avec succès ! 
                    </div>
                    <?php } ?>

                    
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-key-25"></i>
                        </div>
                      </div>
                      <input type="text" placeholder="Identifiant de compte" class="form-control" name="id_compte">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-lock-circle"></i>
                        </div>
                      </div>
                      <input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
                    </div>
                    <div class="form-check text-left">
                      <label class="form-check-label">
                        Devenez client
                        <a id="btn-inscription" href="#">c'est par là</a> !
                      </label>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="formulaireEnvoye" value="OK">
                        <a href="#" onclick="document.getElementById('form-connexion').submit();" class="btn btn-info btn-round btn-lg">Valider</a>
                    </div>
                  </form>
                  <!-- Form inscription -->
                  <form id="form-inscription" class="form" action="<?php echo $_GLOBALS['SERVER'];?>inscription" method="POST">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-single-02"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Nom" name="nom" required>
                     
                    </div>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-single-02"></i>
                        </div>
                      </div>
                      <input type="text" placeholder="Prénom" class="form-control" name="prenom" required>
                    </div>    
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-email-85"></i>
                        </div>
                      </div>
                      <input type="email" placeholder="Email" class="form-control" name="email" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-mobile"></i>
                        </div>
                      </div>
                      <input type="text" placeholder="Tél" class="form-control" name="tel" required>
                    </div>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-money-coins"></i>
                        </div>
                   </div>

                      <select id="inputState" class="form-control" name="type_compte">

                        <option disabled selected style="color:#666888">Compte</option>
                        <option value="Courant" style="color:#666888">Courant</option>
                        <option value="Epargne" style="color:#666888">Epargne</option>
                        
                      </select>
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-lock-circle"></i>
                        </div>
                      </div>
                      <input type="password" class="form-control" placeholder="Password" name="mdp" required>
                    </div>
                    <div class="card-footer">
                      <input type="hidden" name="formulaireEnvoye" value="OK">

                        <a href="#" onclick="document.getElementById('form-inscription').submit();" class="btn btn-info btn-round btn-lg">Valider</a>

                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          <div class="register-bg"></div>
          <div id="square1" class="square square-1"></div>
          <div id="square2" class="square square-2"></div>
          <div id="square3" class="square square-3"></div>
          <div id="square4" class="square square-4"></div>
          <div id="square5" class="square square-5"></div>
          <div id="square6" class="square square-6"></div>
        </div>
      </div>
    </div>
  </div>

  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function(){
        $("#form-inscription").hide();
    });

    $("#btn-inscription").click(function(){
        $("#form-inscription").show();
        $("#form-connexion").hide();
        $('#titre').html("inscripti<span style='color:#1F87F7'>on</span>");
        
    });
  </script>

  <?php

      require_once('views/pied.php');

  ?>
