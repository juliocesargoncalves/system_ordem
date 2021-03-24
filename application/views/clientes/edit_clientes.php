
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

                        <form method="POST" name="form_edit" class="user">
                        
                        <input type="hidden" name="cliente_id" value="<?php echo $cliente->cliente_id?>">
                        <input type="hidden" name="cliente_tipo" value="<?php echo $cliente->cliente_tipo?>">

                        <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Ultima Atualização :&nbsp;</strong><?php echo formata_data_banco_com_hora($cliente->cliente_data_alteracao)?></p>

                        <fieldset class="mt-4 border p-2">
                        <legend class='text-sm'> <i class="fas fa-users"></i>&nbsp;Dados Pessoais</legend>
                        <div class="row">
                            <div class="form-group col-md-4">
                              <label for="nome">Nome :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_nome" value="<?php echo $cliente->cliente_nome;?>">
                              <?php echo form_error('cliente_nome',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Sobrenome :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_sobrenome" value="<?php echo $cliente->cliente_sobrenome;?>">
                              <?php echo form_error('cliente_sobrenome',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Data de Nascimento:</label>
                              <input type="date" class="form-control form-control-user-date" name="cliente_data_nascimento" value="<?php echo $cliente->cliente_data_nascimento;?>">
                              <?php echo form_error('cliente_data_nascimento',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div>

                      <div class="row">

                         <div class="form-group col-md-4">

                              <?php if($cliente->cliente_tipo == 1):?>
                                  <label for="exampleInputPassword1">CPF :</label>
                                  <input type="text" class="form-control form-control-user cpf" name="cliente_cpf" value="<?php echo $cliente->cliente_cpf_cnpj;?>">
                                  <?php echo form_error('cliente_cpf',' <small class="form-text text-danger">','</small>');?>
                              <?php else:?>
                                  <label for="exampleInputPassword1">CNPJ :</label>
                                  <input type="text" class="form-control form-control-user cnpj" name="cliente_cnpj" value="<?php echo $cliente->cliente_cpf_cnpj;?>">
                                  <?php echo form_error('cliente_cnpj',' <small class="form-text text-danger">','</small>');?>
                              <?php endif;?>
                              
                                 
                          </div>

                            <div class="form-group col-md-4">

                              <?php if($cliente->cliente_tipo == 1):?>
                                <label for="exampleInputPassword1">RG :</label>
                                <input type="text" class="form-control form-control-user rg" name="cliente_rg_ie" value="<?php echo $cliente->cliente_rg_ie;?>">
                                <?php echo form_error('cliente_rG',' <small class="form-text text-danger">','</small>');?>
                              <?php else:?>
                                <label for="exampleInputPassword1">Inscricao Estadual :</label>

                                <input type="text" class="form-control form-control-user rg" name="cliente_ie" value="<?php echo $cliente->cliente_rg_ie;?>">
                                <?php echo form_error('cliente_ie',' <small class="form-text text-danger">','</small>');?>
                              <?php endif;?>
                                
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">E-mail</label>
                              <input type="email" class="form-control form-control-user" name="cliente_email" value="<?php echo $cliente->cliente_email?>">
                              <?php echo form_error('cliente_email',' <small class="form-text text-danger">','</small>');?>
                            </div>

                      </div>

                         

                        <div class='row'>    

                           

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Telefone (Fixo)</label>
                              <input type="text" class="form-control form-control-user phone_with_ddd" name="cliente_telefone" value="<?php echo $cliente->cliente_telefone?>">
                              <?php echo form_error('cliente_telefone',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Telefone (Movel)</label>
                              <input type="text" class="form-control form-control-user phone_with_ddd" name="cliente_celular" value="<?php echo $cliente->cliente_telefone?>">
                              <?php echo form_error('cliente_celular',' <small class="form-text text-danger">','</small>');?>
                            </div>

                       
                        </div>  


                      
    </fieldset>
                <fieldset class="mt-4 border p-2">
                    <legend> <i class="fas fa-map-marker-alt"></i>&nbsp;Informações de Endereço</legend>
                        <div class="row">
                            <div class="form-group col-md-3">
                              <label for="nome">CEP :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_cep" value="<?php echo $cliente->cliente_cep;?>">
                              <?php echo form_error('cliente_cep',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="nome">Logradouro :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_endereco" value="<?php echo $cliente->cliente_endereco;?>">
                              <?php echo form_error('cliente_endereco',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-3"><i class="fas fa-signal-alt-2"></i>
                              <label for="nome">Numero :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_numero_endereco" value="<?php echo $cliente->cliente_numero_endereco;?>">
                              <?php echo form_error('cliente_numero_endereco',' <small class="form-text text-danger">','</small>');?>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-2">
                              <label for="nome">Bairro  :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_bairro" value="<?php echo $cliente->cliente_bairro?>">
                              <?php echo form_error('cliente_bairro',' <small class="form-text text-danger">','</small>');?>
                            </div>
                            
                            <div class="form-group col-md-6">
                              <label for="nome">Cidade  :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_cidade" value="<?php echo $cliente->cliente_cidade;?>">
                              <?php echo form_error('cliente_cidade',' <small class="form-text text-danger">','</small>');?>
                            </div>

                         

                            <div class="form-group col-md-2">
                              <label for="nome">Estado  :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_estado" value="<?php echo $cliente->cliente_estado;?>">
                              <?php echo form_error('cliente_estado',' <small class="form-text text-danger">','</small>');?>
                            </div>


                            <div class="form-group col-md-2">
                              <label for="nome">Complemento  :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_complemento" value="<?php echo $cliente->cliente_complemento;?>">
                              <?php echo form_error('cliente_complemento',' <small class="form-text text-danger">','</small>');?>
                            </div>

                        </div>        
                </fieldset>

                <fieldset class="mt-4 border p-2">
                    <legend> <i class="far fa-list-alt"></i>&nbsp;Dados Adicionais</legend>
                      <div class="row">
                            <div class="form-group col-md-4">
                              <label for="nome">Nome da Mae :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_nome_mae" value="<?php echo $cliente->cliente_nome_mae;?>">
                              <?php echo form_error('cliente_nome_mae',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="nome">Nome do pai :</label>
                              <input type="text" class="form-control form-control-user" name="cliente_nome_pai" value="<?php echo $cliente->cliente_nome_pai;?>">
                              <?php echo form_error('cliente_nome_pai',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Ativo</label>
                              <select class="custom-select" name="cliente_ativo">
                                  <option value="1" <?php echo($cliente->cliente_ativo == 1) ? 'selected' : ''?>>Ativo</option>
                                  <option value="0" <?php echo($cliente->cliente_ativo== 0) ? 'selected' : ''?>>Inativo</option>
                              </select>
                            </div>
                      </div>   

                        <div class="row">      

                            <div class="form-group col-md-12">
                              <label for="exampleInputPassword1">Obervações Adicionais :</label>
                              <textarea class="form-control form-control-user" name="cliente_obs"><?php echo $cliente->cliente_obs?></textarea>
                              <?php echo form_error('cliente_obs',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div>       

                </fieldset>    
                   
                           
                            
                        </div>

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
