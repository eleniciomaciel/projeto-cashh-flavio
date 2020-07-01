<!-- Button trigger modal -->
<div class="modal fade" id="myUsuariosModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Adicionar usuario</h4>
            </div>
            <div class="modal-body">
                <!-- // formulario -->
                <form id="formUsuariosDados001">
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="nam_loja_user">Loja:</label>
                            <select name="nam_loja_user" id="nam_loja_user" class="form-control" required="">
                                <option selected disabled>Selecione aqui...</option>
                                <?php

                                $query = $this->db->get('loja');
                                foreach ($query->result() as $row) {
                                    echo '<option value="' . $row->id_lj . '">' . $row->nome_fantasia_lj . '</option>';
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name_userLoja">Nome completo:</label>
                            <input type="text" class="form-control" name="name_userLoja" id="name_userLoja" placeholder="Ex.: Ana Maria" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="input_telUser">Telefone:</label>
                            <input type="tel" class="form-control" name="input_telUser" id="input_telUser" placeholder="Ex.: (74)" required="">
                        </div>

                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputEmailUser">Email</label>
                        <input type="email" class="form-control" name="inputEmailUser" id="inputEmailUser" placeholder="Ex.: ana@email.com" required="">
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="inputRegiao_user">Região</label>
                            <select name="inputRegiao_user" id="inputRegiao_user" class="form-control" required="">
                                <option selected disabled>Selecione aqui...</option>
                                <?php

                                $query = $this->db->get('regiao');
                                foreach ($query->result() as $row) {
                                    echo '<option value="' . $row->Id . '">' . $row->Nome . '</option>';
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="stateUser">UF</label>
                            <select name="stateUser" id="stateUser" class="form-control" required="">
                                <option selected disabled>Selecione aqui...</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="city_loja_user">Cidades</label>
                            <select name="city_loja_user" id="city_loja_user" class="form-control" required="">
                                <option selected disabled>Selecione aqui...</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputNivelUser">Nível</label>
                            <select name="inputNivelUser" id="inputNivelUser" class="form-control" required="">
                                <option selected="" disabled="">Selecione aqui...</option>
                                <option value="Gerente">Gerente</option>
                                <option value="Logista">Logista</option>
                                <option value="Suporte">Suporte</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputBairroUser">Bairro:</label>
                            <input type="text" class="form-control" name="inputBairroUser" id="inputBairroUser" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputCepUser">CEP</label>
                            <input type="text" class="form-control" name="inputCepUser" id="inputCepUser" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputEnderecoUser">Endereço</label>
                            <input type="text" class="form-control" name="inputEnderecoUser" id="inputEnderecoUser" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputDatNascimUser">Data de nascimento</label>
                            <input type="date" class="form-control" name="inputDatNascimUser" id="inputDatNascimUser" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputcpfUser">CPF</label>
                            <input type="text" class="form-control" name="inputcpfUser" id="inputcpfUser" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputRGUser">RG</label>
                            <input type="text" class="form-control" name="inputRGUser" id="inputRGUser" required="">
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                </form>
                <br>
                <div class="alert alert-danger print-error-msgLojaUsercashh" style="display:none"></div>
                <!-- //formulario fim -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================ lista dado do usuário =================================================== -->

<div class="modal fade" id="myUsuariosVisualizaUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Dados do usuario</h4>
            </div>
            <div class="modal-body">
                <!-- // formulario -->
                <form id="formUsuariosDadosUpdate002">
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="getUsr_user_loja">Loja:</label>
                            <select name="getUsr_user_loja" id="getUsr_user_loja" class="form-control" required="">
                                <option selected disabled>Selecione aqui...</option>
                                <?php

                                $query = $this->db->get('loja');
                                foreach ($query->result() as $row) {
                                    echo '<option value="' . $row->id_lj . '">' . $row->nome_fantasia_lj . '</option>';
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="getUsr_nome">Nome completo:</label>
                            <input type="text" class="form-control" name="getUsr_nome" id="getUsr_nome" placeholder="Ex.: Ana Maria" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="getUsr_Telefone">Telefone:</label>
                            <input type="tel" class="form-control" name="getUsr_Telefone" id="getUsr_Telefone" placeholder="Ex.: " required="">
                        </div>

                    </div>

                    <div class="form-group col-md-12">
                        <label for="getUsr_email">Email</label>
                        <input type="email" class="form-control" name="getUsr_email" id="getUsr_email" placeholder="Ex.: ana@email.com" required="">
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="getUsr_regiao">Região</label>
                            <select name="getUsr_regiao" id="getUsr_regiao" class="form-control" required="">
                                <option selected disabled>Selecione aqui...</option>
                                <?php

                                $query = $this->db->get('regiao');
                                foreach ($query->result() as $row) {
                                    echo '<option value="' . $row->Id . '">' . $row->Nome . '</option>';
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="getUsr_uf">UF</label>
                            <select name="getUsr_uf" id="getUsr_uf" class="form-control" required="">
                                <option selected disabled>Selecione aqui...</option>
                                <?php

                                $query = $this->db->get('estado');
                                foreach ($query->result() as $row) {
                                    echo '<option value="' . $row->Uf . '">' . $row->Nome . '</option>';
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="getUsr_municipio">Cidades</label>
                            <select name="getUsr_municipio" id="getUsr_municipio" class="form-control" required="">
                                <option selected disabled>Selecione aqui...</option>
                                <?php

                                $query = $this->db->get('municipio');
                                foreach ($query->result() as $row) {
                                    echo '<option value="' . $row->Nome . '">' . $row->Nome . '</option>';
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="getUsr_nivel">Nível</label>
                            <select name="getUsr_nivel" id="getUsr_nivel" class="form-control" required="">
                                <option selected="" disabled="">Selecione aqui...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Gerente">Gerente</option>
                                <option value="Logista">Logista</option>
                                <option value="Suporte">Suporte</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="getUsr_bairro">Bairro:</label>
                            <input type="text" class="form-control" name="getUsr_bairro" id="getUsr_bairro" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="getUsr_cepe">CEP</label>
                            <input type="text" class="form-control" name="getUsr_cepe" id="getUsr_cepe" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="getUsr_endereco">Endereço</label>
                            <input type="text" class="form-control" name="getUsr_endereco" id="getUsr_endereco" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="getUsr_dt_nacimento">Data de nascimento</label>
                            <input type="date" class="form-control" name="getUsr_dt_nacimento" id="getUsr_dt_nacimento" required="">
                        </div>


                        <div class="form-group col-md-4">
                            <label for="getUsr_cpf">CPF</label>
                            <input type="text" class="form-control" name="getUsr_cpf" id="getUsr_cpf" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="getUsr_rg">RG</label>
                            <input type="text" class="form-control" name="getUsr_rg" id="getUsr_rg" required="">
                        </div>


                    </div>
                    <input type="hidden" name="id_usuario" id="id_usuario">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Alterar</button>
                </form>
                <br>
                <div class="alert alert-danger print-error-msgLojaUsercashh" style="display:none"></div>
                <!-- //formulario fim -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- ===================   modal contrato  ============================= -->

<div class="modal fade" id="contratoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contrato do usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   form  ============================= -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados do contrato</h3>
                    </div>
                    <?php echo form_open('gestor/RelatoriosController/index', array('target' => '_blank'));?>
                
                    <div class="box-body">
                        <label for="">Nome do contratante:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="contrato_nome" id="contrato_nome" placeholder="Nome completo. Ex.: Ana Silva">
                        </div>
                        <br>

                        <h4>Documentos do contratante:</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">RG:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-vcard"></i>
                                    </span>
                                    <input type="text" name="contrato_rg" id="contrato_rg" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <label for="">CPF:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-vcard-o"></i>
                                    </span>
                                    <input type="text" name="contrato_cpf" id="contrato_cpf" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row -->
                        <br>
                        <h4>Dados de localização</h4>

                        <label for="">Endereço:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                            <input type="text" class="form-control" name="contrato_endereco" id="contrato_endereco" placeholder="Ex.: Rua Dom Pedro, nº 250">
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Bairro:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                    <input type="text" name="contrato_bairro" id="contrato_bairro" class="form-control" placeholder="Ex.: Centro">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-4">
                                <label for="">Cidade:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-map-o"></i>
                                    </span>
                                    <input type="text" name="contrato_cidade" id="contrato_cidade" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->

                            <!-- /.col-lg-6 -->
                            <div class="col-lg-2">
                                <label for="">Estado:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-map-pin"></i>
                                    </span>
                                    <input type="text" name="contrato_estado" id="contrato_estado" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row -->
                        <br>

                        <h4>Dados bancário:</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Banco:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-institution"></i>
                                    </span>
                                    <input type="text" name="contrato_banco" id="contrato_banco" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <label for="">Tide de conta:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-institution"></i>
                                    </span>
                                    <input type="text" name="contrato_tipo_conta" id="contrato_tipo_conta" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <label for="">Nº da conta:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input type="text" name="contrato_numero_conta" id="contrato_numero_conta" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-4">
                                <label for="">Agência:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </span>
                                    <input type="text" name="contrato_agencia" id="contrato_agencia" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-2">
                                <label for="">Op:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-check-square-o"></i>
                                    </span>
                                    <input type="text" name="contrato_operacao" id="contrato_operacao" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info"><i class="fa fa-cloud-upload"></i> Gerar contrato</button>
                    </div>
                    <?php echo  form_close();?>
                    <!-- /.box-body -->
                </div>
                <!-- ===================   fim form  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>




<!-- status do usuário -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Permissão de acesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formSatatusAltera">
                    <div class="input-group input-group-sm">
                        <select class="form-control" name="statusOption" id="statusOption">
                            <option value="1">Ativardo</option>
                            <option value="0">Desativado</option>
                        </select>
                        <input type="hidden" name="id_usuarioStatus" id="id_usuarioStatus">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-refresh"></i> Alterar</button>
                        </span>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="loginEnviaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Envia acesso ao usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //.formulario -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Usuário: <p id="MyuserLogin" style="color:brown"></p>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id="formLoginUserActive">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="loginUser_icash" class="col-sm-2 control-label">Login:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="loginUser_icash" id="loginUser_icash" placeholder="Ex.: ana@icashh.com" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="senhaUserIcash" class="col-sm-2 control-label">Senha:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="senhaUserIcash" id="senhaUserIcash" placeholder="Ex.: 123456" required="">
                                    <span class="help-block text-red">A senha deve conter pelo menos um número e uma letra maiúscula e minúscula, no mínimo 8 até 10 caracteres e um ou mais caracter especial #$^+=!*()@%&.</span>
                                </div>
                            </div>

                        </div>

                        <input type="hidden" name="id_usuarioLogin" id="id_usuarioLogin">
                        <input type="hidden" name="getUsr_token" id="getUsr_token">
                        <input type="hidden" name="getUsr_emailLogin" id="getUsr_emailLogin">
                        <div id="insere_aqui">

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info">Salvar</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                    <br>
                    <div class="alert alert-danger print-error-msgAvisoLogin" style="display:none"></div>
                </div>
                <!-- //.fim formulario -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>