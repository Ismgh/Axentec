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
        <ul id="slide-out" class="sidenav sidenav-fixed"><!--navigation-->
            <li><div class="user-view">
                <div class="background">
                <img src="src/pics/header.png">
                </div>
                <a href="#user"><img class="circle" src="src/pics/user.png"></a>
                <a href="#name"><span class="white-text name"><?php echo $_SESSION["utilisateur"]["user"]; ?></span></a>
                <a href="#email"><span class="white-text email"><?php echo $_SESSION["utilisateur"]["email_utilisateur"]; ?></span></a>
            </div></li>
            <li><a href="administrateur/formation"><i class="material-icons">book</i>les formations</a></li>
            <li><a href="administrateur/stage_et_travaille"><i class="material-icons">work</i> stage et  travaille</a></li>
            <li><a href="administrateur/utilisateur"><i class="material-icons">account_circle</i>les utilisateurs</a></li>
            <li><a href="administrateur/etudiant"><i class="material-icons">group</i>les étudiants</a></li>
            <li><a href="administrateur/group"><i class="material-icons">grain</i>les groups</a></li>
            <li><a href="administrateur/enseignant"><i class="material-icons">group_work</i>les enseignants</a></li>
            <li><a href="administrateur/archive"><i class="material-icons">archive</i>l'archive</a></li>
            <li><a href="logout"><i class="material-icons">exit_to_app</i>se deconnecter</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">les lien</a></li>
            <li><a href="administrateur/etudiant_formation"><i class="material-icons">link</i>etudiant_formation</a></li>
        </ul>
        <div class="container">
            <div class="row row1">
                <h4 class="center">bonjour <?= $_SESSION["utilisateur"]["user"]; ?></h4><!--le nom du tabeleau-->
                <div id="administrateur" class="wallpaper"></div><!-- image wallpaper -->
            </div><!--.row/--> 
        </div><!--.container/-->
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