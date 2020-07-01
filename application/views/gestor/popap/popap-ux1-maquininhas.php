<div class="modal fade" id="addMaquininhas" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Controle de maquinas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   table  ============================= -->
                <div class="table-responsive">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active" data-toggle="modal" data-target="#cadastroMaquininha">
                            <input type="radio" name="options" id="option1" checked><i class="fa fa-plus"></i> cadastrar maquina
                        </label>
                        <label class="btn btn-warning" data-toggle="modal" data-target="#cadastroMaquininhaLoja">
                            <input type="radio" name="options" id="option2"><i class="fa fa-street-view"></i> Loja maquina
                        </label>
                    </div>

                </div>
                <br>
                <table class="table" id="get_lista_lojas_com_maquinas" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">EMPRESA</th>
                            <th scope="col">Nº MÁQUINA</th>
                            <th scope="col">DATA</th>
                            <th scope="col">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <!-- ===================   fim table  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- ===================   cadstrar maquina  ============================= -->

<div class="modal fade" id="cadastroMaquininha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar maquininha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   form  ============================= -->
                <form id="form_add_maquininhas">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNumMaquina">Nº da maquina</label>
                            <input type="text" class="form-control" name="inputNumMaquina" id="inputNumMaquina">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputdataAquisicao">Data de aquisição</label>
                            <input type="date" class="form-control" name="inputdataAquisicao" id="inputdataAquisicao">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Modelo</label>
                        <input type="text" class="form-control" name="inputModelo" id="inputModelo" placeholder="Ex.: OP1">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFornecedor">Fornecedor(a)</label>
                        <input type="text" class="form-control" name="inputFornecedor" id="inputFornecedor" placeholder="Ex.: Tambarsa">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTelFornecedor">Telefone do fornecedor</label>
                            <input type="tel" class="form-control" name="inputTelFornecedor" id="inputTelFornecedor">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inpuEmailFornecedor">Email do fornecedor</label>
                            <input type="email" class="form-control" name="inpuEmailFornecedor" id="inpuEmailFornecedor">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputGarantia">Nº da garantia</label>
                            <input type="text" class="form-control" name="inputGarantia" id="inputGarantia">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="nogarantia" id="nogarantia" value="1">
                            <label class="form-check-label" for="gridCheck">
                                Possui garantia?
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="bt_add_makt btn btn-primary" id="add_maq_init"><i class="fa fa-save"></i> Salvar</button>
                </form>
                <br>
                <div class="alert alert-danger print-error-msgAddMaquin" style="display:none"></div>
                <!-- ===================   fim form  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>



<!-- ===================   loja maquina  ============================= -->

<div class="modal fade" id="cadastroMaquininhaLoja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar loja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   form  ============================= -->
                <form id="form_add_maquin_loja_cadastro">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputMaquina_loja">Nº da maquina</label>
                            <select name="list_select_maquininhas" id="list_select_maquininhas" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLoja">Loja</label>
                            <select name="list_select_lojas" id="list_select_lojas" class="form-control"></select>
                        </div>
                    </div>

                    <button type="submit" class="bt_add_makt_loja btn btn-primary" id="add_maq_init_loja"><i class="fa fa-save"></i> Salvar</button>
                </form>
                <br>
                <div class="alert alert-danger print-error-msg_maq_loja" style="display:none"></div>
                <br>
                <div class="alert alert-danger print-error-msgAddMaquin_loja" style="display:none"></div>
                <!-- ===================   fim form  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>