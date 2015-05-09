<?php ob_start(); ?>
<nav class="navbar navbar-inverse">
    <a class="navbar-brand" href="admin"><span class="glyphicon glyphicon-home"></span> HOME</a>
    <ul class="nav navbar-nav">
      <li ><a href="/EngineDevelop/index.php/Usuarios/index"><span class="glyphicon glyphicon-book"></span>Clientes</a></li>
      <li><a href="/EngineDevelop/index.php/index/Mision"><span class="glyphicon glyphicon-list"></span> Chat</a></li>
      <li><a href="/EngineDevelop/index.php/Empresa/index"><span class="glyphicon glyphicon-briefcase"></span>Empresas</a></li>
      
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Mi Cuenta</span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="/EngineDevelop/index.php/Usuarios/Detalles"><span class="glyphicon glyphicon-log-out"></span>Perfil</a></li>
          <li><a href="/EngineDevelop/index.php/Usuarios/Salir"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>
        </ul>
      </li>
    </ul>
  </nav>
<?php $menu = ob_get_clean(); ?>