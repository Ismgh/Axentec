<?php
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
    Route::set('test',function()
    {// tester quelque chose 
        Test::traitement_travaille_stage();
        Test::View('test');    
    });
?>