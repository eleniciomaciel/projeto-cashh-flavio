<!-- Modal -->
<div class="modal fade" id="lojasModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Painel dos lojistas</h4>
      </div>
      <div class="modal-body">
        <!-- //lojas listagem -->
        <section class="col-lg-12 connectedSortable">

          <!-- /.box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">
                <button type="button" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#myAddLojaModal">
                  <i class="fa fa-plus"></i> Add loja
                </button>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table" id="item-lista_lojas" style="width: 100%;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">cnpj</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Opções</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- //fim listagem lojas -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- // ====================================Modal visualiza loja e altera cadastro ======================================-->

<div class="modal fade" id="viewLojaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados da loja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //formulario -->
        <form id="formAUpdateLojaIcashh_2">
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="loja_nome_fant">Nome Fantasia:</label>
              <input type="text" class="form-control" name="loja_nome_fant" id="loja_nome_fant" placeholder="Ex.: Icashh">
            </div>

            <div class="form-group col-md-6">
              <label for="loja__regiao">Região:</label>
              <select name="loja__regiao" id="loja__regiao" class="form-control">
                <option selected="" disabled="">Selecione aqui...</option>
                <?php

                $query = $this->db->get('regiao');
                foreach ($query->result() as $row) {
                  echo '<option value="' . $row->Id . '">' . $row->Nome . '</option>';
                }

                ?>

              </select>
            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-2">
              <label for="loja_estado_br">Estado:</label>
              <select name="loja_estado_br" id="loja_estado_br" class="form-control">
                <?php

                $query = $this->db->get('estado');
                foreach ($query->result() as $row) {
                  echo '<option value="' . $row->Uf . '">' . $row->Nome . '</option>';
                }

                ?>
              </select>
            </div>

            <div class="form-group col-md-5">
              <label for="loja_cidade_br">Cidade:</label>
              <select name="loja_cidade_br" id="loja_cidade_br" class="form-control">
                <?php

                $query = $this->db->get('municipio');
                foreach ($query->result() as $row) {
                  echo '<option value="' . $row->Nome . '">' . $row->Nome . ' =>' . $row->Uf . '</option>';
                }

                ?>
              </select>
            </div>

            <div class="form-group col-md-5">
              <label for="loja_bairro_br">Bairro:</label>
              <input type="text" class="form-control" name="loja_bairro_br" id="loja_bairro_br">
            </div>

            <!-- <div class="form-group col-md-2">
              <label for="stateLoja">Estado:</label>
              <select name="stateLoja" id="stateLoja" class="form-control">
                <option selected-="" disabled="">Selecione aqui...</option>
              </select>
            </div>
            
            <div class="form-group col-md-5">
              <label for="city_loja">Cidade:</label>
              <select name="city_loja" id="city_loja" class="form-control">
                <option selected-="" disabled="">Selecione aqui...</option>
              </select>
            </div>

            <div class="form-group col-md-5">
              <label for="inputBairro">Bairro:</label>
              <input type="text" class="form-control" name="inputBairro" id="inputBairro">
            </div> -->

          </div>



          <div class="form-group col-md-12">
            <label for="loja_endereco">Endereço:</label>
            <input type="text" class="form-control" name="loja_endereco" id="loja_endereco" placeholder="Ex.: Rua 20 ver, s/n">
          </div>


          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="loja_email_br">Email</label>
              <input type="email" class="form-control" name="loja_email_br" id="loja_email_br" placeholder="Ex.: eu@email.com">
            </div>
            <div class="form-group col-md-3">
              <label for="loja_celula_br">Celular:</label>
              <input type="text" class="form-control" name="loja_celula_br" id="loja_celula_br">
            </div>

            <div class="form-group col-md-3">
              <label for="loja_telefo_br">Telefone:</label>
              <input type="text" class="form-control" name="loja_telefo_br" id="loja_telefo_br">
            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="loja_cnpj_br">CNPJ:</label>
              <input type="text" class="form-control" name="loja_cnpj_br" id="loja_cnpj_br">
            </div>

            <div class="form-group col-md-6">
              <label for="loja__insc_uf_br">Inscrição estadual:</label>
              <input type="text" class="form-control" name="loja__insc_uf_br" id="loja__insc_uf_br" placeholder="Ex.: 100249-95">
            </div>

            <!-- ===================   dados bancario  ============================= -->
            <h3 class="box-title">Dados bancário</h3>

            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Informações da conta da empresa</h3>
              </div>
              <div class="box-body">
                <div class="row">

                  <div class="col-xs-3">
                    <label for="loja__banco_br">Banco:</label>
                    <input type="text" name="loja__banco_br" id="loja__banco_br" class="form-control" placeholder="Ex.: Caixa Econômica Federal">
                  </div>
                  <div class="col-xs-4">
                    <label for="loja__tipoconta_br">Tipo de conta:</label>
                    <select name="loja__tipoconta_br" id="loja__tipoconta_br" class="form-control">
                      <option value="Conta-corrente">Conta-corrente</option>
                      <option value="Conta poupança">Conta poupança</option>
                      <option value="Conta salário">Conta salário</option>
                      <option value="Conta digital">Conta digital</option>
                      <option value="Conta universitária">Conta universitária</option>
                      <option value="Conta Conjunta">Conta Conjunta</option>
                      <option value="Conta Mista">Conta Mista</option>
                    </select>
                  </div>
                  <div class="col-xs-5">
                    <label for="loja__tipooperacao_br">Número da operação:</label>
                    <input type="number" name="loja__tipooperacao_br" id="loja__tipooperacao_br" class="form-control" placeholder="Ex.: 013">
                  </div>

                  <div class="col-xs-6">
                    <label for="loja__num_agencia_br">Número da agência:</label>
                    <input type="number" name="loja__num_agencia_br" id="loja__num_agencia_br" class="form-control" placeholder="Ex.: 0069">
                  </div>

                  <div class="col-xs-6">
                    <label for="loja__num_conta_br">Número da conta:</label>
                    <input type="number" name="loja__num_conta_br" id="loja__num_conta_br" class="form-control" placeholder="Ex.: 013">
                  </div>

                  <div class="col-xs-12">
                    <label for="loja__nome_titular_br">Titular da conta:</label>
                    <input type="text" name="loja__nome_titular_br" id="loja__nome_titular_br" class="form-control" placeholder="Ex.: Ana Maria." maxlength="60">
                  </div>

                  <div class="form-group col-md-12">
                    <label>Observações</label>
                    <textarea class="form-control" rows="3" name="loja__observacao_br" id="loja__observacao_br" placeholder="Digite aqui ..."></textarea>
                  </div>

                </div>
              </div>
              <!-- /.box-body -->
            </div>



            <!-- ===================   fim dados banco  ============================= -->
          </div>

          <input type="hidden" name="id_loja" id="id_loja">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Alterar</button>
        </form>
        <br>
        <div class="alert alert-danger print-error-msgAvisoUpdate" style="display:none"></div>
        <!-- //fim formaulario -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>







<!-- ============================================== Modal adiciona loja =============================== -->
<div class="modal fade" data-backdrop="static" id="myAddLojaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lojas</h4>
      </div>
      <div class="modal-body">
        <!-- //formulario -->
        <form id="formAddLojaIcashh_2">
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="inputFantazia">Nome Fantasia:</label>
              <input type="text" class="form-control" name="inputFantazia" id="inputFantazia" placeholder="Ex.: Icashh">
            </div>

            <div class="form-group col-md-6">
              <label for="country_loja">Região:</label>
              <select name="country_loja" id="country_loja" class="form-control">
                <option selected="" disabled="">Selecione aqui...</option>
                <?php
                $query = $this->db->get('regiao');

                foreach ($query->result() as $row) {
                  echo '<option value="' . $row->Id . '">' . $row->Nome . '</option>';
                }
                ?>

              </select>
            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-2">
              <label for="stateLoja">Estado:</label>
              <select name="stateLoja" id="stateLoja" class="form-control">
                <option selected-="" disabled="">Selecione aqui...</option>
              </select>
            </div>
            <div class="form-group col-md-5">
              <label for="city_loja">Cidade:</label>
              <select name="city_loja" id="city_loja" class="form-control">
                <option selected-="" disabled="">Selecione aqui...</option>
              </select>
            </div>

            <div class="form-group col-md-5">
              <label for="inputBairro">Bairro:</label>
              <input type="text" class="form-control" name="inputBairro" id="inputBairro">
            </div>

          </div>



          <div class="form-group col-md-12">
            <label for="inputEndereco">Endereço:</label>
            <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" placeholder="Ex.: Rua 20 ver, s/n">
          </div>


          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" name="inputEmail4" id="inputEmail4" placeholder="Ex.: eu@email.com">
            </div>
            <div class="form-group col-md-3">
              <label for="inputTelCel">Celular:</label>
              <input type="text" class="form-control" name="inputTelCel" id="inputTelCel">
            </div>

            <div class="form-group col-md-3">
              <label for="inputTel">Telefone:</label>
              <input type="text" class="form-control" name="inputTel" id="inputTel">
            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="input_cnpj">CNPJ:</label>
              <input type="text" class="form-control" name="input_cnpj" id="input_cnpj">
            </div>

            <div class="form-group col-md-6">
              <label for="inputInscricao_estadual">Inscrição estadual:</label>
              <input type="text" class="form-control" name="inputInscricao_estadual" id="inputInscricao_estadual" placeholder="Ex.: 100249-95">
            </div>

            <h3 class="box-title">Dados bancário</h3>

            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Informações da conta da empresa</h3>
              </div>
              <div class="box-body">
                <div class="row">

                  <div class="col-xs-3">
                    <label for="banco_nome">Banco:</label>
                    <input type="text" name="banco_nome" id="banco_nome" class="form-control" placeholder="Ex.: Caixa Econômica Federal">
                  </div>
                  <div class="col-xs-4">
                    <label for="tipo_conta_banco">Tipo de conta:</label>
                    <select name="tipo_conta_banco" id="tipo_conta_banco" class="form-control">
                      <option value="Conta-corrente">Conta-corrente</option>
                      <option value="Conta poupança">Conta poupança</option>
                      <option value="Conta salário">Conta salário</option>
                      <option value="Conta digital">Conta digital</option>
                      <option value="Conta universitária">Conta universitária</option>
                      <option value="Conta Conjunta">Conta Conjunta</option>
                      <option value="Conta Mista">Conta Mista</option>
                    </select>
                  </div>
                  <div class="col-xs-5">
                    <label for="tipo_variacao_banco">Número da operação:</label>
                    <input type="number" name="tipo_variacao_banco" id="tipo_variacao_banco" class="form-control" placeholder="Ex.: 013">
                  </div>

                  <div class="col-xs-6">
                    <label for="tipo_numero_agencia_banco">Número da agência:</label>
                    <input type="number" name="tipo_numero_agencia_banco" id="tipo_numero_agencia_banco" class="form-control" placeholder="Ex.: 0069">
                  </div>

                  <div class="col-xs-6">
                    <label for="tipo_numero_conta_banco">Número da conta:</label>
                    <input type="number" name="tipo_numero_conta_banco" id="tipo_numero_conta_banco" class="form-control" placeholder="Ex.: 013">
                  </div>

                  <div class="col-xs-12">
                    <label for="tipo_titular_conta_banco">Titular da conta:</label>
                    <input type="text" name="tipo_titular_conta_banco" id="tipo_titular_conta_banco" class="form-control" placeholder="Ex.: Ana Maria." maxlength="60">
                  </div>

                </div>
              </div>
              <!-- /.box-body -->
            </div>


            <div class="form-group col-md-12">
              <label>Observações</label>
              <textarea class="form-control" rows="3" name="obserbe_banco" id="obserbe_banco" placeholder="Digite aqui ..."></textarea>
            </div>
          </div>

          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
        </form>
        <br>
        <div class="alert alert-danger print-error-msgLoja_cashh" style="display:none">
          <!-- //fim formaulario -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
        </div>
      </div>
    </div>
  </div>