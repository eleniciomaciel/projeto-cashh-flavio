<!-- Button trigger modal -->
<div class="modal fade" id="listaComissaoModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Lista de acertos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //lista -->
                <div class="box">
                    <div class="box-header">
                        <button type="button" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#addAcertosModalLong">Add acertos</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed" id="item-list_lista_pagamento_comissao" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>LOJA</th>
                                    <th>PROTOCOLO</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Açao</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- //lista -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- adicionar acertos -->
<div class="modal fade" id="addAcertosModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicionar comissões</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formAddPagamento">
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Loja</label>
                            <select name="numero_protocol" id="numero_protocol" class="form-control">
                                <option value="" selected disabled>Selecione uma loja</option>
                                <?php
                                    $query = $this->db->get('loja');
                                    foreach($query->result() as $row)
                                    {
                                        echo '<option value="'.$row->id_lj.'">'.$row->nome_fantasia_lj.'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Escolha uma data</label>
                            <select name="state_loja" id="state_loja" class="form-control"></select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Nº da transação</label>
                            <select name="city" id="city" class="form-control">
                                <option value="" selected disabled>Selecione o número</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="vl_bruto">Valor Bruto</label>
                            <select name="vl_bruto" id="vl_bruto" class="form-control"></select>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="vl_pago">Valor do repasse</label>
                            <input type="text" pattern="^\d*(\.\d{0,2})?$" class="form-control" name="vl_pago" id="vl_pago">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputState_pg">Status</label>
                            <select name="inputState_pg" id="inputState_pg" class="form-control">
                                <option selected disabled>Selecione aqui...</option>
                                <option value="0">Aberto</option>
                                <option value="1">Transferido</option>
                                <option value="2">Aguardando</option>
                                <option value="3">Pendente</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Observação</label>
                            <textarea class="form-control" rows="3" name="observacao_pg" id="observacao_pg" placeholder="Digite aqui ..."></textarea>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                </form>
                <br>
                <div class="alert alert-danger print-error-msg_pg" style="display:none"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- adicionar acertos -->
<div class="modal fade" id="viewUpdateAcertosModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Dados do comissionado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formUpdatePagamento">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="pg_dindin_transacao">Nº da transação</label disabled>
                            <select name="pg_dindin_transacao" id="pg_dindin_transacao" class="form-control" disabled>
                                <option value="" selected disabled>Selecione um plano/cor</option>
                                <?php
                                    $query = $this->db->get('transacao_planos');
                                    foreach($query->result() as $row)
                                    {
                                        echo '<option value="'.$row->id_t.'">'.$row->n_transacao_t.'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pg_dindin_loja">Loja</label>
                            <input type="text" class="form-control" name="pg_dindin_loja" id="pg_dindin_loja" disabled>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="pg_dindin_valor">Valor do repasse</label>
                            <input type="text" pattern="^\d*(\.\d{0,2})?$" class="form-control" name="pg_dindin_valor" id="pg_dindin_valor" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pg_dindin_status">Status da transação</label>
                            <select name="pg_dindin_status" id="pg_dindin_status" class="form-control" required>
                                <option selected disabled>Selecione aqui...</option>
                                <option value="0">Aberto</option>
                                <option value="1">Transferido</option>
                                <option value="2">Aguardando</option>
                                <option value="3">Pendente</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Observação</label>
                            <textarea class="form-control" rows="3" name="pg_dindin_observacao" id="pg_dindin_observacao" placeholder="Digite aqui ..."></textarea>
                        </div>

                    </div>

                    <input type="hidden" name="id_pg" id="id_pg">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Alterar</button>
                </form>
                <br>
                <div class="alert alert-danger print-error-msg_pg" style="display:none"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>