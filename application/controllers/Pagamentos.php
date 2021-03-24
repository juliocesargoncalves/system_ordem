<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamentos extends CI_Controller {

	public function __construct(){

        parent::__construct();

        if (!$this->ion_auth->logged_in()){
          redirect('login');
        }

        $this->load->model('Core_model','model');
        date_default_timezone_set('America/Sao_Paulo');
      
    }
    
    public function index(){

        $data = array(

            'title'   => 'Formas de Pagamento',
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
            
            'formas' => $this->model->get_all('formas_pagamentos'),
        );

     
            $this->load->view('layout/header', $data);
            $this->load->view('pagamentos/index');
            $this->load->view('layout/footer');
    
    }

    public function edit($forma_pagamento_id = NULL){

        if(!$forma_pagamento_id|| !$this->model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))){

            $this->session->set_flashdata('error','Forma de pagamento não encontrada');
            redirect('pagamentos');

        }else{

         $this->form_validation->set_rules('forma_pagamento_nome','Forma de pagamento','trim|required|min_length[3]|max_length[40]|callback_check_pagamento_nome');
         
            
            if($this->form_validation->run()){

                $forma_pagamento_ativa = $this->input->post('forma_pagamento_ativa');

                if($this->db->table_exists('vendas')){

                    if($forma_pagamento_ativa == 0 && $this->model->get_by_id('vendas',array('venda_forma_pagamento_id' => $forma_pagamento_id))){

                        $this->session->set_flashdata('info','Essa forma de pagamento não pode ser desativada, pois esta em uso');
                        redirect('pagamentos');
                    }
                }

            

                $data  = elements (

                    array(

                        'forma_pagamento_nome',
                        'forma_pagamento_ativa',
                        'forma_pagamento_aceita_parc'

                    ),$this->input->post()
                );
                
                $data = $this->security->xss_clean($data);

                $this->model->update('formas_pagamentos' , $data, array('forma_pagamento_id ' => $forma_pagamento_id));

                redirect('pagamentos');
                
            }else{

                $data = array(

                    'titulo' => 'Editar forma de pagamento',
                    'forma_pagamento' => $this->model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id)),
                );
    
                $this->load->view('layout/header', $data);
                $this->load->view('pagamentos/edit_pagamento');
                $this->load->view('layout/footer');
            }
        }
                
    }
   
    

    public function add(){
        
    $this->form_validation->set_rules('forma_pagamento_nome','Forma de pagamento','trim|required|min_length[3]|max_length[40]|is_unique[formas_pagamentos.forma_pagamento_nome]');
         
    if($this->form_validation->run()){
            
        $data  = elements (

                array(

                    'forma_pagamento_nome',
                    'forma_pagamento_ativa',
                    'forma_pagamento_aceita_parc'

                ),$this->input->post()
            );
            
            $data = $this->security->xss_clean($data);

            $this->model->insert('formas_pagamentos' , $data);

            redirect('pagamentos');

    }else{

            $data = array(

                'titulo' => 'Adicionar forma de pagamento',
                
            );

            $this->load->view('layout/header', $data);
            $this->load->view('pagamentos/add_pagamentos');
            $this->load->view('layout/footer');
        
        
        }
    }

    public function remove($forma_pagamento_id = NULL){

        if(!$forma_pagamento_id || !$this->model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))){

            $this->session->set_flashdata('error','Forma de pagamento não encontrada');
            redirect('pagamentos');

        }

        if($this->model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id, 'forma_pagamento_ativa' => 1))){

            $this->session->set_flashdata('info','Essa forma de pagamento  não pode ser removida, pois ainda esta em uso !');
            redirect('pagamentos');

        } else{

            $this->model->delete('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id));

            $this->session->set_flashdata('sucesso','Registro removido com sucesso');
            redirect('pagamentos');

        }
    }

    public function check_pagamento_nome($forma_pagamento_nome){

        $forma_pagamento_id = $this->input->post('forma_pagamento_id');

        if($this->model->get_by_id('formas_pagamentos', array('forma_pagamento_nome' => $forma_pagamento_nome, 'forma_pagamento_id !=' => $forma_pagamento_id))){

            $this->form_validation->set_message('check_pagamento_nome','Essa forma de pagamento já existe, favor verficar');
            
            return FALSE;

        }else{

            return TRUE;
        }


        
    }

}