<?php
    /* l'interface client*/
    Route::set('',function()
    {// la page root
        Index::traitement_index();
        Index::View('index'); 
    });
    Route::set('contact',function()
    {// la page contact
        Index::traitement_contact();
        Index::View('contact'); 
    });
    Route::set('travaille_stage',function()
    {// la page travaille et stage 
        Index::traitement_travaille_stage();
        Index::View('travaille_stage');    
    });
    Route::set('se_connecter',function()
    {// la page se connecter 
        Index::traitement_se_connecter();
        Index::View('se_connecter');    
    });
    Route::set('recherche',function()
    {// la page recherche 
        Index::traitement_recherche();
        Index::View('recherche');    
    });
    Route::set('s_inscrire',function()
    {// la page d'inscription 
        Index::traitement_s_inscrire();
        Index::View('s_inscrire');    
    });
    Route::set('live_verification',function()
    {// verfier le nom de l'utilisateur live 
        Index::valider_nom_utilisateur_live();   
    });
    Route::set('paiement',function()
    {// la page de paiement 
        Index::traitement_paiement();
        Index::View('paiement');    
    });
    /* l'interface administrateur */
    Route::set('administrateur',function()
    {// la page de l'administrateur
        Administrateur::traitement();
        Administrateur::View('administrateur');    
    });
    Route::set('administrateur/formation',function()
    {// la page des formations
        Administrateur::traitement();
        Administrateur::formation_traitement();
        Administrateur::View('formation');    
    });
    Route::set('administrateur/stage_et_travaille',function()
    {// la page des stage et travaille
        Administrateur::traitement();
        Administrateur::stage_et_travaille_traitement();
        Administrateur::View('stage_et_travaille');    
    });
    Route::set('administrateur/utilisateur',function()
    {// la page des utilisateurs
        Administrateur::traitement();
        Administrateur::utilisateur_traitement();
        Administrateur::View('utilisateur');    
    });
    Route::set('administrateur/etudiant',function()
    {// la page des utilisateurs
        Administrateur::traitement();
        Administrateur::etudiant_traitement();
        Administrateur::View('etudiant');    
    });
    Route::set('administrateur/group',function()
    {// la page des utilisateurs
        Administrateur::traitement();
        Administrateur::groupe_traitement();
        Administrateur::View('groupe');    
    });
    Route::set('administrateur/enseignant',function()
    {// la page des enseignants
        Administrateur::traitement();
        Administrateur::enseignant_traitement();
        Administrateur::View('enseignant');    
    });
    Route::set('administrateur/archive',function()
    {// la page des archives
        Administrateur::traitement();
        Administrateur::archive_person_traitement();
        Administrateur::View('archive_person');    
    });
    Route::set('administrateur/etudiant_formation',function()
    {// la page des etudiant_formation
        Administrateur::traitement();
        Administrateur::etudiant_formation_traitement();
        Administrateur::View('etudiant_formation');    
    });
    /*logout*/
    Route::set('logout',function()
    {// sortire de la session 
        Controller::logout();     
    });
    /* test */
    Route::set('test',function()
    {// tester quelque chose 
        Test::View('test');    
    });
?>