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
            <li><a href="formation"><i class="material-icons">book</i>les formations</a></li>
            <li><a href="stage_et_travaille"><i class="material-icons">work</i> stage et  travaille</a></li>
            <li><a href="utilisateur"><i class="material-icons">account_circle</i>les utilisateurs</a></li>
            <li><a href="etudiant"><i class="material-icons">group</i>les étudiants</a></li>
            <li><a href="group"><i class="material-icons">grain</i>les groups</a></li>
            <li  class="active"><a href="#!"><i class="material-icons">group_work</i>les enseignants</a></li>
            <li><a href="archive"><i class="material-icons">archive</i>l'archive</a></li>
            <li><a href="logout"><i class="material-icons">exit_to_app</i>se deconnecter</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">les liens</a></li>
            <li><a href="etudiant_formation"><i class="material-icons">link</i>etudiant_formation</a></li>
        </ul>
        <div class="container">
            <div class="row row1">
                <h4 class="center">
                <i class="material-icons">group_work</i>
                les enseignants
                    <a href="#modal" onclick="ajouter()" class="btn-floating btn-small  blue tooltipped modal-trigger" data-position="right"  data-tooltip="ajouter une formation"><i class="material-icons">add</i></a> 
                </h4>
                <?php
                    /* la boucle sur les proffesseurs*/
                    $proffesseurs=$_POST["proffesseurs"];
                    while($row=$proffesseurs->fetch())
                    {
                ?>
                <div class="col l4 m6 s12"><!--proffesseur-->
                    <div class="card" style="box-shadow : gray 1px 1px 15px;"><!--card-->
                        <div class="card-image waves-effect waves-block waves-light"><!--le titre-->
                            <img src="../src/pics/proffesseur.jpg"><!--image principale-->
                            <span class="card-title" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;text-shadow:black 1px 1px 13px;"><?php echo $row["id_proffesseur"];?></span>
                        </div>
                        <div class="card-content" style="overflow-x: auto;">
                        <table class="striped">
                            <tr>
                                <th style="font-size:15px"> id_proff</th>
                                <td style="font-size:15px"><?php echo $row["id_proffesseur"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> nom_proffesseur</th>
                                <td style="font-size:15px"><?php echo $row["nom_proffesseur"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> prenom_proffesseur</th>
                                <td style="font-size:15px"><?php echo $row["prenom_proffesseur"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> numero_telephone</th>
                                <td style="font-size:15px"><?php echo $row["numero_telephone"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> email</th>
                                <td style="font-size:15px"><?php echo $row["email"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> id_formation </th>
                                <td style="font-size:15px"><?php echo $row["id_formation"];?></td>
                            </tr>
                            </tbody>
                        </table>
                        <p>  
                        </div>
                        <div class="card-action"><!--bouton d'inscription-->
                            <a href="#modal" onclick="modifier()" class="btn-floating btn-small waves-effect waves-light aqua tooltipped modal-trigger " data-position="right"  data-tooltip="modifier"><i class="material-icons">create</i></a>
                            <a href="?supprimer=<?php echo $row["id_proffesseur"];?>" class="btn-floating btn-small waves-effect waves-light red tooltipped " data-position="right"  data-tooltip="supprimer"><i class="material-icons">delete</i></a>
                        </div>
                    </div><!--/card-->
                </div><!--.col (un proffesseur) /--> 
                <?php
                    }//fin de la boucle des proffesseurs
                ?>     
            </div><!--.row/-->  
        </div><!--.container/-->
        <div id="modal" class="modal modal-fixed-footer"><!-- Modal Structure -->
            <div class="modal-content">
            <h4 id="modal_titre"></h4><br>
            <form id="modal_form" class="col s12 " method="post" action="">
                <input id="type_action" value="1" type="text" hidden><!-- c'est l'inpute avec laquelle on connait si admin veut modifier ou ajouter formation -->
                <input id="id_proffesseur_an" name="id_proffesseur_an" type="text" hidden>
                <div class="input-field col s12">
                    <i class="material-icons prefix">grain</i>
                    <input placeholder="" id="id_proffesseur" name="id_proffesseur" type="text" class="validate" required>
                    <label for="id_proffesseur">identifiant de l'enseignant</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input placeholder="" id="nom_proffesseur" name="nom_proffesseur" type="text" class="validate" required>
                    <label for="nom_proffesseur">nom de l'enseignant</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">child_care</i>
                    <input placeholder="" id="prenom_proffesseur" name="prenom_proffesseur" type="text" class="validate" required>
                    <label for="prenom_proffesseur">prénom de l'enseignant</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input placeholder="" id="numero_telephone" name="numero_telephone" type="text" class="validate" required>
                    <label for="numero_telephone">numero de telehpone</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">mail</i>
                    <input placeholder="" id="email" name="email" type="text" class="validate" required>
                    <label for="emai">prénom de l'enseignant</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">book</i>
                    <select name="id_formation">
                    <option id="id_formation" selected>choisire une option</option>
                    <?php 
                        $formations=$_POST["formations"];
                        while ($row=$formations->fetch()) 
                        {
                    ?>
                    <option value="<?php echo $row["id_formation"];?>"><?php echo $row["titre_formation"];?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <label>id formation(voire formation pour savoire le titre correspand a l'id) </label>
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
                document.getElementById("modal_titre").innerHTML="ajouter <i class='material-icons prefix'>add</i>";
                document.getElementById("id_proffesseur").setAttribute("value","");
                document.getElementById("nom_proffesseur").setAttribute("value","");
                document.getElementById("prenom_proffesseur").setAttribute("value","");
                document.getElementById("numero_telephone").setAttribute("value","");
                document.getElementById("email").setAttribute("value","");
                document.getElementById("id_formation").setAttribute("value","");
                document.getElementById("type_action").setAttribute("name","ajouter"); 
            }
            function modifier() 
            {//obtenire les valeur de la formation selectionée
                const form=event.target.closest(".card");
                document.getElementById("modal_titre").innerHTML="modifier <i class='material-icons prefix'>create</i> ";
                document.getElementById("id_proffesseur").setAttribute("value",form.getElementsByTagName("span")[0].innerHTML);
                document.getElementById("id_proffesseur_an").setAttribute("value",form.getElementsByTagName("span")[0].innerHTML);
                document.getElementById("nom_proffesseur").setAttribute("value",form.getElementsByTagName("td")[1].innerHTML);
                document.getElementById("prenom_proffesseur").setAttribute("value",form.getElementsByTagName("td")[2].innerHTML);
                document.getElementById("numero_telephone").setAttribute("value",form.getElementsByTagName("td")[3].innerHTML);
                document.getElementById("email").setAttribute("value",form.getElementsByTagName("td")[4].innerHTML);
                document.getElementById("id_formation").setAttribute("value",form.getElementsByTagName("td")[5].innerHTML);
                document.getElementById("type_action").setAttribute("name","modifier"); 
            }
            function valider_form()
            {// la fonction qui va jouer le role de submit
                document.getElementById("modal_form").submit();
            }
        </script>
    </body>
</html>