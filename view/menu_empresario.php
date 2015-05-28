<?php ob_start(); ?>
<nav class="navbar navbar-inverse">
    <a class="navbar-brand" href="admin"><span class="glyphicon glyphicon-home"></span> HOME</a>
    <ul class="nav navbar-nav">
      <li><a href="/EngineDevelop/index.php/Solicitud/Nueva"><span class="glyphicon glyphicon-th-list"></span> Solicitar Soporte</a></li>
      <li><a href="/EngineDevelop/index.php/Factura/Cliente"><span class="glyphicon glyphicon-tags"></span> Pago de Servicios</a></li>
      <li><a href="/EngineDevelop/index.php/Oferta/Catalogo"><span class="glyphicon glyphicon-briefcase"></span>Catalogo de Software</a></li>
      
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Mi Cuenta</span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="/EngineDevelop/index.php/Usuarios/Perfil"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
          <li><a href="/EngineDevelop/index.php/Usuarios/Salir"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>
        </ul>
      </li>
    </ul>
  </nav>
<?php $menu = ob_get_clean(); ?>