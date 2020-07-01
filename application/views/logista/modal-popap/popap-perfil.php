<!-- Modal -->
<div class="modal fade" id="perfilLogistaModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Dados do perfíl</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- //formulario -->
                <form>

                    <div class="form-group">
                        <label for="getUsrLogis_loja">Loja</label>
                        <input type="text" class="form-control" name="getUsrLogis_loja" id="getUsrLogis_loja" placeholder="Ex.: Loja Cred">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Usuário</label>
                            <input type="email" class="form-control" name="getUsrLogis_nome" id="getUsrLogis_nome" placeholder="Ex.: Ana Silva.">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Telefone</label>
                            <input type="text" class="form-control" name="getUsrLogis_Telefone" id="getUsrLogis_Telefone" placeholder="Ex.: (00)9.0000-0000">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input type="text" class="form-control" name="getUsrLogis_email" id="getUsrLogis_email" placeholder="Ex.: ana@email.com">
                    </div>
                    <div class="form-group">
                        <label for="getUsrLogis_endereco">Endereço</label>
                        <input type="text" class="form-control" name="getUsrLogis_endereco" id="getUsrLogis_endereco" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="getUsrLogis_regiao">Região</label>
                            <select name="getUsrLogis_regiao" id="getUsrLogis_regiao" class="form-control">
                                <?php

                                $query = $this->db->get('regiao');
                                foreach ($query->result() as $row) {
                                    echo '<option value="' . $row->Id . '">' . $row->Nome . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="getUsrLogis_municipio">Cidade</label>
                            <select name="getUsrLogis_municipio" id="getUsrLogis_municipio" class="form-control">
                                <?php

                                $query = $this->db->get('municipio');
                                foreach ($query->result() as $row) {
                                    echo '<option value="' . $row->Nome . '">' . $row->Nome . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="getUsrLogis_uf">Estado</label>
                            <input type="text" class="form-control" name="getUsrLogis_uf" id="getUsrLogis_uf">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="getUsrLogis_cpf">CPF</label>
                            <input type="email" class="form-control" name="getUsrLogis_cpf" id="getUsrLogis_cpf" placeholder="Email">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Data de nascimento</label>
                            <input type="date" class="form-control" name="getUsrLogis_dt_nacimento" id="getUsrLogis_dt_nacimento" placeholder="Password">
                        </div>
                    </div>

                    <input type="hidden" name="" id="">

                </form>
                <!-- //fim formulario -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- Altera loginl -->
<div class="modal fade" id="loginLogisitaModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Dados do acesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="form-inline" id="newSenhaLogista">
                    <div class="form-group mb-2">
                        <label for="login_logista_email" class="sr-only">Login</label>
                        <input type="text" readonly class="form-control-plaintext" id="login_logista_email">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="logista_new_senha" class="sr-only">Nova senha</label>
                        <input type="password" class="form-control" name="logista_new_senha" id="logista_new_senha" placeholder="Nova Senha...">
                        
                    </div>
                    <input type="hidden" name="login_logista_id" id="login_logista_id">

                    <button type="submit" class="btn btn-primary mb-2">Confirmar alteração</button>
                    <small id="emailHelp" class="form-text text-muted">A senha deve conter pelo menos um número e uma letra maiúscula e minúscula, no mínimo 8 até 10 caracteres e um ou mais caracter especial #$^+=!*()@%&.</small>
                </form>
                <div class="alert alert-danger print-error-msgLog_perfil" style="display:none"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>