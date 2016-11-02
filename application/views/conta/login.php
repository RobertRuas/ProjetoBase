<!DOCTYPE html>
<html>
  <head>
    <title>Página de login</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
  </head>
  <body>

  <style>

 h1 {
    text-align: center;
  }
  form .width_full {
    width: 100%;
  }
  </style>

  <div class="container">
    <div class="row">

    <h1>Faça seu login</h1>

      <div class="col-sm-4"></div>

      <div class="col-sm-4">

        <div class="alert alert-<?php echo $alerta['class']; ?>">
        <?php 
            if($alerta != NULL){

              echo $alerta['mensagem'];

            } 
        ?>
          
        </div>

        <form method="post" class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
              <input name="email" required type="text" id="inputEmail" placeholder="Email" class="width_full">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">Senha</label>
            <div class="controls">
              <input name="senha" required type="password" id="inputPassword" placeholder="Senha" class="width_full">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <br>
              <button type="submit" class="btn btn-success">Entrar</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-sm-4"></div>

    </div>
  </div>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>