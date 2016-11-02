<!DOCTYPE html>
<html>
  <head>
    <title>Painel</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
  </head>
  <body>


<style>

h2 	{ padding: 10px 20px; font-weight: 700; color: #777; }
div { /* border: 1px #000 solid; */ }

.nav-bar { border-bottom: 1px #CCC solid; background-color: #EEE; }
.rodape  { border-top: 1px #CCC solid; background-color: #EEE; height: 80px; padding: 10px; text-align: center; font-size: 12px; }

nav.menu-lateral-painel { width: 100%; border-right: 1px #CCC solid; }
nav.menu-lateral-painel ul { margin: 0px; padding: 15px 0px; list-style: none; }
nav.menu-lateral-painel ul li { padding: 7px 0px; font-size: 14px; }
nav.menu-lateral-painel ul li a { text-decoration: none; display: block; color: #555; }
nav.menu-lateral-painel ul li.bt_sair { border-top: 1px #CCC solid; }
nav.menu-lateral-painel ul li.bt_sair a { color: #F55;}

</style>

  <div class="container">
    <div class="row nav-bar">
    	<h2>Painel do Usuario</h2>
	</div>

    <div class="row">
      <div class="col-sm-2">
      	<nav class="menu-lateral-painel">
	      	<ul>
	      		<li><a href="<?php echo base_url('conta/painel'); ?>">Painel</a></li>
	      		<li><a href="<?php echo base_url('conta/lista_usuarios'); ?>">Lista de Usuarios</a></li>
	      		<li><a href="<?php echo base_url('conta/configuracoes'); ?>">Configurações</a></li>
	      		<li class="bt_sair"><a href="<?php echo base_url('conta/logout'); ?>">Sair</a></li>
	      	</ul>
	     </nav>
      </div>

      <div class="col-sm-10">
		<p>
			<?php 

				$email = "vazio";

				if ($this->session->userdata('logado') == TRUE) {
					$nome = $this->session->userdata('nome');
				}
				else {
					$nome = "nenhum";
				}

			?>
		</p>
      	<p><em>Usuario logado: <?php echo $nome; ?> (<?php echo date('d/m/Y H:i:s'); ?>)<hr></em></p>
      	
        <p>Aqui vai o conteudo da pagina principal do painel</p>
      </div>

    </div>

    <div class="row rodape">Robert @ 2016</div>
  </div>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>