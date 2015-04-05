<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EngineDevelop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="Made with WOW Slider - Create beautiful, responsive image sliders in a few clicks. Awesome skins and animations. Jquery slider" />
  <!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
  <link rel="stylesheet" type="text/css" href="/Smart-Solutions/engine1/style.css" />
  <script type="text/javascript" src="/Smart-Solutions/engine1/jquery.js"></script>
  <link rel="stylesheet" href="/Smart-Solutions/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Smart-Solutions/css/bootstrap.css">
  <link rel="icon" type="image/png" href="/Smart-Solutions/Imagenes/ico.png" />
</head>

<body>
  <nav class="navbar navbar-inverse">
    <a class="navbar-brand" href="admin"><span class="glyphicon glyphicon-home"></span> HOME</a>
    <ul class="nav navbar-nav">
      <li ><a href="/EngineDevelop/index.php"><span class="glyphicon glyphicon-book"></span>Clientes</a></li>
      <li><a href="/EngineDevelop/index.php/index/Mision"><span class="glyphicon glyphicon-list"></span> Chat</a></li>
      <li><a href="/EngineDevelop/index.php/index/Vision"><span class="glyphicon glyphicon-briefcase"></span></a></li>
      
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Mi Cuenta</span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="/EngineDevelop/index.php/Usuarios/Index"><span class="glyphicon glyphicon-log-out"></span>Perfil</a></li>
          <li><a href="/EngineDevelop/index.php/Usuarios/Salir"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div class="container">
    <div class="row">
      <?php echo $contenido; ?>
    </div>  
  </div>

  <script language="javascript" type="text/javascript" src="/Smart-Solutions/js/jquery.js"></script>
  <script language="javascript" type="text/javascript" src="/Smart-Solutions/js/jquery.validate.js"></script>
  <script src="/Smart-Solutions/js/bootstrap.min.js"></script>
  <script src="/Smart-Solutions/js/jquery-ui.js"></script>
</body>   
</html>