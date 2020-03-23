<?php
    require_once('views/enTete.php');
?>

<body class="profile-page">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="0">
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
          <li class="nav-item">
            <a class="nav-link" href="../index.html"><i class="tim-icons icon-single-02"></i><?php echo " "." ".$_SESSION['Nom']."  ".$_SESSION['Prenom'].str_repeat("&nbsp",5)." |".str_repeat("&nbsp",3);?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""><i class="tim-icons icon-money-coins"></i> <?php echo "  ".$_SESSION['Solde']." "."€" ?></a>
          
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $_GLOBALS['SERVER'];?>seDeconnecter">
              <i class="fas fa-power-off"></i>
            </a>
          </li>
        </ul>
      </div>
      
    </div>
  </nav>
  
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header">
      <img src="assets/img/dots.png" class="dots">
      <img src="assets/img/path4.png" class="path">
      <div class="container align-items-center">
        <div class="row">
          <div class="col-lg-10 col-md-12 ml-auto mr-auto">
          
            <div class="card card-coin card-plain">
              <div class="card-header">
              
                <img src="assets/img/mike.jpg" class="img-center img-fluid rounded-circle">
                <h4 class="title">Transactions</h4>
              </div>
              <div class="card-body">
              
                <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#linka">
                    <i class="tim-icons icon-cart"></i>
                      Transactions
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#linkb">
                    <i class="tim-icons icon-key-25"></i>
                      Compte
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#linkc">
                    <i class="tim-icons icon-paper"></i>
                      Informations
                    </a>
                  </li>
                </ul>
                <img src="../assets/img/path4.png" class="path">
                <div class="tab-content tab-subcategories">
                  <div class="tab-pane active" id="linka">
                    <div class="table-responsive">
                      <table class="table tablesorter " id="plain-table">
                        <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              Désignation
                            </th>
                            <th class="header">
                              Montant
                            </th>
                            <th class="header">
                              Date Transaction
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php for($i = 0; $i < count($_SESSION['transactions']); $i++){?>
                          <tr>
                              <td id="libelleTransaction"><?php echo strtoupper($_SESSION ['transactions'][$i]['libelle_transaction']);?></td>
                              <td><?php echo $_SESSION ['transactions'][$i]['montant']." "."€";?></td>
                              <td><?php echo $_SESSION ['transactions'][$i]['date_transaction'];?></td>
                          
                          </tr>
                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="linkb">
                  
                
                    <div class="row ">
                      <div class="col-md-12 mt-lg-12">
                      <br>
                        <div class="row">
                          <div class="col-lg-6 col-sm-12 px-2 py-2">
                            <div class="card card-stats ">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                      <i class="tim-icons icon-trophy text-warning"></i>
                                    </div>
                                  </div>
                                  <div class="col-7 col-md-8">
                                    <div class="numbers">
                                      <p class="card-title">3,237
                                        <p>
                                          <p class="card-category">Plafond</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-12 px-2 py-2">
                            <div class="card card-stats upper bg-default">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                      <i class="tim-icons icon-coins text-white"></i>
                                    </div>
                                  </div>
                                  <div class="col-7 col-md-8">
                                    <div class="numbers">
                                      <p class="card-title"> 39
                                        <p>
                                          <p class="card-category">Solde</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-sm-12 px-2 py-2">
                            <div class="card card-stats ">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                      <i  class="fas fa-chart-line" style="font-weight:100;"></i>
                                      
                                    </div>
                                  </div>
                                  <div class="col-7 col-md-8">
                                    <div class="numbers">
                                      <p class="card-title">593
                                        <p>
                                          <p class="card-category">Dépenses mensuel</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-12 px-2 py-2">
                            <div class="card card-stats ">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                      <i class="tim-icons icon-credit-card text-success"></i>
                                    </div>
                                  </div>
                                  <div class="col-7 col-md-8">
                                    <div class="numbers">
                                      <p class="card-title">10,783
                                        <p>
                                          <p class="card-category">Carte</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                     
                  </div>
                  <div class="tab-pane" id="linkc">
                    <div class="table-responsive">
                    <h2 id="titreQuestionsFrequentes"><strong>Questions fréquentes</strong></h2>

                    <button class="accordion">Comment effectuer un versement d'espèces ?</button>
                    <div class="panel">
                      <p>Pour effectuer un versement d'espèces, il vous suffit de vous rendre, muni de vos coordonnées bancaires, dans l'une des 1900 agences du réseau LCL.
                         Vous pouvez également effectuer ce versement avec votre Carte Bleue, dans un distributeur automatique LCL qui permet les dépôts d'espèces ou de chèques.</p>
                    </div>

                    <button class="accordion">Comment déposer un chèque sur mon compte ? </button>
                    <div class="panel">
                      <p>Pour effectuer un versement d'espèces, il vous suffit de vous rendre, muni de vos coordonnées bancaires, dans l'une des 1900 agences du réseau MvMb.
                      Vous pouvez également effectuer ce versement avec votre Carte Bleue, dans un distributeur automatique LCL qui permet les dépôts d'espèces ou de chèques.</p>
                    </div>

                    <button class="accordion">Puis-je recevoir mes relevés par mail ? </button>
                    <div class="panel">
                      <p>Ma vie Ma banque vous propose de consulter gratuitement vos comptes et de télécharger, sans frais, vos relevés sous différents formats : Excel Money Quicken...
                          Vous continuerez à recevoir gratuitement un relevé de compte "papier" une fois par mois.
                          Si vous êtes détenteur d'une e.formule ou abonné de Ma vie Avertis, vous recevez également vos écritures et votre solde sur votre téléphone mobile</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>


 <?php

    require_once('views/pied.php');

?>

