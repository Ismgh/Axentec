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
                    <li><a href="formation" class="tooltipped" data-position="bottom"  data-tooltip="mes formations">
                        <i class="material-icons">book</i> 
                    </a></li>
                    <li><a href="utilisateur" class="tooltipped"  data-position="bottom"  data-tooltip="mon compte">
                        <i class="material-icons">account_circle</i>
                    </a></li>
                    <li><a href="#" class="tooltipped  active"  data-position="bottom"  data-tooltip="contacter l'administrateur">
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
            <li><a href="formation" class="tooltipped active"  data-position="right"  data-tooltip="formation">
                <i class="material-icons">book</i>mes formations 
            </a></li>
            <li><a href="utilisateur" class="tooltipped" data-position="right"  data-tooltip="utilisateur">
                <i class="material-icons">account_circle</i>mon compte
            </a></li>
            <li><a href="#" class="tooltipped  active" data-position="right"  data-tooltip="contact">
                <i class="material-icons">phone</i>contacter admin
            </a></li> 
            <li><a href="logout" class="tooltipped" data-position="right"  data-tooltip="se deconnecter">
                <i class="material-icons">exit_to_app</i>se deconnecter</a>
            </li>
        </ul><!--/navbar mobile--> 
        <div  id="etudiant" class="wallpaper">
        <div class="container">
            <div class="row">
                <br>
                <h4 class="center"><i class="material-icons">phone</i> contacter l'administrateur</h4><br>
                <div class="col l8 m6 s12" style="color:black"><!--le formulaire-->
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row valign-wrapper"><!-- notice the "circle" class -->
                        <form class="col s12" method="post" action="contact">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="nom_prenom" name="nom_prenom" type="text" class="validate" required>
                                <label for="nom_prenom">nom & prenom <span class="badge  new orange"><?php if(isset($_POST["erreur"])) echo $_POST["erreur"]; ?></span></label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mail</i>
                                <input id="email" placeholder="" name="email" type="email" class="validate" value="<?= $_SESSION["utilisateur"]["email_utilisateur"]?> " required>
                                <label for="email">votre email</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input id="telephone" name="telephone" type="text" class="validate" required>
                                <label for="telephone">num de telephone</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="message" name="message" class="materialize-textarea" style="height:180px;" required></textarea>
                                <label for="message">le message</label>
                            </div>
                            <div class="input-field col s11 offset-s1">
                                <button class="btn waves-effect waves-light" type="submit" name="action">envoyer
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>  
                        </form>
                        </div>
                    </div>  
                </div><!--.col (le formulaire) /--> 
                <div class="col l4 m6 s12"><!--information de contact-->
                    <div class="card-panel grey lighten-5 z-depth-1"><!-- telephone-->
                        <div class="row valign-wrapper"><!-- notice the "circle" class -->
                            <div class="col s2">
                                <i class="material-icons" style="font-size: 25px; color: black;">phone</i>
                            </div>
                            <div class="col s10">
                                <span class="black-text">
                                    +212 6 80 41 38 93
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-panel grey lighten-5 z-depth-1"><!-- mail-->
                        <div class="row valign-wrapper"><!-- notice the "circle" class -->
                            <div class="col s2">
                                <i class="material-icons" style="font-size: 25px; color: black;">mail</i>
                            </div>
                            <div class="col s10">
                                <span class="black-text">
                                    axentec2013@gmail.com
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-panel grey lighten-5 z-depth-1"><!-- location-->
                        <div class="row valign-wrapper"><!-- notice the "circle" class -->
                            <div class="col s2">
                                <i class="material-icons" style="font-size: 25px; color: black;">location_on</i>
                            </div>
                            <div class="col s10">
                                <span class="black-text">
                                    Avenue Moulay Abdelah - Rési dence AHLAM
                                    B2 - Appartement Ol- RDC
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!--.col (l'adress) /-->    
            </div><!--.row/--> 
        </div><!--.container/-->
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