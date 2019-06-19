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
            <li><a href="groupe"><i class="material-icons">grain</i>les groups</a></li>
            <li><a href="enseignant"><i class="material-icons">group_work</i>les enseignants</a></li>
            <li><a href="archive"><i class="material-icons">archive</i>l'archive</a></li>
            <li><a href="logout"><i class="material-icons">exit_to_app</i>se deconnecter</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">les liens</a></li>
            <li  class="active"><a href="#!"><i class="material-icons">link</i>etudiant_formation</a></li>
        </ul>
        <div class="container">
            <div class="row row1">
                <h4 class="center">
                <i class="material-icons">link</i>
                etudiant_formation
                    <a href="#modal" onclick="ajouter()" class="btn-floating btn-small  blue tooltipped modal-trigger" data-position="right"  data-tooltip="ajouter une formation"><i class="material-icons">add</i></a> 
                </h4>
                <?php
                    /* la boucle sur les etudiant_formations*/
                    $etudiant_formations=$_POST["etudiant_formations"];
                    while($row=$etudiant_formations->fetch())
                    {
                ?>
                <div class="col l4 m6 s12"><!--etudiant_formation-->
                    <div class="card" style="box-shadow : gray 1px 1px 15px;"><!--card-->
                        <div class="card-image waves-effect waves-block waves-light"><!--le titre-->
                            <img src="../src/pics/etudiant_formation.jpg"><!--image principale-->
                            <span class="card-title" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;text-shadow:black 1px 1px 13px;"><?php echo $row["id_etudiant"];?> | <?php echo $row["id_formation"];?></span>
                        </div>
                        <div class="card-content" style="overflow-x: auto;">
                        <table class="striped">
                            <tr>
                                <th style="font-size:15px"> id_formation</th>
                                <td style="font-size:15px"><?php echo $row["id_formation"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px">id_etudiant</th>
                                <td style="font-size:15px"><?php echo $row["id_etudiant"];?></td>
                            </tr>
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
                            <tr>
                                <th style="font-size:15px"> seance_1 </th>
                                <td style="font-size:15px"><?php echo $row["seance_1"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> seance_2 </th>
                                <td style="font-size:15px"><?php echo $row["seance_2"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> seance_3 </th>
                                <td style="font-size:15px"><?php echo $row["seance_3"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> seance_4 </th>
                                <td style="font-size:15px"><?php echo $row["seance_4"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> seance_5 </th>
                                <td style="font-size:15px"><?php echo $row["seance_5"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> seance_6 </th>
                                <td style="font-size:15px"><?php echo $row["seance_6"];?></td>
                            </tr>
                            <tr>
                                <th style="font-size:15px"> id_groupe </th>
                                <td style="font-size:15px"><?php echo $row["id_groupe"];?></td>
                            </tr>
                            </tbody>
                        </table>
                        <p>  
                        </div>
                        <div class="card-action"><!--bouton d'inscription-->
                            <a href="#modal" onclick="modifier()" class="btn-floating btn-small waves-effect waves-light aqua tooltipped modal-trigger " data-position="right"  data-tooltip="modifier"><i class="material-icons">create</i></a>
                            <a href="?supprimer1=<?php echo $row["id_formation"];?>&supprimer2=<?php echo $row["id_etudiant"];?>" class="btn-floating btn-small waves-effect waves-light red tooltipped " data-position="right"  data-tooltip="supprimer"><i class="material-icons">delete</i></a>
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
                <input id="id_formation_an" name="id_formation_an" type="text" hidden>
                <input id="id_etudiant_an" name="id_etudiant_an" type="text" hidden>
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
                <div class="input-field col s12">
                    <i class="material-icons prefix">group</i>
                    <select name="id_etudiant">
                    <option id="id_etudiant" selected>choisire une option</option>
                    <?php 
                        $etudiants=$_POST["etudiants"];
                        while ($row=$etudiants->fetch()) 
                        {
                    ?>
                    <option value="<?php echo $row["id_etudiant"];?>"><?php echo $row["id_etudiant"];?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <label>id de l'étudiant </label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">hdr_strong</i>
                    <input placeholder="" id="nombre_sceance_present" name="nombre_sceance_present" type="text" class="validate" required>
                    <label for="nombre_sceance_present">nombre_sceance_present</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">hdr_weak</i>
                    <input placeholder="" id="nombre_sceance_absent" name="nombre_sceance_absent" type="text" class="validate" required>
                    <label for="nombre_sceance_absent">nombre sceance absent</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">timelapse</i>
                    <input placeholder="" id="nombre_heures_par_seance" name="nombre_heures_par_seance" type="text" class="validate" required>
                    <label for="nombre_heures_par_seance">nombre heures par seance</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_one</i>
                    <input placeholder="" id="seance_1" name="seance_1" type="text" class="validate" required>
                    <label for="seance_1"> date et heure de sceance 1</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_two</i>
                    <input placeholder="" id="seance_2" name="seance_2" type="text" class="validate" required>
                    <label for="seance_2"> date et heure de sceance 2</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_3</i>
                    <input placeholder="" id="seance_3" name="seance_3" type="text" class="validate" required>
                    <label for="seance_3"> date et heure de sceance 3</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_4</i>
                    <input placeholder="" id="seance_4" name="seance_4" type="text" class="validate" required>
                    <label for="seance_4"> date et heure de sceance 4</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_5</i>
                    <input placeholder="" id="seance_5" name="seance_5" type="text" class="validate" required>
                    <label for="seance_5"> date et heure de sceance 5</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">looks_6</i>
                    <input placeholder="" id="seance_6" name="seance_6" type="text" class="validate" required>
                    <label for="seance_6"> date et heure de sceance 6</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">book</i>
                    <select name="id_groupe">
                    <option id="id_groupe" selected>choisire une option</option>
                    <?php 
                        $groupes=$_POST["groupes"];
                        while ($row=$groupes->fetch()) 
                        {
                    ?>
                    <option value="<?php echo $row["id_groupe"];?>"><?php echo $row["id_groupe"];?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <label> l'id formation du groupe de l'etudiant </label>
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
                document.getElementById("id_formation").setAttribute("value","");
                document.getElementById("id_etudiant").setAttribute("value","");
                document.getElementById("nombre_sceance_present").setAttribute("value","");
                document.getElementById("nombre_sceance_absent").setAttribute("value","");
                document.getElementById("nombre_heures_par_seance").setAttribute("value","");
                document.getElementById("seance_1").setAttribute("value","");
                document.getElementById("seance_2").setAttribute("value","");
                document.getElementById("seance_3").setAttribute("value","");
                document.getElementById("seance_4").setAttribute("value","");
                document.getElementById("seance_5").setAttribute("value","");
                document.getElementById("seance_6").setAttribute("value","");
                document.getElementById("id_groupe").setAttribute("value","");
                document.getElementById("type_action").setAttribute("name","ajouter"); 
            }
            function modifier() 
            {//obtenire les valeur de la formation selectionée
                const form=event.target.closest(".card");
                document.getElementById("modal_titre").innerHTML="modifier <i class='material-icons prefix'>create</i> ";
                document.getElementById("id_formation").setAttribute("value",form.getElementsByTagName("td")[0].innerHTML);
                document.getElementById("id_formation_an").setAttribute("value",form.getElementsByTagName("td")[0].innerHTML);
                document.getElementById("id_etudiant").setAttribute("value",form.getElementsByTagName("td")[1].innerHTML);
                document.getElementById("id_etudiant_an").setAttribute("value",form.getElementsByTagName("td")[1].innerHTML);
                document.getElementById("nombre_sceance_present").setAttribute("value",form.getElementsByTagName("td")[2].innerHTML);
                document.getElementById("nombre_sceance_absent").setAttribute("value",form.getElementsByTagName("td")[3].innerHTML);
                document.getElementById("nombre_heures_par_seance").setAttribute("value",form.getElementsByTagName("td")[4].innerHTML);
                document.getElementById("seance_1").setAttribute("value",form.getElementsByTagName("td")[5].innerHTML);
                document.getElementById("seance_2").setAttribute("value",form.getElementsByTagName("td")[6].innerHTML);
                document.getElementById("seance_3").setAttribute("value",form.getElementsByTagName("td")[7].innerHTML);
                document.getElementById("seance_4").setAttribute("value",form.getElementsByTagName("td")[8].innerHTML);
                document.getElementById("seance_5").setAttribute("value",form.getElementsByTagName("td")[9].innerHTML);
                document.getElementById("seance_6").setAttribute("value",form.getElementsByTagName("td")[10].innerHTML);
                document.getElementById("id_groupe").setAttribute("value",form.getElementsByTagName("td")[11].innerHTML);
                document.getElementById("type_action").setAttribute("name","modifier"); 
            }
            function valider_form()
            {// la fonction qui va jouer le role de submit
                document.getElementById("modal_form").submit();
            }
        </script>
    </body>
</html>