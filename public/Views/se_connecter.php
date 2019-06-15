<html>
    <head>
        <!--french caractéres-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--Compiled and minified CSS-->
        <link rel="stylesheet" href="http://localhost/Axentec/public/src/materialize/css/materialize.min.css">
        <!--le fichier CSS-->
        <link rel="stylesheet" href="../custom_files/css/custom.css">
        <!--les icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Compiled and minified JavaScript-->
        <script src="http://localhost/Axentec/public/src/materialize/js/materialize.min.js"></script>
        <title>Axentec</title>
    </head>
    <body>
        <nav style="margin-bottom:25px;"><!--navbar desktop-->
            <div class="nav-wrapper orange" >
                <a href="index.php" class="brand-logo tooltipped" data-position="bottom"  data-tooltip="Logo#Axentec">
                    <img  style="height:100%;width:110px;" src="https://yt3.ggpht.com/a/AGF-l7-g_NuaapZdmddVVS-RditpOF6eGdMsptZb2g=s288-mo-c-c0xffffffff-rj-k-no">
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="tooltipped" href="index.php" data-position="bottom"  data-tooltip="page principale"><!--home-->
                        <i class="material-icons" style="font-size: 25px;">home</i>
                    </a></li>
                    <li><a class="tooltipped" href="travaille_stage" data-position="bottom"  data-tooltip="stage/travaille"><!--offres de satages/travaille-->
                        <i class="material-icons" style="font-size: 25px;">business_center</i>
                    </a></li>
                    <li><a class="tooltipped dropdown-trigger"  data-position="bottom" data-target="type_de_formation_desktop"  data-tooltip="type de formation"><!--recherche par catégorie-->
                        <i class="material-icons" style="font-size: 25px;">widgets</i>
                    </a></li>
                    <li><!--search bar-->
                        <form action="recherche" action="get">
                            <div class="input-field">
                                <input name="s" id="search" type="search" placeholder="faire une recherche" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </li><!--/search bar-->
                    <li><a class="tooltipped" href="contact" data-position="bottom"  data-tooltip="contact"><!--contact-->
                        <i class="material-icons" style="font-size: 25px;">phone</i>
                    </a></li>
                    <li><a class="tooltipped" href="se_connecter" data-position="left"  data-tooltip="se connecter"><!--login-->
                        <i class="material-icons" style="font-size: 25px;">fingerprint</i>
                    </a></li>
                </ul>
            </div>
        </nav><!--/navbar desktop-->
        <ul id="type_de_formation_desktop" class="dropdown-content"><!--les types de formations disponibles dans le centre(desktop)-->
            <?php 
                $cathegories=$_POST["cathegories"];
                $cathegories = $cathegories->fetchAll();
                foreach ($cathegories as $row) 
                {
            ?>
            <li><a href="recherche?t=<?php echo $row["id_cathegorie"];?>" class="tooltipped"  data-position="right"  data-tooltip="<?php echo $row["id_cathegorie"];?>"><!--lien de la recherche-->
            <i class="material-icons" style="font-size: 25px; color: black;"><?php echo $row["image_cathegorie"];?></i><!--icone de cathegorie-->          
            ¤
            </a></li>
            <?php
                }
            ?>
        </ul>
        <ul class="sidenav" id="mobile-demo"><!--navbar mobile-->
            <li><a href="index.php"><!--home-->
                <i class="material-icons" style="font-size: 25px; color: black;">home</i>
                page principale
            </a></li>
            <li><a href="travaille_stage"><!--offres de satages/travaille-->
                <i class="material-icons" style="font-size: 25px; color: black;">work</i>
                stage/travaille
            </a></li>
            <li><a class="dropdown-trigger" data-target="type_de_formation_mobile"><!--type de formation-->
                <i class="material-icons" style="font-size: 25px; color: black;">widgets</i>
                type de formation
            </a></li>
            <li><a href="contact" ><!--contact-->
                <i class="material-icons" style="font-size: 25px; color: black;">phone</i>
                contact
            </a></li>
            <li><a href="se_connecter"><!--se connecter-->
                <i class="material-icons" style="font-size: 25px; color: black;">fingerprint</i>
                se connecter
            </a></li>
            <li style="margin-left:33px;"><!--search bar-->
                <form action="recherche" methode="get">
                    <div class="input-field">
                        <i class="material-icons prefix">search</i>
                        <input name="s" id="icon_prefix" type="text" placeholder="faire une recherche">
                    </div>
                </form>
            </li><!--/search bar-->
        </ul><!--/navbar mobile-->
        <ul id="type_de_formation_mobile" class="dropdown-content"><!--les types de formations disponibles dans le centre(mobile)-->
            <?php
                foreach ($cathegories as $row) 
                {
            ?>
            <li><a href="recherche?t=<?php echo $row["id_cathegorie"];?>"><!--le lien de recherche-->
                <i class="material-icons" style="font-size: 25px; color: black;"><?php echo $row["image_cathegorie"];?></i><!--icon de cathegorie-->
                <?php echo $row["id_cathegorie"];?><!--le nom de la categorie-->
            </a></li>
            <?php
                }
            ?>
        </ul>  
        <div class="container">
            <div class="row">     
                <div class="col l6 m8 s10 offset-s1 offset-l3 offset-m2"><!--le formulaire de login-->
                    <img class="responsive-img" src="public/src/pics/se_connecter.jpg">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <?php 
                            if (isset($_POST["erreur"]))
                            { 
                        ?>
                        <h6 style="color:red"><?php echo $_POST["erreur"] ?></h6>
                        <?php
                            }
                        ?>
                        <div class="row valign-wrapper"><!-- notice the "circle" class -->
                        <form class="col s12" method="post" action="se_connecter">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="nom_utilisateur" name="nom_utilisateur" type="text" class="validate" required>
                                <label for="nom_utilisateur">nom d'utilisateur</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="mot_de_pass" name="mot_de_pass" type="password" class="validate" required>
                                <label for="mot_de_pass">mot de pass</label>
                            </div>
                            <div class="input-field col s11 offset-s1">
                                <button class="btn waves-effect waves-light" type="submit" name="action">entrer
                                    <i class="material-icons right">fingerprint</i>
                                </button>
                            </div>  
                        </form>
                        </div>
                    </div>  
                </div><!--.col (le formulaire) /-->     
            </div><!--.row/--> 
        </div><!--.container/-->
        <footer class="page-footer orange" style="width:100%;"><!--footer-->
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Qui Sommes-nous?</h5>
                <p class="grey-text text-lighten-4">
                    Le centre de formation professionnell e A X E N T E C
                    est situé à Avenue Moulay Abdelah - Rési dence AHLAM
                    B2 - Appartement Ol- RDC- sur Marrakech Inaugure en décembre 2013, le centre offre quatre programmes
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
                <li><a href="contact" style="color:black;">contacter nous et avoir notre address.</a></li>
                <li><a href="travaille_stage" style="color:black;">vous voulez faire un stage où bien travailler avec nous.</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2019 axentec.com
            <a class="grey-text text-lighten-4 right" href="http://developement.tk">
                &#119967; designed by developement.tk
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
                var instances = M.Sidenav.init(elems, color="white");
            }); 
            document.addEventListener('DOMContentLoaded', function() 
            {//dropdown script
                var elems = document.querySelectorAll('.dropdown-trigger');
                var instances = M.Dropdown.init(elems, hover=true);
            });        
        </script>
    </body>
</html>