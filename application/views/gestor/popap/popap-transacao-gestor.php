<!-- Modal -->
<div class="modal fade" id="transacaoGestorModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Transações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //lista das transações -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listagem de todas as transações</h3>

                        <button type="button" class="btn bg-maroon btn-flat margin pull-right" data-toggle="modal" data-target="#addTransacaoGestorModalLong">
                            <i class="fa fa-check-square-o"></i> Add transação
                        </button>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table id="item-list_transacao" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Loja</th>
                                    <th>Status</th>
                                    <th style="width: 40px">Data</th>
                                    <th>protocolo</th>
                                    <th>Nº TS</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- //lista das transações -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-close"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- adiciona transação-->
<div class="modal fade" id="addTransacaoGestorModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Dados da transação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //formulario -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulário de transação</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="addTransacaoPlano">
                        <div class="box-body">

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Loja</label>
                                <select class="form-control" name="loja_id" id="loja_id">
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
                                <label for="trs_protocolo">protocolo</label>
                                <input type="text" class="form-control" name="trs_protocolo" id="trs_protocolo" placeholder="Ex.: 0012300">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="trs_valor">Valor da TS</label>
                                <input type="text" class="form-control" name="trs_valor" id="trs_valor" placeholder="Ex.: R$ 1.500,00">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="select_plano">Plano/Cor</label>
                                <select class="form-control" name="select_plano" id="select_plano">
                                    <option selected disabled>Selecione aqui...</option>
                                    <?php
                                    $query = $this->db->get('planos_icash');
                                    foreach ($query->result() as $row) {
                                        echo '<option value="' . $row->id_pl . '">' . $row->nome_pl . ' <==> ' . $row->cor_pl . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="categoria_sub_cor">Parcela/Percentual</label>
                                <select class="form-control" name="categoria_sub_cor" id="categoria_sub_cor">
                                    <option selected disabled>Selecione aqui...</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="trs_data">Data</label>
                                <input type="date" class="form-control" name="trs_data" id="trs_data">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="trs_num_transacao">Nº Transação</label>
                                <input type="text" class="form-control" name="trs_num_transacao" id="trs_num_transacao" placeholder="Ex.: 4651247895">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Observações</label>
                                <textarea class="form-control" name="text_bserve" id="text_bserve" rows="3" placeholder="Digite aqui ..."></textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Salvar</button>
                        </div>
                    </form>
                    <br>
                    <div class="alert alert-danger print-error-msg_avs_transacao" style="display:none"></div>
                </div>
                <!-- //formulario -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-close"></i> Fechar</button>
                </button>
            </div>
        </div>
    </div>
</div>





<!-- altera dados da transação-->
<div class="modal fade" id="updateTransacaoGestorModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Dados da transação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //formulario -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulário de transação - Visualizar/Alterar</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="updateTransacaoPlano001">
                        <div class="box-body">

                            <div class="form-group col-md-12">
                                <label for="gt_pl_loja">Loja</label>
                                <select class="form-control" name="gt_pl_loja" id="gt_pl_loja">
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
                                <label for="gt_pl_protocol">protocolo</label>
                                <input type="text" class="form-control" name="gt_pl_protocol" id="gt_pl_protocol" placeholder="Ex.: 0012300">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gt_pl_valor">Valor da TS</label>
                                <input type="text" class="form-control" name="gt_pl_valor" id="gt_pl_valor" placeholder="Ex.: R$ 1.500,00">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gt_pl_plano_cor">Plano/Cor</label>
                                <select class="form-control" name="gt_pl_plano_cor" id="gt_pl_plano_cor">
                                    <option selected disabled>Selecione aqui...</option>
                                    <?php
                                    $query = $this->db->get('planos_icash');
                                    foreach ($query->result() as $row) {
                                        echo '<option value="' . $row->id_pl . '">' . $row->nome_pl . ' <==> ' . $row->cor_pl . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gt_pl_plano_percentual">Parcela/Percentual</label>
                                <select class="form-control" name="gt_pl_plano_percentual" id="gt_pl_plano_percentual" disabled>
                                    <option selected disabled>Selecione aqui...</option>
                                    <?php
                                    $query = $this->db->get('plano_comissao_pc');
                                    foreach ($query->result() as $row) {
                                        echo '<option value="' . $row->id . '">' . $row->percentual_pc .'</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gt_pl_data">Data</label>
                                <input type="date" class="form-control" name="gt_pl_data" id="gt_pl_data">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gt_pl_n_transacao">Nº Transação</label>
                                <input type="text" class="form-control" name="gt_pl_n_transacao" id="gt_pl_n_transacao" placeholder="Ex.: 4651247895">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Observações</label>
                                <textarea class="form-control" name="gt_pl_observacao" id="gt_pl_observacao" rows="3" placeholder="Digite aqui ..."></textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <input type="hidden" name="id_ts_active" id="id_ts_active">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-save"></i> Alterar</button>
                        </div>
                    </form>
                    <br>
                    <div class="alert alert-danger print-error-msg_avs_transacao" style="display:none"></div>
                </div>
                <!-- //formulario -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-close"></i> Fechar</button>
                </button>
            </div>
        </div>
    </div>
</div>


<!-- altera status da transação -->
<div class="modal fade" id="updateStatusTransactionModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Statu da transação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- //formualrio altera transação -->
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Alterar statu da transação</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formAlteraStatus_transacao">
              <div class="box-body">

                <div class="form-group col-md-6">
                  <label for="gt_pl_loja_sts">Loja</label>
                  <input type="email" class="form-control" id="gt_pl_loja_sts" disabled>
                </div>

                <div class="form-group  col-md-6">
                  <label for="gt_pl_n_transacao_sts">Nº TS</label>
                  <input type="text" class="form-control" id="gt_pl_n_transacao_sts" disabled>
                </div>

                <div class="form-group col-md-4">
                  <label for="gt_pl_cor">Cor</label>
                  <input type="email" class="form-control" id="gt_pl_cor" disabled>
                </div>

                <div class="form-group  col-md-4">
                  <label for="gt_pl_n_transacao_comissao">Comissão</label>
                  <input type="text" class="form-control" id="gt_pl_n_transacao_comissao" disabled>
                </div>

                <div class="form-group  col-md-4">
                  <label for="gt_pl_valor_negociado">Valor negociado</label>
                  <input type="text" class="form-control" id="gt_pl_valor_negociado" disabled>
                </div>

                <div class="input-group col-md-12">
                    <div class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Alterar staus</button>
                    </div>
                <!-- /btn-group -->
                <select class="form-control" name="gt_pl_status_sts" id="gt_pl_status_sts">
                    <option value="" selected disabled>Selecione aqui...</option>
                    <option value="Aberto">Aberto</option>
                    <option value="Aguardando">Aguardando</option>
                    <option value="Pendente">Pendente</option>
                    <option value="Aprovado">Aprovado</option>
                    <option value="Negado">Negado</option>
                  </select>
              </div>

              <input type="hidden" name="id_ts_sts" id="id_ts_sts">
              </div>
              <!-- /.box-body -->
            </form>
          </div>
       <!-- //formualrio altera transação -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>