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
                <img src="../src/pics/header.png">
                </div>
                <a href="#user"><img class="circle" src="../src/pics/user.png"></a>
                <a href="#name"><span class="white-text name"><?php echo $_SESSION["utilisateur"]["user"]; ?></span></a>
                <a href="#email"><span class="white-text email"><?php echo $_SESSION["utilisateur"]["email_utilisateur"]; ?></span></a>
            </div></li>
            <li class="active"><a href="#!"><i class="material-icons">book</i>les formations</a></li>
            <li><a href="stage_et_travaille"><i class="material-icons">work</i> stage et  travaille</a></li>
            <li><a href="utilisateur"><i class="material-icons">account_circle</i>les utilisateurs</a></li>
            <li><a href="etudiant"><i class="material-icons">group</i>les étudiants</a></li>
            <li><a href="group"><i class="material-icons">grain</i>les groups</a></li>
            <li><a href="enseignant"><i class="material-icons">group_work</i>les enseignants</a></li>
            <li><a href="archive"><i class="material-icons">archive</i>l'archive</a></li>
            <li><a href="logout"><i class="material-icons">exit_to_app</i>se deconnecter</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">les liens</a></li>
            <li><a href="etudiant_formation"><i class="material-icons">link</i>etudiant_formation</a></li>
        </ul>
        <div class="container">
            <div class="row">
                <h4 class="center">
                    <i class="material-icons">book</i> 
                    Les formations
                    <a href="#modal" onclick="ajouter()" class="btn-floating btn-small  blue tooltipped modal-trigger" data-position="right"  data-tooltip="ajouter une formation"><i class="material-icons">add</i></a> 
                </h4>
                <?php
                    /* la boucle sur les formation*/
                    $formations=$_POST["formations"];
                    while($row=$formations->fetch())
                    {
                ?>
                <div class="col l4 m6 s12"><!--formation-->
                    <div class="card" style="box-shadow : gray 1px 1px 15px;"><!--card-->
                        <div class="card-image waves-effect waves-block waves-light"><!--le titre-->
                            <img src="<?php echo $row["image_formation"];?>"><!--image principale-->
                            <span class="card-title" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;text-shadow:black 1px 1px 13px;"><?php echo $row["titre_formation"];?></span>
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">
                            <a class=" waves-effect waves-gray white tooltipped  right" data-position="left"  data-tooltip="voir plus d'informations"><i class="material-icons">more_vert</i></a>
                            </span>
                            <p><!--petite description-->
                                <span  class="petite_description"><?php echo $row["petit_description_formation"];?></span>
                                <span class="badge"><?php echo $row["id_formation"];?></span>
                                <span hidden><?php echo $row["nombre_heure_par_seance"];?></span><!--pour obtenir le nombre d'heures par seance -->
                                <span hidden><?php echo $row["id_cathegorie"];?></span><!--pour obteni le nombre id_cathégorie-->
                            </p>
                        </div>
                        <div class="card-action"><!--bouton d'inscription-->
                            <a href="#modal" onclick="modifier()" class="btn-floating btn-small waves-effect waves-light aqua tooltipped modal-trigger " data-position="right"  data-tooltip="modifier"><i class="material-icons">create</i></a>
                            <a href="?supprimer=<?php echo $row["id_formation"];?>" class="btn-floating btn-small waves-effect waves-light red tooltipped " data-position="right"  data-tooltip="supprimer"><i class="material-icons">delete</i></a>
                            <a class=" btn-small waves-effect waves-light red tooltipped right" data-position="top"  data-tooltip="promotion"> <span><?php echo $row["promotion_formation"];?></span> % <i class="material-icons">trending_down</i></a><!--promotion-->
                        </div>
                        <div class="card-reveal">
                            <span class="card-title dark-text text-darken-6" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><?php echo $row["titre_formation"];?><i class="material-icons right">close</i></span><!--titre-->
                            <p><?php echo $row["grande_description_formation"];?></p><!--grand description-->
                        </div>
                    </div><!--/card-->
                </div><!--.col (une formation) /--> 
                <?php
                    }//fin de la boucle des formations
                ?>     
            </div><!--.row/-->  
        </div><!--.container/-->
        <div id="modal" class="modal modal-fixed-footer"><!-- Modal Structure -->
            <div class="modal-content">
            <h4 id="modal_titre"></h4><br>
            <form id="modal_form" class="col s12 " method="post" action="">
                <input id="type_action" value="1" type="text" hidden><!-- c'es l'inpute avec laquelle on connait si admin veut modifier ou ajouter formation -->
                <input placeholder="" value="<?php echo $row["id_formation"];?>" id="id_formation" name="id_formation" type="text" class="validate" hidden>  
                <div class="input-field col s12">
                    <i class="material-icons prefix">text_format</i>
                    <input placeholder="" id="titre_formation" name="titre_formation" type="text" class="validate" required>
                    <label for="titre_formation">titre formation</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">wallpaper</i>
                    <input placeholder="" id="image_formation" name="image_formation" type="text" class="validate" required>
                    <label for="image_formation">image formation (inserer un lien online)</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">view_stream</i>
                    <textarea placeholder="" id="petit_description_formation" name="petit_description_formation" class="materialize-textarea" required></textarea>
                    <label for="petit_description_formation">petit description formation</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">view_headline</i>
                    <textarea placeholder=""  id="grande_description_formation" name="grande_description_formation" class="materialize-textarea" required></textarea>
                    <label for="grande_description_formation">grande description formation</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">trending_down</i>
                    <input placeholder="" id="promotion_formation" name="promotion_formation"  type="text" class="validate" required>
                    <label for="promotion_formation"> promotion</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">access_time</i>
                    <input placeholder="" id="nombre_heure_par_seance" name="nombre_heure_par_seance" type="text" class="validate" required>
                    <label for="nombre_heure_par_seance">nombre d'heure par seance</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">widgets</i>
                    <select  name="id_cathegorie" >
                    <option id="id_cathegorie" selected>Choisire une option</option>
                    <?php 
                        $cathegories=$_POST["cathegories"];
                        while ($row=$cathegories->fetch()) 
                        {
                    ?>
                    <option value="<?php echo $row["id_cathegorie"];?>"><?php echo $row["id_cathegorie"];?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <label>cathégorie de la fomation</label>
                </div>
            </form>
            </div>
            <div class="modal-footer">
            <a href="#!" class=" modal-close btn-floating btn-small waves-effect waves-light red tooltipped " data-position="left"  data-tooltip="annuler"><i class="material-icons"><i class="material-icons">close</i></a>
            &nbsp;
            <a  href="#" onclick="valider_form()" class="btn-floating btn-small waves-effect waves-light blue tooltipped " data-position="top"  data-tooltip="confirmer"><i class="material-icons"><i class="material-icons">done</i></a>
            </div>
        </div>
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
            document.addEventListener('DOMContentLoaded', function() 
            {//modal script
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems, opacity=0.5);
            });
            document.addEventListener('DOMContentLoaded', function() 
            {//select options
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, classes="");
            });
            function ajouter() 
            {
                document.getElementById("modal_titre").innerHTML="<i class='material-icons prefix'>add</i>ajouter";
                document.getElementById("id_formation").setAttribute("value","");
                document.getElementById("titre_formation").setAttribute("value","");
                document.getElementById("image_formation").setAttribute("value","");
                document.getElementById("petit_description_formation").innerHTML="";
                document.getElementById("grande_description_formation").innerHTML="";
                document.getElementById("promotion_formation").setAttribute("value","");
                document.getElementById("nombre_heure_par_seance").setAttribute("value","");
                document.getElementById("id_cathegorie").setAttribute("value","");
                document.getElementById("type_action").setAttribute("name","ajouter"); 
            }
            function modifier() 
            {//obtenire les valeur de la formation selectionée
                const form=event.target.closest(".card");
                document.getElementById("modal_titre").innerHTML="<i class='material-icons prefix'>create</i> modifier";
                document.getElementById("id_formation").setAttribute("value",form.getElementsByTagName("span")[3].innerHTML);
                document.getElementById("titre_formation").setAttribute("value",form.getElementsByTagName("span")[0].innerHTML);
                document.getElementById("image_formation").setAttribute("value",form.getElementsByTagName("img")[0].getAttribute("src"));
                document.getElementById("petit_description_formation").innerHTML=form.getElementsByTagName("span")[2].innerHTML;
                document.getElementById("grande_description_formation").innerHTML=form.getElementsByTagName("p")[1].innerHTML;
                document.getElementById("promotion_formation").setAttribute("value",form.getElementsByTagName("span")[6].innerHTML);
                document.getElementById("nombre_heure_par_seance").setAttribute("value",form.getElementsByTagName("span")[4].innerHTML);
                document.getElementById("id_cathegorie").setAttribute("value",form.getElementsByTagName("span")[5].innerHTML);
                document.getElementById("type_action").setAttribute("name","modifier"); 
            }
            function valider_form()
            {// la fonction qui va jouer le role de submit
                document.getElementById("modal_form").submit();
            }
        </script>
    </body>
</html>