<?php


if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }      

    function public_path($path = '')
    {
        return app()->basePath() . '/public' . ($path ? '/' . $path : $path);
    }    
}

function changeMonth ($data){

    $changeMonth;

    if ($data == "January"){
        $changeMonth = 'Januari';
    }        
    else if ($data == "February"){
        $changeMonth = "Februari";
    }
    else if ($data == "March"){
        $changeMonth = "Maret";
    }        
    else if ($data == "April"){
        $changeMonth = "April";
    }        
    else if ($data == "May"){
        $changeMonth = "Mei";
    }        
    else if ($data == "June"){
        $changeMonth = "Juni";
    }      
    else if ($data == "July"){
        $changeMonth = "Juli";
    }     
    else if ($data == "August"){
        $changeMonth = "Agustus";
    }        
    else if ($data == "September"){
        $changeMonth = "September";
    }      
    else if ($data == "October"){
        $changeMonth = "Oktober";
    }    
    else if ($data == "November"){
        $changeMonth = "November";
    }        
    else {
        $changeMonth = "Desember";
    }

    return $changeMonth;
}