<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EngineDevelop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="/EngineDevelop/view/css/bootstrap.css">

</head>

<body>
  <?php 
  
  if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol']=='admin') {
      include "view/menu_admin.php";
    }elseif ($_SESSION['rol']=='empresario') {
      include "view/menu_empresario.php";
    }elseif ($_SESSION['rol']=='asesor') {
      include "view/menu_asesor.php";
    }
  }else{
    include "view/menu.php";
  }
   ?>
  <?php echo $menu ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <?php if(isset($_SESSION['error'])){ ?>
          <div class="alert alert-warning alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php  echo $_SESSION['error']; ?>
          </div>
          <?php }  
          $_SESSION['error']=null;
          ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <?php echo $contenido; ?>  
        </div>
    </div>  
  </div>

  <script language="javascript" type="text/javascript" src="/EngineDevelop/view/js/jquery.js"></script>
  <script language="javascript" type="text/javascript" src="/EngineDevelop/view/js/jquery.validate.js"></script>
  <script src="/EngineDevelop/view/js/bootstrap.min.js"></script>
  <script src="/EngineDevelop/view/js/bootstrap.js"></script>
  <script src="/EngineDevelop/view/js/jquery-ui.js"></script>
</body>   
</html>