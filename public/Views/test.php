<html>
    <head>
        <!--Compiled and minified CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!--le fichier CSS-->
        <link rel="stylesheet" href="../custom_files/css/custom.css">
        <!--les icones-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Compiled and minified JavaScript-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <style>
        </style>
    </head>
    <body>
        <nav style="margin-bottom:25px;"><!--navbar desktop-->
            <div class="nav-wrapper orange" >
                <a href="#!" class="brand-logo tooltipped" data-position="bottom"  data-tooltip="Logo#Axentec">
                    <img  style="height:100%;width:110px;" src="https://yt3.ggpht.com/a/AGF-l7-g_NuaapZdmddVVS-RditpOF6eGdMsptZb2g=s288-mo-c-c0xffffffff-rj-k-no">
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="tooltipped" href="sass.html" data-position="bottom"  data-tooltip="page principale"><!--home-->
                        <i class="material-icons" style="font-size: 25px;">home</i>
                    </a></li>
                    <li><a class="tooltipped" href="sass.html" data-position="bottom"  data-tooltip="stage/travaille"><!--offres de satages/travaille-->
                        <i class="material-icons" style="font-size: 25px;">work</i>
                    </a></li>
                    <li><a class="tooltipped dropdown-trigger"  data-position="bottom" data-target="type_de_formation_desktop"  data-tooltip="type de formation"><!--recherche par catégorie-->
                        <i class="material-icons" style="font-size: 25px;">widgets</i>
                    </a></li>
                    <li><!--search bar-->
                        <form>
                            <div class="input-field">
                                <input id="search" type="search" placeholder="search..." required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </li><!--/search bar-->
                    <li><a class="tooltipped modal-trigger" href="#" data-position="bottom"  data-tooltip="contact"><!--contact-->
                        <i class="material-icons" style="font-size: 25px;">phone</i>
                    </a></li>
                    <li><a class="tooltipped" href="#" data-position="left"  data-tooltip="se connecter"><!--login-->
                        <i class="material-icons" style="font-size: 25px;">fingerprint</i>
                    </a></li>
                </ul>
            </div>
        </nav><!--/navbar desktop-->
        <ul id="type_de_formation_desktop" class="dropdown-content"><!--les types de formations disponibles dans le centre(desktop)-->
            <li><a class="tooltipped" href="sass.html" data-position="right"  data-tooltip="individuel"><!--individuel-->
                <i class="material-icons" style="font-size: 25px; color: black;">account_box</i>
                ¤
            </a></li>
            <li><a class="tooltipped" href="sass.html" data-position="right"  data-tooltip="group"><!--group-->
                <i class="material-icons" style="font-size: 25px; color: black;">people</i>
                ¤
            </a></li>
        </ul>
        <ul class="sidenav" id="mobile-demo"><!--navbar mobile-->
            <li><a href="sass.html"><!--home-->
                <i class="material-icons" style="font-size: 25px; color: black;">home</i>
                page principale
            </a></li>
            <li><a href="sass.html"><!--offres de satages/travaille-->
                <i class="material-icons" style="font-size: 25px; color: black;">work</i>
                stage/travaille
            </a></li>
            <li><a class="dropdown-trigger" data-target="type_de_formation_mobile"><!--type de formation-->
                <i class="material-icons" style="font-size: 25px; color: black;">widgets</i>
                type de formation
            </a></li>
            <li><a href="sass.html" ><!--contact-->
                    <i class="material-icons" style="font-size: 25px; color: black;">phone</i>
                    contact
            </a></li>
            <li><a href="#"><!--login-->
                    <i class="material-icons" style="font-size: 25px; color: black;">fingerprint</i>
                    se connecter
            </a></li>
            <li style="margin-left:33px;"><!--search bar-->
                <form>
                    <div class="input-field">
                    <i class="material-icons prefix">search</i>
                    <input id="icon_prefix" type="text" placeholder="search">
                    </div>
                </form>
            </li><!--/search bar-->
        </ul><!--/navbar mobile-->
        <ul id="type_de_formation_mobile" class="dropdown-content"><!--les types de formations disponibles dans le centre(mobile)-->
            <li><a href="sass.html"><!--individuel-->
                <i class="material-icons" style="font-size: 25px; color: black;">account_box</i>
                individuel
            </a></li>
            <li><a href="sass.html"><!--group-->
                <i class="material-icons" style="font-size: 25px; color: black;">people</i>
                group
            </a></li>
        </ul>  
        <div class="container">
            <div class="row">
                <div class="col l4 m6 s12"><!--formation-->
                    <div class="card" style="box-shadow : gray 1px 1px 15px;"><!--card-->
                        <div class="card-image waves-effect waves-block waves-light">
                            <img src="src/pics/programation.jpg"><!--image principale-->
                            <span class="card-title" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">programation</span><!--le titre-->
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">
                            <a class=" waves-effect waves-gray white tooltipped  right" data-position="left"  data-tooltip="voir plus d'informations"><i class="material-icons">more_vert</i></a>
                            </span>
                            <p><!--petite description-->
                                rench (le français, pronounced [lə fʁɑ̃se] or [lə fʁɑ̃sɛ] (About this soundlisten) or la langue française [la lɑ̃ɡ fʁɑ̃sɛːz]) is a Romance language of the Indo-European family.
                                It descended from the Vulgar Latin of the Roman Empire, as did all Romance languages. 
                            </p>
                        </div>
                        <div class="card-action">
                            <a class="btn-floating btn-small waves-effect waves-light aqua tooltipped  pulse" data-position="right"  data-tooltip="s'inscrire"><i class="material-icons">done</i></a>
                            <a class=" btn-small waves-effect waves-light red tooltipped right" data-position="top"  data-tooltip="promotion">20% <i class="material-icons">trending_down</i></a><!--promotion-->
                        </div><!--bouton d'inscription-->
                        <div class="card-reveal">
                            <span class="card-title dark-text text-darken-6" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">langue francée<i class="material-icons right">close</i></span>
                            <p><!--grand description-->
                                Under the Constitution of France, French has been the official language of the Republic since 1992[20] (although the ordinance of Villers-Cotterêts made it mandatory for legal documents in 1539).
                                France mandates the use of French in official government publications, public education except in specific cases (though these dispositions[clarification needed] are often ignored) and legal contracts; advertisements must bear a translation of foreign words.
                            </p>
                            <div class="card-action">
                                <a class="btn-floating btn-small waves-effect waves-light aqua tooltipped  pulse" data-position="right"  data-tooltip="s'inscrire"><i class="material-icons">done</i></a>
                                <a class=" btn-small waves-effect waves-light red tooltipped right" data-position="top"  data-tooltip="promotion">20% <i class="material-icons">trending_down</i></a><!--promotion-->
                            </div><!--bouton d'inscription (.card-action)-->
                        </div>
                    </div><!--/card-->
                </div><!--.col (une formation) /-->      
            </div><!--.row/--> 
        </div><!--.container/-->
        <footer class="page-footer orange" style="width:100%;"><!--footer-->
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Qui nous sommes ?</h5>
                <p class="grey-text text-lighten-4">
                    Axentec est une sociétee qui propose plusieurs formations dans plusieurs domains.<br>
                    informatique, langue, reparations des apparaille electroniques....
                </p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">des liens utiles</h5>
                <ul >
                  <li><a class="text-lighten-3" href="#!" style="color:black;">page principale</a></li>
                  <li><a class="text-lighten-3" href="#!" style="color:black;">contact</a></li>
                  <li><a class="text-lighten-3" href="#!" style="color:black;">offres de stage et travaille</a></li>
                  <li><a class="text-lighten-3" href="#!" style="color:black;">notre address</a></li>
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