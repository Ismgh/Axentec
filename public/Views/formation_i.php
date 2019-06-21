<html>
    <head>
        <!--french caractéres-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--Compiled and minified CSS-->
        <link rel="stylesheet" href="http://localhost/Axentec/public/src/materialize/css/materialize.min.css">
        <!--le fichier CSS-->
        <link rel="stylesheet" href="http://localhost/Axentec/public/src/css/custom.css">
        <!--les icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Compiled and minified JavaScript-->
        <script src="http://localhost/Axentec/public/src/materialize/js/materialize.min.js"></script>
        <title>administrateur</title>
    </head>
    <body> 
        <nav style="margin-bottom:25px;"><!--navbar desktop-->
            <div class="nav-wrapper orange" >
                <a href="index.php" class="brand-logo tooltipped hide-on-med-and-down" data-position="bottom"  data-tooltip="<?php echo $_SESSION['utilisateur']['user']; ?> | <?php echo $_SESSION['utilisateur']['email_utilisateur']; ?>">
                    <img style="width:63px;" class="circle" src="../src/pics/user.png">
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <?php 
                        if($_SESSION["utilisateur"]["approuver"]==0) 
                        {// verifier si l'etudiant est approuver par l'administrateur
                    ?>
                    <li><a href="#" class="tooltipped"  data-position="bottom"  data-tooltip="pas encore approuver"><i class="material-icons" style="color:red">close</i></a></li>
                    <?php 
                        }
                        else
                        {
                    ?>
                    <li><a href="#" class="tooltipped"  data-position="bottom"  data-tooltip="vous ete approuver"><i class="material-icons" style="color:green">done_all</i></a></li>
                    <?php 
                        }
                    ?>
                    <li><a href="#" class="tooltipped active" data-position="bottom"  data-tooltip="mes formations">
                        <i class="material-icons">book</i> 
                    </a></li>
                    <li><a href="utilisateur" class="tooltipped"  data-position="bottom"  data-tooltip="mon compte">
                        <i class="material-icons">account_circle</i>
                    </a></li>
                    <li><a href="contact" class="tooltipped"  data-position="bottom"  data-tooltip="contacter l'administrateur">
                        <i class="material-icons">phone</i>
                    </a></li> 
                    <li><a href="logout" class="tooltipped" data-position="left"  data-tooltip="se deconnecter">
                        <i class="material-icons">exit_to_app</i></a>
                    </li>
                </ul>
            </div>
        </nav><!--/navbar desktop-->
        <ul class="sidenav" id="mobile-demo"><!--navbar mobile-->
            <li><div class="user-view">
                <div class="background">
                <img src="../src/pics/header.png">
                </div>
                <a href="#user"><img class="circle" src="../src/pics/user.png"></a>
                <a href="#name"><span class="white-text name"><?php echo $_SESSION["utilisateur"]["user"]; ?></span></a>
                <a href="#email"><span class="white-text email"><?php echo $_SESSION["utilisateur"]["email_utilisateur"]; ?></span></a>
            </div></li>
            <?php 
                if($_SESSION["utilisateur"]["approuver"]==0) 
                {// verifier si l'etudiant est approuver par l'administrateur
            ?>
            <li><a href="#" class="tooltipped"  data-position="right"  data-tooltip="pas encore approuver"><i class="material-icons" style="color:red">close</i>pas encore approuver</a></li>
            <?php 
                }
                else
                {
            ?>
            <li><a href="#" class="tooltipped"  data-position="right"  data-tooltip="pas encore approuver"><i class="material-icons" style="color:green">done_all</i>vous ete approuver</a></li>
            <?php 
                }
            ?>
            <li><a href="#" class="tooltipped active"  data-position="right"  data-tooltip="formation">
                <i class="material-icons">book</i>mes formations 
            </a></li>
            <li><a href="utilisateur" class="tooltipped" data-position="right"  data-tooltip="utilisateur">
                <i class="material-icons">account_circle</i>mon compte
            </a></li>
            <li><a href="contact" class="tooltipped" data-position="right"  data-tooltip="contact">
                <i class="material-icons">phone</i>contacter admin
            </a></li> 
            <li><a href="logout" class="tooltipped" data-position="right"  data-tooltip="se deconnecter">
                <i class="material-icons">exit_to_app</i>se deconnecter</a>
            </li>
        </ul><!--/navbar mobile--> 
        <div  id="etudiant" class="wallpaper" style="height:auto;">
            <?php 
                if($_SESSION["utilisateur"]["approuver"]==0) 
                {// verifier si l'etudiant est approuver par l'administrateur
            ?>
            <br>
            <div class="container"><br>
                <h4 class="center">bonjour <?= $_SESSION["utilisateur"]["user"]; ?> :
                    <small>
                        votre compte n'est pas encore approuver par l'administrateur c'est à dire il y'a deux possibilitées
                    </small>
                </h4><br>
                <h6 style="color:black"> 
                    <div class="row card-panel grey lighten-5 z-depth-1">
                        <div class="col s1">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="col s11">
                            <b> vous n'avez pas payez les frais de la formation </b> donc vous
                            deverez <a href="etudiant_i/contact_i">contacter</a> la société Axentec pour descuter avec eux le prix et savoire si il 
                            y'a des réductions ensuite vous devrez payez les frais de votre dossier, Axentec va descutrer avec vous comment vous pouvez payer
                            (les différents méthodes de payement).<br>
                        </div>
                    </div><br><br>
                    <div class="row card-panel grey lighten-5 z-depth-1">
                        <div class="col s1">
                        <i class="material-icons">hotel</i>
                        </div>
                        <div class="col s11">
                            <b> vous avez payez les frais de la formation </b> donc vous devrez relaxez car la procedure
                            d'approuver un etudiant peut prendre du temp et vérifier aprés quelque jours si votre compte est approuvée sinon si le temp depasse 10 jours contacter l'administrateur
                            pour régler se probléme.
                        </div>
                    </div> 
                </h6>
            </div>
            <?php 
                }
                else
                {
            ?>
            <div class="container">
                <div class="row"><br>
                <h4 class="center"><i class="material-icons">book</i> mes formations</h4><br>
                <?php
                    $etudiant_formations=$_POST["etudiant_formations"];
                    while($row=$etudiant_formations->fetch())
                    {
                ?>
                    <div class="col l4 m6 s12"><!--formation-->
                        <div class="card" style="box-shadow : gray 1px 1px 15px;"><!--card-->
                            <div class="card-image waves-effect waves-block waves-light"><!--le titre-->
                                <img src="<?php echo $row["image_formation"];?>"><!--image principale-->
                                <span class="card-title" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;text-shadow:black 1px 1px 13px;"><?php echo $row["titre_formation"];?></span>
                            </div>
                            <div class="card-content" style="overflow-x: auto;">
                                <table class="striped">
                                    <tr>
                                        <th style="font-size:15px">nombre_sceance_present</th>
                                        <td style="font-size:15px"><?php echo $row["nombre_sceance_present"];?></td>
                                    </tr>
                                    <tr>
                                        <th style="font-size:15px">nombre_sceance_absent</th>
                                        <td style="font-size:15px"><?php echo $row["nombre_sceance_absent"];?></td>
                                    </tr>
                                    <tr>
                                        <th style="font-size:15px">nombre_heures_par_seance</th>
                                        <td style="font-size:15px"><?php echo $row["nombre_heures_par_seance"];?></td>
                                    </tr>
                                    <?php 
                                        if ($row["seance_1"]!="") 
                                        {//vérifier si les seances sont vides
                                    ?>
                                    <tr>
                                        <th style="font-size:15px"> seance_1 </th>
                                        <td style="font-size:15px"><?php echo $row["seance_1"];?></td>
                                    </tr>
                                    <?php 
                                        }
                                        if ($row["seance_2"]!="") 
                                        {//vérifier si les seances sont vides
                                    ?>
                                    <tr>
                                        <th style="font-size:15px"> seance_2 </th>
                                        <td style="font-size:15px"><?php echo $row["seance_2"];?></td>
                                    </tr>
                                    <?php 
                                        }
                                        if ($row["seance_3"]!="") 
                                        {//vérifier si les seances sont vides
                                    ?>
                                    <tr>
                                        <th style="font-size:15px"> seance_3 </th>
                                        <td style="font-size:15px"><?php echo $row["seance_3"];?></td>
                                    </tr>
                                    <?php 
                                        }
                                        if ($row["seance_4"]!="") 
                                        {//vérifier si les seances sont vides
                                    ?>
                                    <tr>
                                        <th style="font-size:15px"> seance_4 </th>
                                        <td style="font-size:15px"><?php echo $row["seance_4"];?></td>
                                    </tr>
                                    <?php 
                                        }
                                        if ($row["seance_5"]!="") 
                                        {//vérifier si les seances sont vides
                                    ?>
                                    <tr>
                                        <th style="font-size:15px"> seance_5 </th>
                                        <td style="font-size:15px"><?php echo $row["seance_5"];?></td>
                                    </tr>
                                    <?php 
                                        }
                                        if ($row["seance_6"]!="") 
                                        {//vérifier si les seances sont vides
                                    ?>
                                    <tr>
                                        <th style="font-size:15px"> seance_6 </th>
                                        <td style="font-size:15px"><?php echo $row["seance_6"];?></td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                    <tr>
                                        <th style="font-size:15px"> groupe </th>
                                        <td style="font-size:15px"><?php echo $row["id_groupe"];?></td>
                                    </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div><!--/card-->
                    </div><!--.col (une formation) /--> 
                    <?php
                        }//fin de la boucle des formations
                    ?>  
                    </div><!--.row/--> 
                </div><!--.container/-->
                <?php 
                    }//fin else
                ?>
        </div><!--.wallpaper/-->
        <footer class="page-footer orange" style="width:100%;"><!--footer-->
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Qui Sommes-nous?</h5>
                <p class="grey-text text-lighten-4">
                    Le centre de formation professionnell e A X E N T E C
                    est situé à Avenue Moulay Abdelah - Rési dence AHLAM
                    B2 - Appartement 6- 2 éme étage- sur Marrakech Inaugure en décembre 2013, le centre offre quatre programmes
                    services :<br>
                    $-Formation en informatique<br>
                    $-Formation professionnelle<br>
                    $-Formation de Langues vivantes<br>
                    $-Cours de soutien
                </p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">des liens utiles</h5>
                <ul>
                <li><a href="contact" style="color:black;">$-contacter nous et avoir notre address.</a></li>
                <li><a href="travaille_stage" style="color:black;">$-vous voulez faire un stage où bien travailler avec nous.</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2019 axentec.com
            <a class="grey-text text-lighten-4 right" href="http://ismgh.ml">
                &#119967; designed by ismgh.ml
            </a>
            </div>
          </div>
        </footer><!--/footer-->
        <script>
            document.addEventListener('DOMContentLoaded', function() 
            {//tooltip script
                var elems = document.querySelectorAll('.tooltipped');
                var instances = M.Tooltip.init(elems, margin=4); 
            }); 
            document.addEventListener('DOMContentLoaded', function() 
            {//navbar script
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems, preventScrolling=false);
            });  
            document.addEventListener('DOMContentLoaded', function() 
            {//dropdown script
                var elems = document.querySelectorAll('.dropdown-trigger');
                var instances = M.Dropdown.init(elems, hover=true);
            });        
        </script>
    </body>
</html>