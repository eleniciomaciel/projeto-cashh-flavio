<!-- Modal -->
<div class="modal fade" id="modalClienteTransacao" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Adicionar Transação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   form  ============================= -->
                <form>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCpf">CPF:</label>
                            <input type="text" class="form-control" id="inputCpf" placeholder="Ex.: 000.000.000-00">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputName">Cliente</label>
                            <input type="text" class="form-control" id="inputName">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputEnd">Endereço:</label>
                            <input type="text" class="form-control" id="inputEnd">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="planos_list">Plano:</label>
                            <select name="planos_list" id="planos_list" class="form-control">
                            <option selected disabled>Selecione aqui...</option>
                                <?php
                                    $query = $this->db->get('planos_icash');
                                    foreach ($query->result() as $row) {
                                        echo '<option value="' . $row->id_pl . '">'.$row->cor_pl . '</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState">Parcelas:</label>
                            <select class="form-control" name="select_plan2" id="select_plan2">
                            </select>
                            <!-- <input type="text" class="form-control" id="select_plan2" placeholder="Ex.: 120,00"> -->
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputVlBruto">Valor Bruto:</label>
                            <input type="text" class="form-control" id="inputVlBruto">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inpuVlPc">Valor parcelas:</label>
                            <input type="text" class="form-control" id="resultado" placeholder="Ex.: 120,00">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputMaq">Maquina Transação:</label>
                            <input type="text" class="form-control" id="inputMaq" placeholder="Ex.: 125">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
                <!-- ===================   fim form  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>