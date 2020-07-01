<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 id="business_list"><?=$this->db->count_all_results('loja')?></h3>

              <p>Lojas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informação <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>                <?php
               $query = $this->db->query('SELECT *,  SUM(valor_cm) as qtd_total_comissao FROM comissao_icash');
               $row = $query->row();
                if (! empty($row->qtd_total_comissao)) {
                  echo 'R$' . number_format($row->qtd_total_comissao, 2, ',', '.'); 
                } else {
                  echo '0,00';
                }
                ?></sup></h3>

              <p>Pagamentos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informação <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$this->db->count_all_results('usuarios_icashh')?></h3>

              <p>Usuários registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informação <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
                <?php
               $query = $this->db->query('SELECT *,  SUM(valor_t) as qtd_total FROM transacao_planos');
               $row = $query->row();
                if (! empty($row->qtd_total)) {
                  echo 'R$' . number_format($row->qtd_total, 2, ',', '.');
                } else {
                  echo '0,00';
                }
                ?>
              </h3>

              <p>Transações</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informação <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>