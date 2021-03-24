<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedores extends CI_Controller {

	public function __construct(){
        parent::__construct();

        if (!$this->ion_auth->logged_in()){
          redirect('login');
        }

        $this->load->model('Core_model','model');
      
    }
    
    public function index(){

        $data = array(

            'title'   => 'Gerenciamento Vendedores',
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
            
            'vendedores' => $this->model->get_all('vendedores'),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('vendedores/index');
            $this->load->view('layout/footer');
    
    }

    public function add(){
        
            $this->form_validation->set_rules('vendedor_nome_completo','','trim|required|min_length[4]|max_length[45]');

            $this->form_validation->set_rules('vendedor_cpf','','trim|required|min_length[4]|max_length[18]|is_unique[vendedores.vendedor_cpf]|callback_valida_cpf');

            $this->form_validation->set_rules('vendedor_rg','','trim|required|exact_length[12]|is_unique[vendedores.vendedor_rg]|callback_check_rg');

            $this->form_validation->set_rules('vendedor_telefone','','trim|max_length[14]|callback_check_telefone');

            $this->form_validation->set_rules('vendedor_celular','','trim|required|max_length[18]|callback_check_celular');

            $this->form_validation->set_rules('vendedor_email','','trim|required|valid_email|max_length[45]|is_unique[vendedores.vendedor_email]|callback_check_email');

            $this->form_validation->set_rules('vendedor_cep','','trim|required|max_length[10]');

            $this->form_validation->set_rules('vendedor_endereco','','trim|required|max_length[50]');

            $this->form_validation->set_rules('vendedor_numero_endereco','','trim|required|max_length[20]');

            $this->form_validation->set_rules('vendedor_complemento','','trim|max_length[30]');

            $this->form_validation->set_rules('vendedor_bairro','','trim|required|max_length[35]');

            $this->form_validation->set_rules('vendedor_cidade','','trim|required|max_length[50]');

            $this->form_validation->set_rules('vendedor_estado','','trim|required|exact_length[2]'); 

            $this->form_validation->set_rules('vendedor_ativo','','trim|required'); 

            $this->form_validation->set_rules('vendedor_obs','','trim|max_length[150]');


        if($this->form_validation->run()){

            $data = elements(

                array(

                    'vendedor_nome_completo',
                    'vendedor_cpf',
                    'vendedor_codigo',
                    'vendedor_rg',
                    'vendedor_telefone',
                    'vendedor_celular',
                    'vendedor_email',
                    'vendedor_cep',
                    'vendedor_endereco',
                    'vendedor_numero_endereco',
                    'vendedor_complemento',
                    'vendedor_bairro',
                    'vendedor_cidade',
                    'vendedor_estado',
                    'vendedor_ativo',
                    'vendedor_obs',
                   

                ),$this->input->post()
            );

            $data['vendedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));
            $data = $this->security->xss_clean($data);

            $this->model->insert('vendedores', $data);
            redirect('vendedores');


        } else {

            $data = array(

                'title'   => 'Cadastrar Vendedor',
                'codigo_gerado' => $this->model->generate_unique_code('vendedores','numeric', 8, 'vendedor_codigo'),
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
                'vendor/clientes.js'

                    ),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('vendedores/add_vendedores');
            $this->load->view('layout/footer');

        }
    }

    public function edit($vendedor_id = NULL){

        if(!$vendedor_id || !$this->model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))){
            
            $this->session->set_flashdata('error','Vendedor não encontrado');
            redirect('vendedores');

        } else {



            $this->form_validation->set_rules('vendedor_nome_completo','','trim|required|min_length[4]|max_length[45]');

            $this->form_validation->set_rules('vendedor_cpf','','trim|required|min_length[4]|max_length[18]|callback_valida_cpf');

            $this->form_validation->set_rules('vendedor_rg','','trim|required|exact_length[12]|callback_check_rg');

            $this->form_validation->set_rules('vendedor_telefone','','trim|max_length[14]|callback_check_telefone');

            $this->form_validation->set_rules('vendedor_celular','','trim|required|max_length[18]|callback_check_celular');

            $this->form_validation->set_rules('vendedor_email','','trim|required|valid_email|max_length[45]|callback_check_email');

            $this->form_validation->set_rules('vendedor_cep','','trim|max_length[10]');

            $this->form_validation->set_rules('vendedor_endereco','','trim|max_length[50]');

            $this->form_validation->set_rules('vendedor_numero_endereco','','trim|max_length[20]');

            $this->form_validation->set_rules('vendedor_complemento','','trim|max_length[30]');

            $this->form_validation->set_rules('vendedor_bairro','','trim|required|max_length[35]');

            $this->form_validation->set_rules('vendedor_cidade','','trim|required|max_length[50]');

            $this->form_validation->set_rules('vendedor_estado','','trim|exact_length[2]'); 

            $this->form_validation->set_rules('vendedor_ativo','','trim|required'); 

            $this->form_validation->set_rules('vendedor_obs','','trim|max_length[150]');

            if($this->form_validation->run()){

            $data = elements(

                array(

                    'vendedor_nome_completo',
                    'vendedor_codigo',
                    'vendedor_cpf',
                    'vendedor_rg',
                    'vendedor_telefone',
                    'vendedor_celular',
                    'vendedor_email',
                    'vendedor_cep',
                    'vendedor_endereco',
                    'vendedor_numero_endereco',
                    'vendedor_complemento',
                    'vendedor_bairro',
                    'vendedor_cidade',
                    'vendedor_estado',
                    'vendedor_ativo',
                    'vendedor_obs',
                    
                ),$this->input->post()
            );

            $data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));
            $data = $this->security->xss_clean($data);

            $this->model->update('vendedores', $data , array('vendedor_id' => $vendedor_id));
            redirect('vendedores');


        } else {

            $data = array(

                'title'   => 'Atualizar Vendededor',
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
             
            ),
            
            'vendedor' => $this->model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id)),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('vendedores/edit_vendedores');
            $this->load->view('layout/footer');

            }

        }
    }

    public function check_rg($vendedor_rg){

        $vendedor_id = $this->input->post('vendedor_id');
        

        //Verifica se já existe um RG ou I.E cadastrados
        if($this->model->get_by_id('vendedores', array('vendedor_rg' => $vendedor_rg ,'vendedor_id !=' => $vendedor_id))){
            
            $this->form_validation->set_message('vendedor_rg','Esse documento já existe');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    public function check_email($vendedor_email){

        $vendedor_id = $this->input->post('vendedor_id');
        

        //Verifica se já existe um E-mail cadastrados
        if($this->model->get_by_id('vendedores', array('vendedor_email' => $vendedor_email ,'vendedor_id !=' => $vendedor_id))){
            
            $this->form_validation->set_message('check_email','Esse E-mail já existe');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    public function check_telefone($vendedor_telefone){

        $vendedor_id = $this->input->post('vendedor_id');
        

        //Verifica se já existe um E-mail cadastrados
        if($this->model->get_by_id('vendedores', array('vendedor_telefone' => $vendedor_telefone ,'vendedor_id !=' => $vendedor_id))){
            
            $this->form_validation->set_message('check_telefone','Esse Telefone já existe');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    public function check_celular($vendedor_celular){

        $vendedor_id = $this->input->post('vendedor_id');
        

        //Verifica se já existe um E-mail cadastrados
        if($this->model->get_by_id('vendedores', array('vendedor_celular' => $vendedor_celular ,'vendedor_id !=' => $vendedor_id))){
            
            $this->form_validation->set_message('check_celular','Esse celular já existe');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    /*public function valida_cpf($cpf) {

        if ($this->input->post('cliente_id')) {

            $cliente_id = $this->input->post('cliente_id');

            if ($this->model->get_by_id('clientes', array('cliente_id !=' => $cliente_id, 'cliente_cpf_cnpj' => $cpf))) {
                $this->form_validation->set_message('valida_cpf', 'Este CPF já existe');
                return FALSE;
            }
        }

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

            $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
            return FALSE;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    //$d += $cpf{$c} * (($t + 1) - $c); // Para PHP com versão < 7.4
                    $d += $cpf[$c] * (($t + 1) - $c);// Para PHP com versão < 7.4
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
                    return FALSE;
                }
            }
            return TRUE;
        }
    }*/

    public function remove($vendedor_id = NULL){

        if(!$vendedor_id || !$this->model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))){

            $this->session->set_flashdata('error','Vendedor não encontrado');
            redirect('vendedores');

        }else{

            $this->model->delete('vendedores', array('vendedor_id' => $vendedor_id));

            $this->session->set_flashdata('sucesso','Registro removido com sucesso');
            redirect('vendedores');

        }

    }

}