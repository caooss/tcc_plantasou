<div class="modal fade" id="NovoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
        <button type="button" class="btn-close cor_x" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            echo '
              <form action="../inc/validaCadastro.php" method="POST">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="material-icons">face</i>
                    </div>
                    <input type="text" name="nome" class="form-control" placeholder="Nome de Usuário" required/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="material-icons">email</i>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="exemplo@gmail.com" required/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="material-icons">lock</i>
                    </div>
                    <input type="password" name="senha" class="form-control" placeholder="*********" required/>
                  </div>
                </div>

                <div class="modal-footer float-right">
                  <button type="button" class="btn btn-outline-success fechar" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-outline-success borda-modal" onclick=return validar()>Cadastrar</button>
                </div>
                <input type="hidden" name="hidden" value="1"/>
              </form>
            ';
        ?>
      </div>
    </div>
  </div>
</div>