<?php
    Route::set('',function()
    {// la page root
        Index::View('index'); 
    });
    Route::set('test',function()
    {// tester quelque chose 
        Index::View('test');    
    });
    Route::set('costom_files',function()
    {// tester quelque chose 
        Index::View('index');    
    });
?>