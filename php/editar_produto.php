<div class="modal fade" id="produto_editar<?php echo $produto?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_">Edite um produto</h5>
                <button type="button" class="btn-close cor_x" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <?php
                    if(empty($_POST)){
                        include('../inc/conexao.php');
                        $sql="SELECT * FROM produto WHERE cod_produto=$produto";
                        $query=mysqli_query($con, $sql);

                        if(mysqli_num_rows($query)>0){
                            while(($edit=mysqli_fetch_assoc($query))!=NULL){
                                echo '
                                <form action="editar_produto.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Produto</label> 
                                        <input type="text" name="nome" class="form-control" placeholder="Produto..." value="'.$edit["nome"].'" required/>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Vitaminas</label> 
                                        <input type="text" name="vitaminas" class="form-control" placeholder="Vitaminas..." value="'.$edit["vitaminas"].'"/ required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Benefícios</label> 
                                        <input type="text" name="beneficios" class="form-control" placeholder="Benefícios..." value="'.$edit["beneficios"].'"/ required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Preço</label> 
                                        <input type="number" step="any" name="preco" class="form-control" placeholder="Preço..." value="'.$edit["preco"].'"/ required>
                                    </div>';

                                    echo '
                                    <div class="mb-3">
                                        <select name="cod_cultivo" value="'.$edit["cod_cultivo"].'">
                                    ';
                            }
                        }
                        

                            
                            $sql_="SELECT cod_cultivo, nome FROM cultivo";
                            $query_=mysqli_query($con, $sql_);

                            if(mysqli_num_rows($query_)>0){
                                while(($cod_do_cultivo=mysqli_fetch_assoc($query_))!=NULL){
                                    echo'
                                        <option value="'.$cod_do_cultivo["cod_cultivo"].'">'.$cod_do_cultivo["nome"].'</option>
                                    ';
                                }
                            }
                            echo'
                                    </select>
                                <div>
                            ';

                            include('../inc/disconnect.php');

                            echo'
                            <div class="mb-3 mx-auto">
                                <label for="exampleFormControlInput1" class="form-label">Imagem</label>
                                <input type="file" class="form-control" id="exampleFormControlInput1_" name="imagem">
                            </div>

                            <div class="modal-footer float-right">
                                <button type="button" class="btn btn-outline-success fechar" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-outline-success borda-modal">Modificar</button>
                            </div>

                            <input type="hidden" name="editar" value="'.$produto.'"/>
                        </form>
                </div>
        </div>
    </div>
</div>';
                    }else{
                        include('../inc/conexao.php');
                        if($_FILES['imagem']['size'] == 0){
                            $nome=$_POST['nome'];
                            $vitaminas=$_POST['vitaminas'];
                            $beneficios=$_POST['beneficios'];
                            $preco=$_POST['preco'];
                            $cod_cultivo=$_POST['cod_cultivo'];
                            $produto=$_POST['editar'];

                            $sqlEdit="UPDATE produto SET
                            nome='$nome',
                            vitaminas='$vitaminas',
                            beneficios='$beneficios',
                            preco=$preco,
                            cod_cultivo=$cod_cultivo
                            WHERE cod_produto=$produto";

                            $queryEdit=mysqli_query($con, $sqlEdit);

                            header("Location: ../php/produtos.php");
                            
                        }else{
                            $nome=$_POST['nome'];
                            $vitaminas=$_POST['vitaminas'];
                            $beneficios=$_POST['beneficios'];
                            $preco=$_POST['preco'];
                            $cod_cultivo=$_POST['cod_cultivo'];
                            $imagem=$_FILES['imagem'];
                            $produto=$_POST['editar'];


                            $extensao=strtolower(substr($imagem['name'], -4)); //pega a extensão
                            $novo_nome=md5(time()).$extensao; //define um nome novo para o arquivo
                            $diretorio="../imgs/plantas/"; //define o diretório para onde enviaremos o arquivo

                            move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome); //efetua o upload

                            $sqlEdit="UPDATE produto SET
                            nome='$nome',
                            vitaminas='$vitaminas',
                            beneficios='$beneficios',
                            preco=$preco,
                            cod_cultivo=$cod_cultivo,
                            imagem='$novo_nome'
                            WHERE cod_produto=$produto";

                            $queryEdit=mysqli_query($con, $sqlEdit);

                            header("Location: ../php/produtos.php");
                        }
                        
                    }
                    ?>