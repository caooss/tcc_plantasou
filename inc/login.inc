<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Entre com seu E-mail e Senha</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            echo '
              <form action="../inc/validaCadastro.php" method="POST">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="material-icons">email</i>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="exemplo@gmail.com"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="material-icons">lock</i>
                    </div>
                    <input type="password" name="senha" class="form-control" placeholder="123456789"/>
                  </div>
                </div>

                <div class="modal-footer float-right">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
              </form>

              <div modal-footer float-left>
                <button type="button" class="btn btn-secundary btn-cadastrar" data-bs-toggle="modal" data-bs-target="#NovoUsuario">
                  Cadastrar
                </button>
              </div>
            ';
        ?>
      </div>
    </div>
  </div>
</div>