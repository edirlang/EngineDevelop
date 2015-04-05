<?php
class FrontController
{
    static function main()
    {
        //Incluimos algunas clases:
        require_once "config/view.php";
        require_once 'model/Usuarios.php'; //de configuracion
        require_once'controller/UsuariosController.php'; //PDO con singleton
        require_once 'config/view.php'; //Mini motor de plantillas
        
        $URI = explode("?", $_SERVER['REQUEST_URI']);
        $url = explode("index.php/", $URI[0]);
        $ruta;
        if(!empty($url[1])){
            $ruta = explode("/", $url[1]);
        }else{
            $ruta = "";   
        }
        
        //Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
        if(!empty($ruta[0]))
              $controllerName = $ruta[0] .'Controller';
        else
              $controllerName = "IndexController";
 
        //Lo mismo sucede con las acciones, si no hay acción, tomamos index como acción
        if(isset($ruta[1]))
              $actionName = $ruta[1];
        else
              $actionName = "index";
 
        $controllerPath = "controller/". $controllerName . '.php';
 
        //Incluimos el fichero que contiene nuestra clase controladora solicitada
        if(is_file($controllerPath))
              require_once $controllerPath;
        else
              die('El controlador no existe - 404 not found'.$controllerPath);
 
        //Si no existe la clase que buscamos y su acción, mostramos un error 404
        if (is_callable(array($controllerName, $actionName)) == false)
        {
            trigger_error ($controllerName . '->' . $actionName . '` no existe', E_USER_NOTICE);
            return false;
        }
        //Si todo esta bien, creamos una instancia del controlador y llamamos a la acción
        $controller = new $controllerName();
        $controller->$actionName();
    }
}
?>