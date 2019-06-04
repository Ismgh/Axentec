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
    /* test */
    Route::set('test',function()
    {// tester quelque chose 
        Test::traitement_paiement();
        Test::View('test');    
    });
?>