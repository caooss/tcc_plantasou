<div class="modal fade" id="quantidade_p<?php echo $idProduto?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifique a quantidade do produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            echo '
              <form action="../php/orcamento.php" method="POST">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i>Quantidade</i>
                    </div>
                    <input type="text" name="quantidade_nova" class="form-control"/>
                    <input type="hidden" value="1" name="quantidade_nova"/>
                  </div>
                </div>

                <div class="modal-footer float-right">
                  <button type="button" class="btn btn-color" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-color">Concluir</button>
                </div>
              </form>
            ';
        ?>
      </div>
    </div>
  </div>
</div>