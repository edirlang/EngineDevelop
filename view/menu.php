<?php ob_start(); ?>
  <nav class="navbar navbar-inverse">
    <a class="navbar-brand" href="admin"><span class="glyphicon glyphicon-home"></span> HOME</a>
    <ul class="nav navbar-nav">
      <li ><a href="/EngineDevelop/index.php"><span class="glyphicon glyphicon-book"></span> Quienes Somos</a></li>
      <li><a href="/EngineDevelop/index.php/index/Mision"><span class="glyphicon glyphicon-list"></span> Mision</a></li>
      <li><a href="/EngineDevelop/index.php/index/Vision"><span class="glyphicon glyphicon-briefcase"></span> Vision</a></li>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Login</span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/EngineDevelop/index.php/Usuarios/login"><span class="glyphicon glyphicon-log-out"></span>Ingresar</a></li>
            <li><a href="/EngineDevelop/index.php/Usuarios/Nuevo"><span class="glyphicon glyphicon-plus"></span>Nueva Cuenta</a></li>
          </ul>
        </li>
      </ul>
    </nav>
<?php $menu = ob_get_clean(); ?>