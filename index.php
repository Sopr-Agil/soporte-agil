<?php
        require_once 'dao/ConexionClass.php'; 
        require_once 'dao/UsuarioClass.php'; 
        require_once 'handler/view.php';
        require 'constants/constants.php';
        require 'constants/constants_views.php';
    
        
        
        $uri = $_SERVER['REQUEST_URI'];
        $view = str_replace(ROOT,'', $uri);      
        $view = str_replace('/','', $view);
        
        handler($view);
    
    
function handler($view ='') {  
    $obj = new View();
    $users = new UsuarioClass();
   
        switch ($view) {             
            case VIEW_ADMIN:
                echo $users->getUsers();
                $obj->html($view);                
                break;
            default: $obj->html(VIEW_HOME);
    }//switch
}//handler
?>