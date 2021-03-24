
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
                <li class="breadcrumb-item"><a href="#"><b>Produtos</b></a></li>
                <li class="breadcrumb-item active" aria-current="page">adicionar Produto</li>
            </ol>
        </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url('produtos')?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                        <div class="card-body">
                    <form method="post" name="form_edit" class="user">


                    <fieldset class="mt-3 border p-2">

                        <legend class='text-sm'> <i class="fab fa-product-hunt"></i>&nbsp;Dados Produtos</legend>

                        <div class="row">

                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Codigo Interno Produto :</label>
                                <input type="text" class="form-control form-control-user" name="produto_codigo"  readonly="disable" value="<?php echo $produto_codigo;?>">
                                <?php echo form_error('produto_codigo',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nome">Descricao Produto :</label>
                                <input type="text" class="form-control form-control-user" name="produto_descricao" value="<?php echo set_value('produto_descricao');?>">
                                <?php echo form_error('produto_descricao',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-3">
                              <label for="exampleInputPassword1">Situação do Produto</label>
                              <select class="custom-select" name="produto_ativo">
                                  <option value="1">Ativo</option>
                                  <option value="0">Inativo</option>
                              </select>
                            </div>

                     
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Marca do Produto :</label>
                                <select class="custom-select" name="produto_marca_id">
                                    <?php foreach ($marcas as $marca) :?>
                                        <option value="<?php echo $marca->marca_id?>"><?php echo $marca->marca_nome;?></option>
                                    <?php endforeach;?>    
                                </select>
                                <?php echo form_error('produto_marca',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="exampleInputPassword1">Categoria do Produto :</label>
                                <select class="custom-select" name="produto_categoria_id">
                                    <?php foreach ($categorias as $categoria) :?>
                                        <option value="<?php echo $categoria->categoria_id?>"><?php echo $categoria->categoria_nome;?></option>
                                    <?php endforeach;?>    
                                </select>
                                <?php echo form_error('categoria_nome',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nome">Fornecedor do Produto :</label>
                                <select class="custom-select" name="produto_fornecedor_id">
                                    <?php foreach ($fornecedores as $fornecedor) :?>
                                        <option value="<?php echo $fornecedor->fornecedor_id?>"><?php echo $fornecedor->fornecedor_nome_fantasia;?></option>
                                    <?php endforeach;?>    
                                </select>
                                <?php echo form_error('produto_fornecedor',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="nome">Produto Unidade :</label>
                                <input type="text" class="form-control form-control-user" name="produto_unidade" value="<?php echo set_value('produto_unidade');?>">
                                <?php echo form_error('produto_unidade',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mt-3 border p-2">

                        <legend class='text-sm'> <i class="fas fa-funnel-dollar"></i>&nbsp;Precificação e Estoque</legend>

                    <div class="row">

                    </div>


                        <div class="row">
                          
                        <div class="form-group col-md-3">
                                <label for="nome">Preço de custo :</label>
                                <input type="text" class="form-control form-control-user money" name="produto_preco_custo" value="<?php echo set_value('produto_preco_custo');?>">
                                <?php echo form_error('produto_preco_custo',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Preço de Venda :</label>
                                <input type="text" class="form-control form-control-user money" name="produto_preco_venda" value="<?php echo set_value('produto_preco_venda');?>">
                                <?php echo form_error('produto_preco_venda',' <small class="form-text text-danger">','</small>');?>   
                            </div>      

                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Estoque Minino :</label>
                                <input type="text" class="form-control form-control-user money" name="produto_estoque_minimo" value="<?php echo set_value('produto_estoque_minimo');?>">
                                <?php echo form_error('produto_estoque_minimo',' <small class="form-text text-danger">','</small>');?>   
                            </div>      

                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Quantidade Estoque :</label>
                                <input type="text" class="form-control form-control-user money" name="produto_qtde_estoque" value="<?php echo set_value('produto_qtde_estoque');?>">
                                <?php echo form_error('produto_qtde_estoque',' <small class="form-text text-danger">','</small>');?>   
                            </div>      

                        </div> 

                        </fieldset>

                        <fieldset class="mt-3 border p-2">

                            <legend class='text-sm'><i class="fas fa-question-circle"></i>&nbsp;Informações Adicionais</legend>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputPassword1">Obervações Adicionais :</label>
                                        <textarea class="form-control form-control-user" name="produto_obs"><?php echo set_value('produto_obs');?></textarea>
                                        <?php echo form_error('produto_obs',' <small class="form-text text-danger">','</small>');?>
                                    </div>
                                </div>

                        </fieldset>        
                        
                            <div class="row p-2">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm btn-block"><i class="fab fa-product-hunt"></i>&nbsp;Atualizar produto</button>
                                </div>  
                            </div>
                        </form>
                        </div>
                    </div>
          
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
