        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel__" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel__">Entre com seu E-mail e Senha</h5>
                <button type="button" class="btn-close cor_x" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php
                  if(empty($_POST)){
                    echo '
                      <form action="login.php" method="POST">
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
                            <input type="password" name="senha" class="form-control" placeholder="*********"/>
                          </div>
                        </div>

                        <div class="modal-footer float-right">
                          <button type="button" class="btn btn-outline-success fechar" data-bs-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-outline-success borda-modal">Entrar</button>
                        </div>
                      </form>

                      <div modal-footer float-left>
                        <button type="button" class="btn btn-cadastrar fechar" data-bs-toggle="modal" data-bs-target="#NovoUsuario">
                          Cadastrar
                        </button>
                      </div>
                    ';
                  /*echo '
                  <script src="../js/jquery-3.5.1.min.js"></script>
                  <script src="../js/popper.min.js"></script>
                  <script src="../js/bootstrap.min.js"></script>;'*/
                  echo'

                  </div>
            </div>
          </div>
        </div>
          ';
          
          include "../inc/cadastro.php";
                    
                    }else{
                        include('../inc/conexao.php');
                        $email=$_POST['email'];
                        $senha=$_POST['senha'];

                        $sql="SELECT * FROM usuario";

                        $query=mysqli_query($con, $sql);

                        if(mysqli_num_rows($query)>0){
                            while(($usuario=mysqli_fetch_assoc($query))!=NULL){
                                if((((($email==$usuario['email']) && $email=="admin@admin.com")) && (($senha==$usuario['senha']) && $senha=="admin"))){
                                    setcookie('ADM', 1, time()+1800);
                                    header("Location: ../php/home_adm.php");
                                }else if(($email==$usuario['email']) && ($senha==$usuario['senha'])){
                                    setcookie('USER', $usuario['cod_usuario'], time()+1800);
                                    header("Location: ../php/home_user.php");
                                }
                            }
                            header("Location: ../inc/erro_login.php");
                        }
                    }
                    
                ?>