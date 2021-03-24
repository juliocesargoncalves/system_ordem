
        <!-- Sidebar -->

        <?php $this->load->view('layout/sidebar')?>

        <!-- End of Sidebar -->




    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
       <?php $this->load->view('layout/navbar')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
 <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><b>Pagamento</b></a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Pagamento</li>
            </ol>
        </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url($this->router->fetch_class());?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                <div class="card-body">

                    <form method="post" name="form_edit" class="user">

                      <input type="hidden" name="conta_pagar_id" value="<?php echo $conta->conta_pagar_id?>">
                      <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Ultima Atualização :&nbsp;</strong><?php echo formata_data_banco_com_hora($conta->conta_pagar_data_alteracao)?></p>

                        <fieldset class="mt-3 border p-2">

                        <legend class='text-sm'> <i class="fas fa-cash-register"></i>&nbsp;Cadastrar Pagamento</legend>

                        <div class="row">

                        <div class="form-group col-md-6">
                                <label for="nome">Fornecedor a Receber :</label>
     
                                <select class="custom-select contas_pagar" name="conta_pagar_fornecedor_id">
                                    <?php foreach ($fornecedores as $fornecedor) :?>
                                        <option value="<?php echo $fornecedor->fornecedor_id?>"<?php echo ($fornecedor->fornecedor_id == $conta->conta_pagar_fornecedor_id ? 'selected' : '')?>><?php echo $fornecedor->fornecedor_nome_fantasia;?></option>
                                    <?php endforeach;?>    
                                </select>
                                <?php echo form_error('conta_pagar_fornecedor_id',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="nome">Data de Vencimento :</label>
                                <input type="date" class="form-control form-control-user-date" name="conta_pagar_data_vencimento"  value="<?php echo $conta->conta_pagar_data_vencimento;?>">
                                 <?php echo form_error('conta_pagar_data_vencimento',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="nome">Valor a Pagar :</label>
                                <input type="text" class="form-control form-control-user money" name="conta_pagar_valor"  value="<?php echo $conta->conta_pagar_valor;?>">
                                 <?php echo form_error('conta_pagar_valor',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="nome">Status da conta :</label>
                                <select class="custom-select" name="conta_pagar_status">
                                    <option value="0" <?php echo ($conta->conta_pagar_status == 0 ? 'selected' : '')?>>Pendente</option>
                                    <option value="1" <?php echo ($conta->conta_pagar_status == 1 ? 'selected' : '')?>>Paga</option>
                                </select>
                                <?php echo form_error('conta_pagar_status',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Obervações Adicionais  :</label>
                                    <textarea class="form-control form-control-user" name="conta_pagar_obs"><?php echo $conta->conta_pagar_obs?></textarea>
                                    <?php echo form_error('conta_pagar_obs',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success btn-sm btn-block"<?php echo ($conta->conta_pagar_status == 1 ? 'disabled' : '')?> ><i class="fas fa-cash-register"></i>&nbsp;&nbsp;<?php echo ($conta->conta_pagar_status == 1 ? 'Conta Paga' : 'Salvar Pagamento')?></button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
