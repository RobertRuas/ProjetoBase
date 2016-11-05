<!DOCTYPE html>
<html>
  <head>
    <?php require 'application/views/includes/header.php'; ?>
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
          <?php require 'application/views/includes/menu_lateral.php'; ?>
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
      	<p><em>Usuario logado: <?php echo $nome; ?> (<?php echo $this->session->userdata('created'); ?>)<hr></em></p>
      	
		<p>

    <?php 
      
      if(isset($tela)){
        switch ($tela) {

          default:

              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              ///////// PAGINA DE LISTAR USUARIOS
              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              echo '<a href="' . base_url('conta/usuarios_cadastrar/') . '">
              <button class="btn btn-success">Cadastrar Novo</button></a>';
              echo '<table class="table table-striped table-hover">';
              echo '  <caption>Usuarios Cadastrados</caption>';
              echo '  <thead>';
              echo '    <tr class="success">';
              echo '      <th>#</th>';
              echo '      <th>Nome</th>';
              echo '      <th>Email</th>';
              echo '      <th>Senha (Não Criptografada)</th>';
              echo '      <th></th>';
              echo '    </tr>';
              echo '  </thead>';
              echo '  <tbody>';

              foreach ($usuarios->result() as $row)
              {
              echo '    <tr>';
              echo '      <td>'          . $row->id    . '</td>';
              echo '      <td>'          . $row->nome  . '</td>';
              echo '      <td>'          . $row->email . '</td>';
              echo '      <td><strike>'  . $row->senha . '</strike></td>';
              echo '      <td>';
              echo '        <a href="' . base_url('conta/usuarios_ver/'     . $row->id) . '"><button class="btn btn-success">Ver</button></a>';
              echo '        <a href="' . base_url('conta/usuarios_editar/'  . $row->id) . '"><button class="btn btn-success">Editar</button></a>';
              echo '        <a href="' . base_url('conta/usuarios_excluir/' . $row->id) . '"><button class="btn btn-danger">Excluir</button></a>';
              echo '      </th>';
              echo '    </tr>';
              }

              echo '  </tbody>';
              echo '</table>';

              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            break;
          
          case 'ver':
            echo "visualizar " . $id_usuario;
            break;

          case 'cadastrar':
            ?>
                <form  method="post" class="form-horizontal">
                    <input type="hidden" name="cadastrar">

                    <div class="control-group">
                      <label class="control-label" for="inputNome">Nome</label>
                      <div class="controls">
                        <input name="nome" required type="text" id="inputNome" value="<?php echo set_value('nome'); ?>" placeholder="Nome Completo">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="inputEmail">Email</label>
                      <div class="controls">
                        <input name="email" required type="email" id="inputEmail" value="<?php echo set_value('email'); ?>" placeholder="Email">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="inputPassword">Senha</label>
                      <div class="controls">
                        <input name="senha" required type="password" id="inputPassword" placeholder="Senha">
                      </div>
                    </div>

                    <div class="control-group"><br>
                      <div class="controls">
                        <input name="senha2" required type="password" id="inputPassword2" placeholder="Repita Senha">
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="controls">
                        <br>
                        <button type="submit" class="btn btn-success">Entrar</button>
                      </div>
                    </div>

                </form>

            <?php
            break;

          case 'editar':
            echo "Editar " . $id_usuario;
            break;

          case 'excluir':
            echo "Excluir " . $id_usuario;
            break;
        }
      }

    ?>

		</p>

      </div>

    </div>

    <div class="row rodape">Robert @ 2016</div>
  </div>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>