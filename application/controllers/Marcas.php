<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

	public function __construct(){
        parent::__construct();

        if (!$this->ion_auth->logged_in()){
          redirect('login');
        }

        $this->load->model('Core_model','model');
      
    }
    
    public function index(){

        $data = array(

            'title'   => 'Gerenciamento Marcas',
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
            
            'marcas' => $this->model->get_all('marcas'),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('marcas/index');
            $this->load->view('layout/footer');
    
    }

    public function add(){
        
        $this->form_validation->set_rules('marca_nome','Marca','trim|required|min_length[6]|max_length[45]|is_unique[marcas.marca_nome]');
   

        if($this->form_validation->run()){

            $data = elements(

                array(

                    'marca_nome',
                    'marca_ativa',
                   
                ),$this->input->post()
            );

            
            $data = $this->security->xss_clean($data);

            $this->model->insert('marcas', $data);
            redirect('marcas');


        } else {

            $data = array(

                'title'   => 'Cadastrar Marcas',
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
                'vendor/clientes.js'

                    ),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('marcas/add_marca');
            $this->load->view('layout/footer');

        }
    }

    public function edit($marca_id = NULL){

        if(!$marca_id || !$this->model->get_by_id('marcas', array('marca_id' => $marca_id))){
            
            $this->session->set_flashdata('error','Marca não encontrada');
            redirect('marcas');

        } else {

            $this->form_validation->set_rules('marca_nome','','trim|required|min_length[6]|max_length[45]');


            if($this->form_validation->run()){

                $marca_ativa = $this->input->post('marca_ativa');

                if($this->db->table_exists('produtos')){

                    if($marca_ativa == 0 && $this->model->get_by_id('produtos', array('produto_marca_id' => $marca_id, 'produto_ativo' => 1))){
                        
                        $this->session->set_flashdata('error','Esta marca não pode ser desativada, pois esta sendo ultilizada em produtos');
                        redirect('marcas');
                    }
                }

            $data = elements(

                array(

                    'marca_nome',
                    'marca_ativa',
                 
               
                ),$this->input->post()
            );

            $data = $this->security->xss_clean($data);

            $this->model->update('marcas', $data , array('marca_id' => $marca_id));
            redirect('marcas');

        } else {

            $data = array(

                'title'   => 'Atualizar Servico',
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
             
            ),
            
            'marca' => $this->model->get_by_id('marcas', array('marca_id' => $marca_id)),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('marcas/edit_marca');
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