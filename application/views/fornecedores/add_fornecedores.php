<?php
    /*
    
    [fornecedor_id] => 1
    [fornecedor_data_cadastro] => 2020-12-11 23:47:45
    [fornecedor_razao] => JOAO CESAR GONCALVES ME
    [fornecedor_nome_fantasia] => Panificadora Graziela
    [fornecedor_cnpj] => 50.101.243/0001-94
    [fornecedor_ie] => 555.46015-55
    [fornecedor_telefone] => (41) 3657-7745
    [fornecedor_celular] => (41) 99741-9994
    [fornecedor_email] => joaocesargoncalves.me@gmail.com
    [fornecedor_contato] => João Cesar
    [fornecedor_cep] => 83.505-000
    [fornecedor_endereco] => Avenida José Milek Filho
    [fornecedor_numero_endereco] => 701
    [fornecedor_bairro] => Jardim Campina do Arruda
    [fornecedor_complemento] => Loja 01
    [fornecedor_cidade] => Almirante Tamandaré
    [fornecedor_estado] => PR
    [fornecedor_ativo] => 1
    [fornecedor_obs] => 
    [fornecedor_data_alteracao] => 2020-12-11 23:47:45
  
     */

?>
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
                <li class="breadcrumb-item"><a href="#"><b>Fornecedor</b></a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Fornecedor</li>
            </ol>
        </nav>
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                    <a href="<?php echo base_url('fornecedores')?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                        <div class="card-body">

                    <form method="POST" name="form_add" class="user">
                        <fieldset class="mt-3 border p-2">
                        <legend class='text-sm'> <i class="fas fa-users"></i>&nbsp;Dados Fornecedor</legend>
                        <div class="row">
                            <div class="form-group col-md-3">
                              <label for="nome">Razão Social</label>
                              <input type="text" class="form-control form-control-user" name="fornecedor_razao" value="<?php echo set_value('fornecedor_razao');?>">
                              <?php echo form_error('fornecedor_razao',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Nome Fantasia :</label>
                              <input type="text" class="form-control form-control-user" name="fornecedor_nome_fantasia" value="<?php echo set_value('fornecedor_nome_fantasia');?>">
                              <?php echo form_error('fornecedor_nome_fantasia',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Fornecedor CNPJ :</label>
                              <input type="text" class="form-control form-control-user cnpj" name="fornecedor_cnpj" value="<?php echo set_value('fornecedor_cnpj');?>">
                              <?php echo form_error('fornecedor_cnpj',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Inscrição Estadual :</label>
                              <input type="text" class="form-control form-control-user " name="fornecedor_ie" value="<?php echo set_value('fornecedor_ie');?>">
                              <?php echo form_error('fornecedor_ie',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div>

                      <div class="row">
                            <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Telefone :</label>
                              <input type="text" class="form-control form-control-user phone_with_ddd" name="fornecedor_telefone" value="<?php echo set_value('fornecedor_telefone');?>">
                              <?php echo form_error('fornecedor_telefone',' <small class="form-text text-danger">','</small>');?>
                            </div>
                   
                            <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Celular :</label>
                              <input type="text" class="form-control form-control-user phone_with_ddd" name="fornecedor_celular" value="<?php echo set_value('fornecedor_celular');?>">
                              <?php echo form_error('fornecedor_celular',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">E-mail :</label>
                              <input type="email" class="form-control form-control-user" name="fornecedor_email" value="<?php echo set_value('fornecedor_email');?>">
                              <?php echo form_error('fornecedor_email',' <small class="form-text text-danger">','</small>');?>
                            </div>
              

                            <div class="form-group col-md-2">
                              <label for="exampleInputPassword1">Contato :</label>
                              <input type="text" class="form-control form-control-user" name="fornecedor_contato" value="<?php echo set_value('fornecedor_contato');?>">
                              <?php echo form_error('fornecedor_contato',' <small class="form-text text-danger">','</small>');?>
                            </div>

                      </div>
                    </fieldset>
                         
                    <fieldset class="mt-3 border p-2">
                   <legend class="text-sm"> <i class="fas fa-map-marker-alt"></i>&nbsp;Endereço Fornecedor</legend>
                            <div class='row'>    

                           

                            <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">CEP</label>
                              <input type="text" class="form-control form-control-user cep" name="fornecedor_cep" value="<?php echo set_value('fornecedor_cep');?>">
                              <?php echo form_error('fornecedor_cep',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Logradouro : </label>
                              <input type="text" class="form-control form-control-user" name="fornecedor_endereco" value="<?php echo set_value('fornecedor_endereco');?>">
                              <?php echo form_error('fornecedor_endereco',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-2">
                              <label for="exampleInputPassword1">Numero : </label>
                              <input type="text" class="form-control form-control-user" name="fornecedor_numero_endereco" value="<?php echo set_value('fornecedor_numero_endereco');?>">
                              <?php echo form_error('fornecedor_numero_endereco',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Bairro: </label>
                              <input type="text" class="form-control form-control-user" name="fornecedor_bairro" value="<?php echo set_value('fornecedor_bairro');?>">
                              <?php echo form_error('fornecedor_bairro',' <small class="form-text text-danger">','</small>');?>
                            </div>



                       
                       
                       </div>  

                   

                      <div class="row">

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Cidade: </label>
                              <input type="text" class="form-control form-control-user" name="fornecedor_cidade" value="<?php echo set_value('fornecedor_cidade');?>">
                              <?php echo form_error('fornecedor_cidade',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-2">
                              <label for="exampleInputPassword1">Estado: </label>
                              <input type="text" class="form-control form-control-user uf" name="fornecedor_estado" value="<?php echo set_value('fornecedor_estado');?>">
                              <?php echo form_error('fornecedor_estado',' <small class="form-text text-danger">','</small>');?>
                            </div>
                            
                            <div class="form-group col-md-2">
                              <label for="exampleInputPassword1">Complemento: </label>
                              <input type="text" class="form-control form-control-user" name="fornecedor_complemento" value="<?php echo set_value('fornecedor_complemento');?>">
                              <?php echo form_error('fornecedor_complemento',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Ativo</label>
                              <select class="custom-select" name="fornecedor_ativo">
                                  <option value="1">Ativo</option>
                                  <option value="0">Inativo</option>
                              </select>
                            </div>
                           
                        </div>   

                            </fieldset> 

                    <fieldset class="mt-3 border p-2">
                        <legend class="text-sm"> <i class="far fa-list-alt"></i>&nbsp;Informações Adicionais</legend>    

                        <div class="row">      
                            <div class="form-group col-md-12">
                            <label for="exampleInputPassword1">Obervações Adicionais :</label>
                            <textarea class="form-control form-control-user" name="fornecedor_obs"><?php echo set_value('fornecedor_obs');?></textarea>
                            <?php echo form_error('fornecedor_obs',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div>      
                                                
                    </fieldset>      
                           
                        </div>

                          <div class="row p-2">
                            <div class="form-group col-md-12">
                              <button type="submit" class="btn btn-success btn-sm btn-block">Cadastrar Novo Fornecedor</button>
                            </div>  
                          </div>

                        </form>

                       
                    </div>
          
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
