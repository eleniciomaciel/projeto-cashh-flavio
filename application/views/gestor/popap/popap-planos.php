
<!-- Modal -->
<div class="modal fade" id="listaPlanosModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Lista dos planos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //.table planos -->
        <table class="table" id="item-list_listaPlanos" style="width:100%">
        <button type="button" class="btn bg-orange btn-flat margin" id="addPlanoAction"  data-toggle="modal" data-target="#addPlanoModal">Add Plano</button>
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Plano</th>
                <th scope="col">Cor</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
        <!-- //.fim table -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <i class="fa fa-close"></i>    Fechar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Adiciona plano -->
<div class="modal fade" id="addPlanoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add planos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //.form plano -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Adicionar dados do plano</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formAddPlano_pl">
              <div class="box-body">

                <div class="form-group">
                  <label for="pl_nome">Nome do plano</label>
                  <input type="text" class="form-control" name="pl_nome" id="pl_nome" placeholder="Ex.: Prata" maxlength="50" required>
                </div>

                <div class="form-group">
                  <label for="pl_cor">Cor do plano</label>
                  <input type="text" class="form-control" name="pl_cor" id="pl_cor" placeholder="Ex.: Rosa"  maxlength="50" required>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="buttton_action">
                    <i class="fa fa-save"></i> Salvar
                </button>
              </div>
            </form>
            <br>
            <div class="alert alert-danger print-error-msg_pl" style="display:none"></div>
          </div>
        <!-- //.fim form plano -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-close"></i> Fechar
        </button>
      </div>
    </div>
  </div>
</div>



<!-- altera dados do plano plano -->
<div class="modal fade" id="alteraPlanoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar plano</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //.form plano -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Alterar dados do plano</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formUpdatePlano_pl">
              <div class="box-body">

                <div class="form-group">
                  <label for="get_pl_name">Nome do plano</label>
                  <input type="text" class="form-control" name="get_pl_name" id="get_pl_name" placeholder="Ex.: Prata" maxlength="50" required>
                </div>

                <div class="form-group">
                  <label for="get_pl_cor">Cor do plano</label>
                  <input type="text" class="form-control" name="get_pl_cor" id="get_pl_cor" placeholder="Ex.: Rosa"  maxlength="50" required>
                </div>

              </div>
              <!-- /.box-body -->
              <input type="hidden" name="id_user_pl" id="id_user_pl">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="buttton_action">
                    <i class="fa fa-refresh"></i> Alterar
                </button>
              </div>
            </form>
            <br>
            <div class="alert alert-danger print-error-msg_pl" style="display:none"></div>
          </div>
        <!-- //.fim form plano -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-close"></i> Fechar
        </button>
      </div>
    </div>
  </div>
</div>

<!--================================== Adiciona comissão ao plano ======================================= -->
<div class="modal fade" id="planoComissaoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Plano/Comissões</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //. form planos -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Adiciona comissões</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formAdd_pano_comissao">
              <div class="box-body">

                <div class="form-group col-md-6">
                  <label for="get_pl_name_comissao">Plano</label>
                  <input type="email" class="form-control" id="get_pl_name_comissao" disabled>
                </div>

                <div class="form-group col-md-6">
                  <label for="get_pl_name_cor">Cor</label>
                  <input type="email" class="form-control" id="get_pl_name_cor" disabled>
                </div>


                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Parcelas</label>
                  <select class="form-control" name="plc_parcelas" id="plc_parcelas" required>
                    <option selected disabled>Selecione aqui...</option>
                    <?php
                    for ($i = 1; $i <= 36; $i++) {
                        echo '<option value="'.$i.'">'.$i.' X</option>';
                    }
                    ?>
                    
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Comissão</label>
                  <input type="text" class="form-control" name="pc_plano" id="pc_plano" required>
                </div>

              </div>
              <!-- /.box-body -->
              <input type="hidden" name="id_user_plc" id="id_user_plc">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>
          </div>
        <!-- //.fim form -->
        
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>