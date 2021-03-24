
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
                <li class="breadcrumb-item"><a href="#"><b>Sistema</b></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
            </ol>
        </nav>

        <?php if($message = $this->session->flashdata('error')):?>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="alert alert-danger alert-dismissible fade show text text-center " role="alert">
                        <i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo '<strong>'.$message.'</strong>';?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            </div>
        <?php endif;?>

        <?php if($message = $this->session->flashdata('sucesso')):?>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="alert alert-success alert-dismissible fade show text text-center " role="alert">
                        <i class="far fa-smile-wink"></i>&nbsp;&nbsp;<?php echo '<strong>'.$message.'</strong>';?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            </div>
        <?php endif;?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url('/home')?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
                            &nbsp;<b> Voltar</b></a>
                        </div>
          <div class="card-body">
                    <form method="post" name="form_edit" class="user">
                      <div class="row">

                          <div class="form-group col-md-4">
                              <label for="nome">Razão Social :</label>
                              <input type="text" class="form-control form-control-user" name="sistema_razao_social" value="<?php echo $sistema->sistema_razao_social;?>">
                              <?php echo form_error('sistema_razao_social',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Nome Fantasia :</label>
                              <input type="text" class="form-control form-control-user" name="sistema_nome_fantasia" value="<?php echo $sistema->sistema_nome_fantasia;?>">
                              <?php echo form_error('sistema_nome_fantasia',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">CNPJ :</label>
                              <input type="text" class="form-control form-control-user cnpj" name="sistema_cnpj" value="<?php echo $sistema->sistema_cnpj?>">
                              <?php echo form_error('sistema_cnpj',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-2">
                              <label for="exampleInputPassword1">Inscrição Estadual :</label>
                              <input type="text" class="form-control form-control-user" name="sistema_ie" value="<?php echo $sistema->sistema_ie?>">
                              <?php echo form_error('sistema_ie',' <small class="form-text text-danger">','</small>');?>
                          </div>
                      </div>
                      <div class="row">      

                          <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">E-mail :</label>
                              <input type="text" class="form-control form-control-user" name="sistema_email" value="<?php echo $sistema->sistema_email?>">
                              <?php echo form_error('sistema_email',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Site da Empresa :</label>
                              <input type="text" class="form-control form-control-user" name="sistema_site_url" value="<?php echo $sistema->sistema_site_url?>">
                              <?php echo form_error('sistema_site_url',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Telefone Celular :</label>
                              <input type="text" class="form-control form-control-user" name="sistema_telefone_movel" value="<?php echo $sistema->sistema_telefone_movel;?>">
                              <?php echo form_error('sistema_telefone_movel',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-3">
                              <label for="nome">Telefone Fixo :</label>
                              <input type="text" class="form-control form-control-user phone_with_ddd " name="sistema_telefone_fixo" value="<?php echo $sistema->sistema_telefone_fixo;?>">
                              <?php echo form_error('sistema_telefone_fixo',' <small class="form-text text-danger">','</small>');?>
                          </div>

                        </div>  

                        <div class="row">      

                          <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">CEP :</label>
                              <input type="text" class="form-control form-control-user cep" name="sistema_cep" value="<?php echo $sistema->sistema_cep?>">
                              <?php echo form_error('sistema_cep',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-1">
                              <label for="exampleInputPassword1">Numero :</label>
                              <input type="text" class="form-control form-control-user" name="sistema_numero" value="<?php echo $sistema->sistema_numero;?>">
                              <?php echo form_error('sistema_numero',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Endereço :</label>
                              <input type="text" class="form-control form-control-user" name="sistema_endereco" value="<?php echo $sistema->sistema_endereco?>">
                              <?php echo form_error('sistema_endereco',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          

                          <div class="form-group col-md-3">
                              <label for="nome">Cidade :</label>
                              <input type="text" class="form-control form-control-user" name="sistema_cidade" value="<?php echo $sistema->sistema_cidade;?>">
                              <?php echo form_error('sistema_cidade',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-2">
                              <label for="nome">Estado :</label>
                              <input type="text" class="form-control form-control-user uf" name="sistema_estado" value="<?php echo $sistema->sistema_estado;?>">
                              <?php echo form_error('sistema_estado',' <small class="form-text text-danger">','</small>');?>
                          </div>

                        </div>  


              <div class="row">      

                    <div class="form-group col-md-12">
                      <label for="exampleInputPassword1">Obervaçoes Ordem de Serviço :</label>
                      <textarea class="form-control form-control-user" name="sistema_txt_ordem_servico"><?php echo $sistema->sistema_txt_ordem_servico?></textarea>
                      <?php echo form_error('sistema_txt_ordem_servico',' <small class="form-text text-danger">','</small>');?>
                    </div>
              </div>  
                    
              <div class="row p-1">
                    <div class="form-group col-md-12 ">
                        <button type="submit" class="btn btn-success  btn-block">Atualizar Informações</button>
                    </div>  
              </div>
      </form>

   </div>
                  
          
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
