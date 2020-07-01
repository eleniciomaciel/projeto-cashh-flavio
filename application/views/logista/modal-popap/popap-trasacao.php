<!-- Modal -->
<div class="modal fade" id="addTransacaoLogistaModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Dados para a transação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //form -->
                <form id="formAddClienteTransacao" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="cliente_logista">Nome completo</label>
                            <input type="text" class="form-control" name="cliente_logista" id="cliente_logista" placeholder="Ex.: Ana Silva" required>
                            <div class="invalid-feedback">
                                   Digite um nome por favor.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tel_user_cliente">Telefone</label>
                            <input type="text" class="form-control" name="tel_user_cliente" id="tel_user_cliente" placeholder="Ex.: (00)9. 0000-0000" required>
                            <div class="invalid-feedback">
                                Digite um telefone por favor.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cliente_email">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="email" class="form-control" name="cliente_email" id="cliente_email" placeholder="Ex.: ana_silva@email.com" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Digite um email válido por favor.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Região</label>
                            <select class="form-control" name="loja_logista" id="loja_logista">
                            <option selected="" disabled="" value="">Selecione aqui...</option>
                            <?php
                                $query = $this->db->get('regiao');
                                foreach ($query->result() as $row)
                                {
                                echo '<option value="'.$row->Id.'">'.$row->Nome.'</option>';
                                }
                            ?>
                            
                        </select>
                            <div class="invalid-feedback">
                               Selecione uma região por gentileza.
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Estado (UF)</label>
                            <select class="form-control" name="stateLoja_logista" id="stateLoja_logista">
                            </select>
                            <div class="invalid-feedback">
                            Selecione um estado por gentileza.
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom04">Cidade</label>
                            <select class="form-control" name="city_loja_logista" id="city_loja_logista">
                            </select>
                            <div class="invalid-feedback">
                            Selecione uma cidade por gentileza.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="cliente_bairro">Bairro:</label>
                            <input type="text" class="form-control" name="cliente_bairro" id="cliente_bairro" placeholder="Ex.: Centro" required>
                            <div class="invalid-feedback">
                                Digite o nome do bairro por favor.
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="cliente_endereco">Endereço:</label>
                            <input type="text" class="form-control" name="cliente_endereco" id="cliente_endereco" placeholder="Ex.: Rua A, s/n" required>
                            <div class="invalid-feedback">
                            Digite um endereço por favor.
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="cliente_cep">CEP</label>
                            <input type="text" class="form-control" name="cliente_cep" id="cliente_cep" placeholder="Ex.: 00.000-00" required>
                            <div class="invalid-feedback">
                                Digite um cep por favor.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="validationCustom03">Cor</label>
                            <select class="form-control" name="cor_pano_logista" id="cor_pano_logista">
                                <option selected disabled>Selecione aqui...</option>
                                <?php
                                    $query = $this->db->get('planos_icash');
                                    foreach ($query->result() as $row) {
                                        echo '<option value="' . $row->id_pl . '">'.$row->cor_pl . '</option>';
                                    }
                                    ?>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="validationCustom03">Parcelas</label>
                            <select class="form-control" name="select_parcelas_porcentual_logista" id="select_parcelas_porcentual_logista">
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="cliente_valor">Valor bruto</label>
                            <input type="text" class="form-control" name="cliente_valor" id="cliente_valor" placeholder="Ex.: 998.00" required>
                            <div class="invalid-feedback">
                                Digite um valor por favor
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="cliente_dados_bancario">Dados bancário</label>
                            <textarea class="form-control" name="cliente_dados_bancario"id="cliente_dados_bancario" placeholder="Aqui..." rows="3"></textarea>
                            <div class="invalid-feedback">
                                    Digite os dados para tranferencia bancária por favor.
                                </div>
                        </div>

                        <div class="col-md-12">
                        <label for="cliente_protocolo">Protocolo da transação</label>
                        <input type="text" name="cliente_protocolo" id="cliente_protocolo" class="form-control" aria-describedby="passwordHelpBlock">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                        O protocolo é uma seqencia de caracteres únicos para você acompanhar o status da transação.
                        </small>
                        </div>

                    </div>
                    <br>
                    <?php
                    $user_logista = $this->session->userdata('user');
                    extract($user_logista);
                    ?>
                    <input type="hidden" name="usuario_logista_is" id="usuario_logista_is" value="<?php echo $id_us;?>">
                    <input type="hidden" name="usuario_loja" id="usuario_loja" value="<?php echo $fk_us_loja;?>">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </form>
                <br>
                <div class="alert alert-danger print-error-msgLojaCliente" style="display:none"></div>
                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
                <!-- //fim form -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>




<!-- ======================================== Modal VISUALIZA DADOS DO CLIENTE -->
<div class="modal fade" id="viewDadosTransacaoLogistaModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Dados do cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //form -->
                <form id="updateClienteDados" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="clienteDados_cliente">Nome completo</label>
                            <input type="text" class="form-control" name="clienteDados_cliente" id="clienteDados_cliente" placeholder="Ex.: Ana Silva" required>
                            <div class="invalid-feedback">
                                   Digite um nome por favor.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="clienteDados_telefone">Telefone</label>
                            <input type="text" class="form-control" name="clienteDados_telefone" id="clienteDados_telefone" placeholder="Ex.: (00)9. 0000-0000" required>
                            <div class="invalid-feedback">
                                Digite um telefone por favor.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="clienteDados_email">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="email" class="form-control" name="clienteDados_email" id="clienteDados_email" placeholder="Ex.: ana_silva@email.com" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Digite um email válido por favor.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                            <label for="clienteDados_regiao">Região</label>
                            <select class="form-control" name="clienteDados_regiao" id="clienteDados_regiao">
                            <option selected="" disabled="" value="">Selecione aqui...</option>
                            <?php
                                $query = $this->db->get('regiao');
                                foreach ($query->result() as $row)
                                {
                                echo '<option value="'.$row->Id.'">'.$row->Nome.'</option>';
                                }
                            ?>
                            
                        </select>
                            <div class="invalid-feedback">
                               Selecione uma região por gentileza.
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="clienteDados_estado">Estado (UF)</label>
                            <select class="form-control" name="clienteDados_estado" id="clienteDados_estado">
                            <?php
                                $query = $this->db->get('estado');
                                foreach ($query->result() as $row)
                                {
                                echo '<option value="'.$row->Uf.'">'.$row->Nome.'</option>';
                                }
                            ?>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="clienteDados_cidade">Cidade</label>
                            <select class="form-control" name="clienteDados_cidade" id="clienteDados_cidade">
                            <?php
                                $query = $this->db->get('municipio');
                                foreach ($query->result() as $row)
                                {
                                echo '<option value="'.$row->Nome.'">'.$row->Nome.'</option>';
                                }
                            ?>
                            </select>
                            <div class="invalid-feedback">
                            Selecione uma cidade por gentileza.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="clienteDados_bairro">Bairro:</label>
                            <input type="text" class="form-control" name="clienteDados_bairro" id="clienteDados_bairro" placeholder="Ex.: Centro" required>
                            <div class="invalid-feedback">
                                Digite o nome do bairro por favor.
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="clienteDados_endereco">Endereço:</label>
                            <input type="text" class="form-control" name="clienteDados_endereco" id="clienteDados_endereco" placeholder="Ex.: Rua A, s/n" required>
                            <div class="invalid-feedback">
                            Digite um endereço por favor.
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="clienteDados_cepe">CEP</label>
                            <input type="text" class="form-control" name="clienteDados_cepe" id="clienteDados_cepe" placeholder="Ex.: 00.000-00" required>
                            <div class="invalid-feedback">
                                Digite um cep por favor.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="clienteDados_plano_cor">Cor</label>
                            <select class="form-control" name="clienteDados_plano_cor" id="clienteDados_plano_cor">
                                <option selected disabled>Selecione aqui...</option>
                                <?php
                                    $query = $this->db->get('planos_icash');
                                    foreach ($query->result() as $row) {
                                        echo '<option value="' . $row->id_pl . '">'.$row->cor_pl . '</option>';
                                    }
                                    ?>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="clienteDados_plano_percenti">Parcelas</label>
                            <select class="form-control" name="clienteDados_plano_percenti" id="clienteDados_plano_percenti">
                                <?php
                                    $query = $this->db->get('plano_comissao_pc');
                                    foreach ($query->result() as $row) {
                                        echo '<option value="' . $row->id. '">'.$row->parcelas_pc . '</option>';
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="clienteDados_valor">Valor bruto</label>
                            <input type="text" class="form-control" name="clienteDados_valor" id="clienteDados_valor" placeholder="Ex.: 998.00" required>
                            <div class="invalid-feedback">
                                Digite um valor por favor
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="clienteDados_observacao">Dados bancário</label>
                            <textarea class="form-control" name="clienteDados_observacao"id="clienteDados_observacao" placeholder="Aqui..." rows="3"></textarea>
                            <div class="invalid-feedback">
                                    Digite os dados para tranferencia bancária por favor.
                                </div>
                        </div>

                        <div class="col-md-12">
                        <label for="clienteDados_n_trans">Protocolo da transação</label>
                        <input type="text" name="clienteDados_n_trans" id="clienteDados_n_trans" class="form-control" aria-describedby="passwordHelpBlock">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                        O protocolo é uma seqencia de caracteres únicos para você acompanhar o status da transação.
                        </small>
                        </div>

                    </div>
                    <br>
                    <?php
                    $user_logista = $this->session->userdata('user');
                    extract($user_logista);
                    ?>
                    <input type="hidden" name="usuario_logista_is" id="usuario_logista_is" value="<?php echo $id_us;?>">
                    <input type="hidden" name="usuario_loja" id="usuario_loja" value="<?php echo $fk_us_loja;?>">
                    <button class="btn btn-danger" type="submit">Alterar</button>
                </form>
                <br>
                <div class="alert alert-danger print-error-msgLojaCliente" style="display:none"></div>
                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
                <!-- //fim form -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>