<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('home');?>">
                <div class="sidebar-brand-icon">
                <i class="fas fa-desktop"></i>
                </div>
                <div class="sidebar-brand-text mx-3">System os</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('home');?>">
                <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                    Modulos :
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVendas"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Vendas</span>
                </a>
                <div id="collapseVendas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha uma Opção:</h6>
                        <a title="gerenciar clientes" class="collapse-item" href="<?php echo base_url('os');?>"> <i class="fab fa-first-order"></i>&nbsp;&nbsp;Ordem Serviço</a>
                      
                      
                    </div>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-database"></i>
                    <span>Cadastros</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha uma Opção:</h6>
                        <a title="gerenciar clientes" class="collapse-item" href="<?php echo base_url('clientes');?>">  <i class="fas fa-user-tie text-gray-900"></i>&nbsp;&nbsp;Clientes</a>
                        <a title="gerenciar fornecedores"class="collapse-item" href="<?php echo base_url('fornecedores');?>"><i class="fas fa-people-arrows text-gray-900"></i>&nbsp;&nbsp;Fornecedores</a>
                        <a title="gerenciar vendedores" class="collapse-item" href="<?php echo base_url('vendedores');?>"><i class="fas fa-universal-access"></i>&nbsp;&nbsp;Vendedores</a>
                        <a title="gerenciar servicos" class="collapse-item" href="<?php echo base_url('servicos');?>"><i class="fas fa-user-md"></i>&nbsp;&nbsp;Servicos</a>
                      
                    </div>
                </div>
            </li>

     

            <!-- Nav Item - Utilities Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_Estoque"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-box-open"></i>
                    <span>Estoque</span>
                </a>
                <div id="collapse_Estoque" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha uma Opção:</h6>
                       
                        <a title="gerenciar marcas" class="collapse-item" href="<?php echo base_url('marcas');?>"><i class="far fa-copyright"></i>&nbsp;Marcas</a>
                        <a title="gerenciar categorias" class="collapse-item" href="<?php echo base_url('categorias');?>"><i class="fas fa-suitcase"></i>&nbsp;Categorias</a>
                        <a title="gerenciar categorias" class="collapse-item" href="<?php echo base_url('produtos');?>"><i class="fab fa-product-hunt"></i>&nbsp;Produtos</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_financeiro"
                    aria-expanded="true" aria-controls="collapseTwo">
                  
                    <i class="fas fa-dollar-sign"></i>
                    <span>Financeiro</span>
                </a>
                <div id="collapse_financeiro" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha uma Opção:</h6>
                        <a title="gerenciar pagamentos" class="collapse-item" href="<?php echo base_url('receber');?>"><i class="fas fa-hand-holding-usd"></i>&nbsp;Contas a Receber</a>
                        <a title="gerenciar pagamentos" class="collapse-item" href="<?php echo base_url('pagar');?>"><i class="fas fa-chart-line"></i>&nbsp;Contas a Pagar</a>
                        <a title="gerenciar pagamentos" class="collapse-item" href="<?php echo base_url('pagamentos');?>"><i class="fas fa-money-check-alt"></i>&nbsp;Formas de Pagamento</a>
    
                    </div>
                </div>
            </li>


            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Configurações
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
           

            <!-- Nav Item - Charts -->
        

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a title="Gerenciar Usuários" class="nav-link" href="<?php echo base_url('usuarios');?>">
                <i class="fas fa-users"></i>
                    <span>Usuários</span></a>
            </li>

            <li class="nav-item">
                <a title="Configurações do sistema" class="nav-link" href="sistema">
                    <i class="fas fa-cogs"></i>
                    <span>Sistema</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

</ul>

 <!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">