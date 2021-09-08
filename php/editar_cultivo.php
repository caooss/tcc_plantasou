<div class="modal fade" id="cultivo_editar<?php echo $cod_cultivo?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        $sql="SELECT * FROM cultivo WHERE cod_cultivo=$cod_cultivo";
                        $query=mysqli_query($con, $sql);

                        if(mysqli_num_rows($query)>0){
                            while(($edit=mysqli_fetch_assoc($query))!=NULL){
                                echo '
                                <form action="editar_cultivo.php" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label font">Nome</label> 
                                        <input type="text" name="nome" class="form-control" placeholder="Nome..." value="'.$edit['nome'].'" required/>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label font">Clima</label> 
                                        <textarea name="clima" value="'.$edit['clima'].'" required>'.$edit['clima'].'</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label font">Plantio</label> 
                                        <textarea name="plantio" value="'.$edit['plantio'].'" required>'.$edit['plantio'].'</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label font">Luminosidade</label> 
                                        <textarea name="luminosidade" value="'.$edit['luminosidade'].'" required>'.$edit['luminosidade'].'</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label font">Irrigação</label> 
                                        <textarea name="irrigacao" value="'.$edit['irrigacao'].'" required>'.$edit['irrigacao'].'</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label font">Tempo de Colheita</label> 
                                        <textarea name="temp_colheita" value="'.$edit['temp_colheita'].'" required>'.$edit['temp_colheita'].'</textarea>
                                    </div>

                                    <div class="modal-footer float-right">
                                            <button type="button" class="btn btn-outline-success fechar" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-outline-success borda-modal">Modificar</button>
                                    </div>

                                    <input type="hidden" name="editar" value="'.$cod_cultivo.'"/>
                                </form>';
                            }
                        }
                        echo'
                </div>
        </div>
    </div>
</div>';
                    }else{
                        include('../inc/conexao.php');
                            $nome=$_POST['nome'];
                            $clima=$_POST['clima'];
                            $plantio=$_POST['plantio'];
                            $luminosidade=$_POST['luminosidade'];
                            $irrigacao=$_POST['irrigacao'];
                            $temp_colheita=$_POST['temp_colheita'];
                            $cod_cultivo=$_POST['editar'];

                            $sqlEdit="UPDATE cultivo SET
                            nome='$nome',
                            clima='$clima',
                            plantio='$plantio',
                            luminosidade='$luminosidade',
                            irrigacao='$irrigacao',
                            temp_colheita='$temp_colheita'
                            WHERE cod_cultivo=$cod_cultivo";

                            $queryEdit=mysqli_query($con, $sqlEdit);

                            header("Location: ../php/cultivo.php");
                        }
?>