<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function __construct(){
        parent::__construct();

        if (!$this->ion_auth->logged_in()){
          redirect('login');
        }

        $this->load->model('Core_model','model');
        $this->load->model('Produtos_model');

        date_default_timezone_set('America/Sao_Paulo');
      
    }
    
    public function index(){

        $data = array(

            'title'   => 'Gerenciamento Produtos',
            'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js'
            ),

            'styles' => Array(

                'vendor/datatables/dataTables.bootstrap4.min.css'
            ),

            'scripts' => array(

                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            
            'produtos' => $this->Produtos_model->get_all(),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('produtos/index');
            $this->load->view('layout/footer');
    
    }

    public function edit($produto_id = NULL){

            if(!$produto_id || !$this->model->get_by_id('produtos', array('produto_id' => $produto_id))){
                $this->session->set_flashdata('error', 'Produto não encontrado');
                redirect('produtos');

            } else {

                $this->form_validation->set_rules('produto_descricao','','trim|required|min_length[4]|max_length[145]|callback_check_produto_descricao');
                $this->form_validation->set_rules('produto_unidade','Unidade','trim|required|min_length[2]|max_length[5]');
                $this->form_validation->set_rules('produto_preco_custo','Produto Custo','trim|required|max_length[45]');
                $this->form_validation->set_rules('produto_preco_venda','Produto Venda','trim|required|max_length[45]|callback_check_produto_preco_venda');
                $this->form_validation->set_rules('produto_estoque_minimo','Estoque Minino','trim|greater_than_equal_to[0]');
                $this->form_validation->set_rules('produto_qtde_estoque','Produto Estoque','trim|required');
                //$this->form_validation->set_rules('produto_ativo','Produto Status','trim|required');
                $this->form_validation->set_rules('produto_obs','','trim|max_length[200]');

                if($this->form_validation->run()){

                  

                    $data = elements(

                        array(
                            
                            'produto_codigo',
                            'produto_marca_id',
                            'produto_categoria_id',
                           
                            'produto_fornecedor_id',
                            'produto_descricao',
                            'produto_unidade',
                            'produto_preco_custo',
                            'produto_preco_venda',
                            'produto_estoque_minimo',
                            'produto_qtde_estoque',
                            'produto_ativo',
                            'produto_obs',
                            
                        ),$this->input->post()
                    );

                   // echo '<pre>';

                   // print_r($data);

                   // exit();
        
                   $data = $this->security->xss_clean($data);
        
                    $this->model->update('produtos', $data , array('produto_id' => $produto_id));
                    redirect('produtos');
        

                } else {

                    $data = array(

                    'title'   => 'Edita Produtos',
                    'styles' => Array(

                        'vendor/datatables/dataTables.bootstrap4.min.css'
                    ),

                    'scripts' => array(

                        'vendor/datatables/jquery.dataTables.min.js',
                        'vendor/datatables/dataTables.bootstrap4.min.js',
                        'vendor/datatables/app.js',
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    
                    'produto' => $this->model->get_by_id('produtos', array('produto_id' => $produto_id)),
                    'marcas' => $this->model->get_all('marcas',array('marca_ativa' => 1)),
                    'categorias' => $this->model->get_all('categorias', array('categoria_ativa' => 1)),
                    'fornecedores' => $this->model->get_all('fornecedores', array('fornecedor_ativo' => 1)),
            );

       

            $this->load->view('layout/header', $data);
            $this->load->view('produtos/edit_produtos');
            $this->load->view('layout/footer');
            
            }
                    
        }

    }
    
    public function add(){

        $this->form_validation->set_rules('produto_descricao','','trim|required|min_length[4]|max_length[145]|is_unique[produtos.produto_descricao]');
        $this->form_validation->set_rules('produto_unidade','Unidade','trim|required|min_length[2]|max_length[5]');
        $this->form_validation->set_rules('produto_preco_custo','Produto Custo','trim|required|max_length[45]');
        $this->form_validation->set_rules('produto_preco_venda','Produto Venda','trim|required|max_length[45]|callback_check_produto_preco_venda');
        $this->form_validation->set_rules('produto_estoque_minimo','Estoque Minino','trim|greater_than_equal_to[0]');
        $this->form_validation->set_rules('produto_qtde_estoque','Produto Estoque','trim|required');
        //$this->form_validation->set_rules('produto_ativo','Produto Status','trim|required');
        $this->form_validation->set_rules('produto_obs','','trim|max_length[200]');


        if($this->form_validation->run()){

            $data = elements(

                array(
                    
                    'produto_codigo',
                    'produto_categoria_id',
                    'produto_marca_id',
                    'produto_fornecedor_id',
                    'produto_descricao',
                    'produto_unidade',
                    'produto_preco_custo',
                    'produto_preco_venda',
                    'produto_estoque_minimo',
                    'produto_qtde_estoque',
                    'produto_ativo',
                    'produto_obs',
                    
                ),$this->input->post()
            );

            $data = $this->security->xss_clean($data);

            $this->model->insert('produtos', $data);
            redirect('produtos');
        }

        
        $data = array(

            'title'   => 'Adicionar Produtos',
            'styles' => Array(

                'vendor/datatables/dataTables.bootstrap4.min.css'
            ),

            'scripts' => array(

                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
            ),
            
            'produto_codigo' => $this->model->generate_unique_code('produtos','numeric', 8, 'produto_codigo'),
            'marcas' => $this->model->get_all('marcas',array('marca_ativa' => 1)),
            'categorias' => $this->model->get_all('categorias', array('categoria_ativa' => 1)),
            'fornecedores' => $this->model->get_all('fornecedores', array('fornecedor_ativo' => 1)),
    );



    $this->load->view('layout/header', $data);
    $this->load->view('produtos/add_produtos');
    $this->load->view('layout/footer');

    }

    public function check_produto_descricao($produto_descricao){

        $produto_id = $this->input->post('produto_id');

        if($this->model->get_by_id('produtos', array('produto_descricao' => $produto_descricao, 'produto_id !=' => $produto_id))){

            $this->form_validation->set_message('check_produto_descricao','Já existe esse produto cadastrado');

            return FALSE;

        } else {

            return TRUE;
        }
    }

    public function check_produto_preco_venda($produto_preco_venda){

        $produto_preco_custo = $this->input->post('produto_preco_custo');

        if($produto_preco_custo > $produto_preco_venda){

            $this->form_validation->set_message('check_produto_preco_venda','O preço de venda dever ser igual ou maior que o preço de custo');

            return FALSE;

        } else {

            return TRUE;
        }
    }

    public function remove($produto_id = NULL){

        if(!$produto_id || !$this->model->get_by_id('produtos', array('produto_id' => $produto_id))){

            $this->session->set_flashdata('error','Produto não encontrado');
            redirect('produtos');

        }else{

            $this->model->delete('produtos', array('produto_id' => $produto_id));

            $this->session->set_flashdata('sucesso','Registro removido com sucesso');
            redirect('produtos');

        }

    }

}

   
