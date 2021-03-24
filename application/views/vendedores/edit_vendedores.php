
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
                <li class="breadcrumb-item"><a href="#"><b>Vendedor</b></a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Vendedor</li>
            </ol>
        </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url('vendedores')?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                        <div class="card-body">
                        <form method="post" name="form_edit" class="user">

                        <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Ultima Atualização :&nbsp;</strong><?php echo formata_data_banco_com_hora($vendedor->vendedor_data_alteracao)?></p>
                        <fieldset class="mt-3 border p-2">
                        <legend class='text-sm'> <i class="fas fa-users"></i>&nbsp;Dados Vendedor</legend>
                        <div class="row">
                            <div class="form-group col-md-4">
                              <label for="nome">Nome Completo:</label>
                              <input type="text" class="form-control form-control-user" name="vendedor_nome_completo" value="<?php echo $vendedor->vendedor_nome_completo;?>">
                              <?php echo form_error('first_name',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Codigo Vendedor :</label>
                              <input type="text" class="form-control form-control-user" name="vendedor_codigo" readonly value="<?php echo $vendedor->vendedor_codigo;?>">
                              <?php echo form_error('last_name',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">E-mail Vendedor</label>
                              <input type="text" class="form-control form-control-user" name="vendedor_email" value="<?php echo $vendedor->vendedor_email?>">
                              <?php echo form_error('email',' <small class="form-text text-danger">','</small>');?>
                            </div>
                          </div>  
                            <div class="row"> 
                                <div class="form-group col-md-4">
                                    <label for="exampleInputPassword1">CPF :</label>
                                    <input type="text" class="form-control form-control-user cpf" name="vendedor_cpf" value="<?php echo $vendedor->vendedor_cpf?>">
                                    <?php echo form_error('vendedor_cpf',' <small class="form-text text-danger">','</small>');?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputPassword1">RG :</label>
                                    <input type="text" class="form-control form-control-user" name="vendedor_rg" value="<?php echo $vendedor->vendedor_rg?>">
                                    <?php echo form_error('vendedor_rg',' <small class="form-text text-danger">','</small>');?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputPassword1">Ativo :</label>
                                    <select class="custom-select" name="vendedor_ativo">
                                        <option value="0" <?php echo($vendedor->vendedor_ativo == 0) ? 'selected' : ''?>>Não</option>
                                        <option value="1" <?php echo($vendedor->vendedor_ativo == 1) ? 'selected' : ''?>>Sim</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputPassword1">Telefone :</label>
                                    <input type="text" class="form-control form-control-user phone_with_ddd" name="vendedor_telefone" value="<?php echo $vendedor->vendedor_telefone?>">
                                    <?php echo form_error('vendedor_telefone',' <small class="form-text text-danger">','</small>');?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputPassword1">Celular :</label>
                                    <input type="text" class="form-control form-control-user phone_with_ddd" name="vendedor_celular" value="<?php echo $vendedor->vendedor_celular?>">
                                    <?php echo form_error('vendedor_celular',' <small class="form-text text-danger">','</small>');?>
                                </div>
                          
                          
                            </div>

                          </fieldset>

                        <fieldset class="mt-3 border p-2">
                        <legend class='text-sm'> <i class="fas fa-map-marker-alt"></i>&nbsp;Informacoes de Endereco</legend>
                            <div class="row">

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputPassword1">CEP :</label>
                                        <input type="text" class="form-control form-control-user cep" name="vendedor_cep" value="<?php echo $vendedor->vendedor_cep?>">
                                        <?php echo form_error('vendedor_cep',' <small class="form-text text-danger">','</small>');?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Logradouro :</label>
                                        <input type="text" class="form-control form-control-user" name="vendedor_endereco" value="<?php echo $vendedor->vendedor_endereco?>">
                                        <?php echo form_error('vendedor_endereco',' <small class="form-text text-danger">','</small>');?>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="exampleInputPassword1">Numero :</label>
                                        <input type="text" class="form-control form-control-user" name="vendedor_numero_endereco" value="<?php echo $vendedor->vendedor_numero_endereco?>">
                                        <?php echo form_error('vendedor_numero_endereco',' <small class="form-text text-danger">','</small>');?>
                                    </div>

                            </div>
                            <div class="row">
                            
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputPassword1">Bairro :</label>
                                        <input type="text" class="form-control form-control-user" name="vendedor_bairro" value="<?php echo $vendedor->vendedor_bairro?>">
                                        <?php echo form_error('vendedor_bairro',' <small class="form-text text-danger">','</small>');?>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputPassword1">Cidade :</label>
                                        <input type="text" class="form-control form-control-user" name="vendedor_cidade" value="<?php echo $vendedor->vendedor_cidade?>">
                                        <?php echo form_error('vendedor_cidade',' <small class="form-text text-danger">','</small>');?>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputPassword1">Estado :</label>
                                        <input type="text" class="form-control form-control-user" name="vendedor_estado" value="<?php echo $vendedor->vendedor_estado?>">
                                        <?php echo form_error('vendedor_estado',' <small class="form-text text-danger">','</small>');?>
                                    </div>
                            </div>
                          </fieldset>

                        <fieldset class="mt-3 border p-2">
                        <legend class="text-sm"> <i class="far fa-list-alt"></i>&nbsp;Informações Adicionais</legend>    

                            <div class="row">      
                                    <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Obervações Adicionais :</label>
                                    <textarea class="form-control form-control-user" name="vendedor_obs"><?php echo $vendedor->vendedor_obs?></textarea>
                                    <?php echo form_error('vendedor_obs',' <small class="form-text text-danger">','</small>');?>
                                    </div>
                            </div>      
                                                
                    </fieldset>      
                            <input type="hidden" name="vendedor_id" value="<?php echo $vendedor->vendedor_id?>">
                            
                        
                          <div class="row p-2">
                            <div class="form-group col-md-12">
                              <button type="submit" class="btn btn-success btn-sm btn-block">Atualizar Informações</button>
                            </div>  
                          </div>
                        </form>
                        </div>
                    </div>
          
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
