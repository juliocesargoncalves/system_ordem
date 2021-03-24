<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Os extends CI_Controller {

	public function __construct(){
        parent::__construct();

        if (!$this->ion_auth->logged_in()){
          redirect('login');
        }

        $this->load->model('Core_model','model');
        $this->load->model('Ordem_model');
    
      
    }
    
    public function index(){

        $data = array(

            'title'   => 'Gerenciamento Ordem de Serviço',
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
            
            'ordem' => $this->Ordem_model->get_all(),
        );


      /*  echo '<pre>';

        print_r($data['ordem']);

        exit();

        */
            $this->load->view('layout/header', $data);
            $this->load->view('ordem/index');
            $this->load->view('layout/footer');
    
    }

    public function add(){
        
        $this->form_validation->set_rules('categoria_nome','Marca','trim|required|min_length[2]|max_length[45]|is_unique[marcas.marca_nome]');
   

        if($this->form_validation->run()){

            $data = elements(

                array(

                    'categoria_nome',
                    'categoria_ativa',
                   
                ),$this->input->post()
            );

            
            $data = $this->security->xss_clean($data);

            $this->model->insert('categorias', $data);
            redirect('categorias');


        } else {

            $data = array(

                'title'   => 'Cadastrar Categorias',
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
                'vendor/clientes.js'

                    ),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('categorias/add_categorias');
            $this->load->view('layout/footer');

        }
    }

    public function edit($categoria_id = NULL){

        if(!$categoria_id || !$this->model->get_by_id('categorias', array('categoria_id' => $categoria_id))){
            
            $this->session->set_flashdata('error','Categoria não encontrada');
            redirect('categorias');

        } else {

            $this->form_validation->set_rules('categoria_nome','Categoria','trim|required|min_length[2]|max_length[45]');


            if($this->form_validation->run()){

                $categoria_ativa = $this->input->post('categoria_ativa');

                if($this->db->table_exists('produtos')){

                    if($categoria_ativa == 0 && $this->model->get_by_id('produtos', array('produto_categoria_id' => $categoria_id, 'produto_ativo' => 1))){
                        
                        $this->session->set_flashdata('error','Esta categoria não pode ser desativada, pois esta sendo ultilizada em produtos');
                        redirect('categorias');
                    }
                }

            $data = elements(

                array(

                    'categoria_nome',
                    'categoria_ativa',
                 
               
                ),$this->input->post()
            );

            $data = $this->security->xss_clean($data);

            $this->model->update('categorias', $data , array('categoria_id' => $categoria_id));
            redirect('categorias');

        } else {

            $data = array(

                'title'   => 'Atualizar Categoria',
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
             
            ),
            
            'categoria' => $this->model->get_by_id('categorias', array('categoria_id' => $categoria_id)),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('categorias/edit_categorias');
            $this->load->view('layout/footer');

            }

        }
    }

    public function remove($marca_id = NULL){

        if(!$marca_id || !$this->model->get_by_id('marcas', array('marca_id' => $marca_id))){

            $this->session->set_flashdata('error','Marca não encontrado');
            redirect('marcas');

        }else{

            $this->model->delete('marcas', array('marca_id' => $marca_id));

            $this->session->set_flashdata('sucesso','Registro removido com sucesso');
            redirect('marcas');

        }

    }

}