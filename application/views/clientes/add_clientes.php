
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
                <li class="breadcrumb-item"><a href="#"><b>Cliente</b></a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Cliente</li>
            </ol>
        </nav>
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                    <a href="<?php echo base_url('clientes')?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                        <div class="card-body">

                        <form method="POST" name="form_add" class="user" action="<?php echo base_url('clientes/add/')?>">
                        
                        <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="pessoa_fisica" name="cliente_tipo" class="custom-control-input" value="1" <?php echo set_checkbox('cliente_tipo', '1') ?> checked="">
                        <label class="custom-control-label pt-1" for="pessoa_fisica">Pessoa física</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="pessoa_juridica" name="cliente_tipo" class="custom-control-input" value="2" <?php echo set_checkbox('cliente_tipo', '2') ?> >
                        <label class="custom-control-label pt-1" for="pessoa_juridica">Pessoa jurídica</label>
                    </div>
                       

                        <fieldset class="mt-4 border p-2">
                        <legend class='text-sm'> <i class="fas fa-users"></i>&nbsp;Dados Pessoais</legend>
                        <div class="row">
                            <div class="form-group col-md-4">
                              <label for="nome">Nome :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_nome" value="<?php echo set_value('cliente_nome');?>">
                              <?php echo form_error('cliente_nome',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Sobrenome :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_sobrenome" value="<?php echo set_value('cliente_sobrenome');?>">
                              <?php echo form_error('cliente_sobrenome',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Data de Nascimento:</label>
                              <input type="date" class="form-control form-control-user-date" name="cliente_data_nascimento" value="<?php echo set_value('cliente_data_nascimento');?>">
                              <?php echo form_error('cliente_data_nascimento',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div>

                      <div class="row">

                      <div class="form-group col-md-4">
                            <div class="pessoa_fisica">
                                <label for="exampleInputPassword1">CPF :</label>
                                <input type="text" class="form-control form-control-user cpf" name="cliente_cpf" value="<?php echo set_value('cliente_cpf');?>">
                                <?php echo form_error('cliente_cpf',' <small class="form-text text-danger">','</small>');?>
                            </div>
                            <div class="pessoa_juridica">
                            <label for="exampleInputPassword1">CNPJ :</label>
                                  <input type="text" class="form-control form-control-user cnpj" name="cliente_cnpj" value="<?php echo set_value('cliente_cnpj');?>">
                                  <?php echo form_error('cliente_cnpj',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div>

                            <div class="form-group col-md-4">

                                <label class="pessoa_fisica">RG :</label>
                                <label class="pessoa_juridica">Inscrição Estadual :</label>
                                <input type="text" class="form-control form-control-user rg" name="cliente_rg_ie" value="<?php echo set_value('cliente_rg_ie');?>">
                                <?php echo form_error('cliente_rG',' <small class="form-text text-danger">','</small>');?>
                         
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">E-mail</label>
                              <input type="email" class="form-control form-control-user" name="cliente_email" value="<?php echo set_value('cliente_email');?>">
                              <?php echo form_error('cliente_email',' <small class="form-text text-danger">','</small>');?>
                            </div>

                      </div>

                         

                        <div class='row'>    

                           

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Telefone (Fixo)</label>
                              <input type="text" class="form-control form-control-user phone_with_ddd" name="cliente_telefone" value="<?php echo set_value('cliente_telefone');?>">
                              <?php echo form_error('cliente_telefone',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Telefone (Movel)</label>
                              <input type="text" class="form-control form-control-user phone_with_ddd" name="cliente_celular" value="<?php echo set_value('cliente_celular');?>">
                              <?php echo form_error('cliente_celular',' <small class="form-text text-danger">','</small>');?>
                            </div>

                       
                        </div>  


                      
    </fieldset>
                <fieldset class="mt-4 border p-2">
                    <legend> <i class="fas fa-map-marker-alt"></i>&nbsp;Informações de Endereço</legend>
                        <div class="row">
                            <div class="form-group col-md-3">
                              <label for="nome">CEP :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_cep" value="<?php echo set_value('cliente_cep');?>">
                              <?php echo form_error('cliente_cep',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="nome">Logradouro :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_endereco" value="<?php echo set_value('cliente_endereco');?>">
                              <?php echo form_error('cliente_endereco',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-3"><i class="fas fa-signal-alt-2"></i>
                              <label for="nome">Numero :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_numero_endereco" value="<?php echo set_value('cliente_numero_endereco');?>">
                              <?php echo form_error('cliente_numero_endereco',' <small class="form-text text-danger">','</small>');?>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-2">
                              <label for="nome">Bairro  :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_bairro" value="<?php echo set_value('cliente_bairro');?>">
                              <?php echo form_error('cliente_bairro',' <small class="form-text text-danger">','</small>');?>
                            </div>
                            
                            <div class="form-group col-md-6">
                              <label for="nome">Cidade  :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_cidade" value="<?php echo set_value('cliente_cidade');?>">
                              <?php echo form_error('cliente_cidade',' <small class="form-text text-danger">','</small>');?>
                            </div>

                         

                            <div class="form-group col-md-2">
                              <label for="nome">Estado  :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_estado" value="<?php echo set_value('cliente_estado');?>">
                              <?php echo form_error('cliente_estado',' <small class="form-text text-danger">','</small>');?>
                            </div>


                            <div class="form-group col-md-2">
                              <label for="nome">Complemento  :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_complemento" value="<?php echo set_value('cliente_complemento');?>">
                              <?php echo form_error('cliente_complemento',' <small class="form-text text-danger">','</small>');?>
                            </div>

                        </div>        
                </fieldset>

                <fieldset class="mt-4 border p-2">
                    <legend> <i class="far fa-list-alt"></i>&nbsp;Dados Adicionais</legend>
                      <div class="row">
                            <div class="form-group col-md-4">
                              <label for="nome">Nome da Mae :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_nome_mae" value="<?php echo set_value('cliente_nome_mae');?>">
                              <?php echo form_error('cliente_nome_mae',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="nome">Nome do pai :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_nome_pai" value="<?php echo set_value('cliente_nome_pai');?>">
                              <?php echo form_error('cliente_nome_pai',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Ativo</label>
                              <select class="custom-select" name="cliente_ativo">
                                  <option value="1">Ativo</option>
                                  <option value="0">Inativo</option>
                              </select>
                            </div>
                      </div>   

                        <div class="row">      

                            <div class="form-group col-md-12">
                              <label for="exampleInputPassword1">Obervações Adicionais :</label>
                              <textarea class="form-control form-control-user" name="cliente_obs"></textarea>
                              <?php echo form_error('cliente_obs',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div>       

                </fieldset>    
                   
                           
                            
                        </div>

                          <div class="row p-2">
                            <div class="form-group col-md-12">
                              <button type="submit" class="btn btn-success btn-sm btn-block">Cadastrar Cliente</button>
                            </div>  
                          </div>

                        </form>

                        </div>
                    </div>
          
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
