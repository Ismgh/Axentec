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
    Route::set('test',function()
    {// tester quelque chose 
        Test::traitement();
        Test::View('test');    
    });
?>