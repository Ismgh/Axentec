<?php
    Route::set('',function()
    {// la page root
        Index::traitement();
        Index::View('index'); 
    });
    Route::set('test',function()
    {// tester quelque chose 
        Index::View('test');    
    });
?>