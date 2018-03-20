 <div class="row setup-content" id="step-3" >
                        <div class="concluido">
                        <img src="img/logo-image.png">  
                         <div class="concluiu" id="conclusao">
                             <div class="div_conclui"> 
                                 <div class="div_">
                                     <div class="div_concluiu">
                                         Você concluiu <br><span class="porcentage">90%</span> 
                                         <br> <span class="pequeno">do seu cadastro</span>>>>
                                     </div>

                                 </div>

                             </div>

                             <br>

                         </div>
                    </div>
                        <div class="col-xs-12">
                              <textarea  id="area9"  name="imovel"></textarea>
                              <textarea  id="area10" name="documentacao"></textarea>
                              <textarea  id="area11" name="marca"></textarea>
                              <textarea  id="area12" name="modelo"></textarea>
                              <textarea  id="area13" name="veiculo"></textarea>
                              <textarea  id="area14" name="valor"></textarea>
                            <div class="col-md-12 para-lado">
                               <h3>Dados do imóvel</h3><br>
                             
                                 <div class="form-group responsivo" >
                                    <label class="control-label" >Qual valor do imóvel?</label>
                                    <input style="width:85%;" maxlength="200" type="text"  id="valor" name="valor" class="form-control" placeholder=""  size="20" onKeydown="Formata(this,20,event,2)"/>
                                    <span class="input-group-addon renda" >,00</span>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label">Seu imóvel está financiado?</label>
                                </div>
                                 <div class="form-group" style="display: flex">
                                    <div class="btn-group btn-group-justified" >
                                        <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg">
                                        <button type="button" name="imovel" style="width:80%;" class="form-control  btn-primary imovel" id="imovel"  value="<?php echo $rows['id_resposta'] ?>">
                                            <?php echo $rows ['resposta'] ?>
                                          </button>
                                      </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                 <div class="form-group row ">
                                    <label class="control-label">A documentação do imóvel está ok?</label>

                                </div>
                                 <div class="form-group" style="display: flex">
                                    <div class="btn-group btn-group-justified" >
                                        <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg">
                                        <button  style="width:80%;" type="button" class="form-control  btn-primary  month documentacao" id="documentacao" value="<?php echo $rows['id_resposta'] ?>"  name="documentacao" ><?php echo $rows ['resposta'] ?></button>
                                      </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <h3>Dados do veículo</h3><br>
                                  <div class="form-group row ">
<!--                                    <label class="control-label">Qual o ano do seu                                                veículo?</label>-->
                                    
                                      <label class="control-label">Qual o marca do seu veículo?</label>
                                      <label class="control-label modelo_veiculo">Qual a modelo do seu veículo?</label>

                                </div>
                                 <div class="form-group" style="display: flex">

                                        <div class="btn-group btn-group-justified">
                                         <div class="btn-group btn-group-lg term">
                                             <select  class="form-control  marca " id="marca" name="marca">
                                               <?php $marca = $_POST['id_marca_veiculo'] ;?>
                                          
                                          <option value="<?php echo $rows['id_marca_veiculo']?>" selected="selected">Selecione</option>
                                         <?php
                                          require_once('conexao.php');
                                           $query = "SELECT * FROM marca_veiculo;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value= "<?php echo($rows['id_marca_veiculo']);?>"
                                            <?php echo ($result == $rows['id_marca_veiculo'])? "selected" : ""; ?>>
                                            <?php 
                                               echo utf8_decode($rows['marca_veiculo']);
                                             ?>
                                                
                                           <?php } ?>
                                            </select>
                                        </div>

                                        <div class="btn-group btn-group-lg row">
                                         <div class="modelo" id="modelo">
                                              
                                        </div>
                                        </div>


                                        </div>
                                </div>
<!--
                                 <div class="form-group ">
                                    <label class="control-label">Qual o modelo do seu veículo?</label>
                                  <div class="btn-group btn-group-justified">
                                         <div class="btn-group btn-group-lg">
                                             <select style="width:90%" class="form-control " id="outro" name="outro">
                                                <option value="0" selected>Selecione</option>
                                                <option value="parente">parente</option>
                                                <option value="trabalho">trabalho</option>
                                                <option value="funcional">funcional</option>
                                                <option value="outros">outros</option>
                                            </select>
                                        </div>
                                </div>
                                </div>
-->

                                 <div class="form-group row ">
                                    <label class="control-label">Seu veículo está financiado?</label>

                                </div>
                                 <div class="form-group" style="display: flex">
      
                                    <div class="btn-group btn-group-justified" >
                                        <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg">
                                        <button  name="veiculo" style="width:80%;" type="button" class="form-control  btn-primary  cheque veiculo" id="veiculo"  value="<?php echo $rows['id_resposta'] ?>"><?php echo $rows ['resposta'] ?></button>
                                      </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                 
                             
                              
                               
                            </div>
                            
                                 
                        </div>
                    </div>