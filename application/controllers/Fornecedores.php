<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores extends CI_Controller {

	public function __construct(){
        parent::__construct();

        if (!$this->ion_auth->logged_in()){
          redirect('login');
        }

        $this->load->model('Core_model','model');
      
    }
    
    public function index(){

        $data = array(

            'title'   => 'Gerenciamento Fornecedores',
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
            
            'fornecedores' => $this->model->get_all('fornecedores'),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('fornecedores/index');
            $this->load->view('layout/footer');
    
    }

    public function add(){
        
        $this->form_validation->set_rules('fornecedor_razao','','trim|required|min_length[4]|max_length[45]|is_unique[fornecedores.fornecedor_razao]');
        $this->form_validation->set_rules('fornecedor_nome_fantasia','','trim|required|min_length[4]|max_length[45]|is_unique[fornecedores.fornecedor_nome_fantasia]');
        $this->form_validation->set_rules('fornecedor_cnpj','','trim|required|exact_length[18]|is_unique[fornecedores.fornecedor_cnpj]|callback_valida_cnpj');
        $this->form_validation->set_rules('fornecedor_ie','','trim|required|max_length[20]|is_unique[fornecedores.fornecedor_ie]');
        $this->form_validation->set_rules('fornecedor_telefone','','trim|max_length[14]|callback_check_telefone');
        $this->form_validation->set_rules('fornecedor_celular','','trim|required|max_length[18]|callback_check_celular');
        $this->form_validation->set_rules('fornecedor_email','','trim|required|valid_email|max_length[45]|is_unique[fornecedores.fornecedor_email]|callback_check_email');
        $this->form_validation->set_rules('fornecedor_contato','trim|required|max_length[20]');
        $this->form_validation->set_rules('fornecedor_cep','','trim|max_length[10]');
        $this->form_validation->set_rules('fornecedor_endereco','','trim|max_length[50]');
        $this->form_validation->set_rules('fornecedor_numero_endereco','','trim|max_length[20]');
        $this->form_validation->set_rules('fornecedor_bairro','','trim|required|max_length[35]');
        $this->form_validation->set_rules('fornecedor_complemento','','trim|max_length[30]');
        $this->form_validation->set_rules('fornecedor_cidade','','trim|required|max_length[50]');
        $this->form_validation->set_rules('fornecedor_estado','','trim|exact_length[2]'); 
        $this->form_validation->set_rules('fornecedor_ativo','','trim|required'); 
        $this->form_validation->set_rules('fornecedor_obs','','trim|max_length[150]');
        

        if($this->form_validation->run()){


            $data = elements(

                array(

                    'fornecedor_razao',
                    'fornecedor_nome_fantasia',
                    'fornecedor_cnpj',
                    'fornecedor_ie',
                    'fornecedor_telefone',
                    'fornecedor_celular',
                    'fornecedor_email',
                    'fornecedor_contato',
                    'fornecedor_cep',
                    
                    'fornecedor_endereco',
                    'fornecedor_numero_endereco',
                    'fornecedor_bairro',
                    'fornecedor_complemento',
                    'fornecedor_cidade',
                    'fornecedor_estado',
                    'fornecedor_ativo',
                    'fornecedor_obs',
                ),$this->input->post()
            );

            $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));
            $data = $this->security->xss_clean($data);

            $this->model->insert('fornecedores', $data);
            redirect('fornecedores');


        } else {

            $data = array(

                'title'   => 'Atualizar Fornecedor',
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
                'vendor/clientes.js'

                    ),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('fornecedores/add_fornecedores');
            $this->load->view('layout/footer');

        }
    }

    public function edit($fornecedor_id = NULL){

        if(!$fornecedor_id || !$this->model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))){
            
            $this->session->set_flashdata('error','Fornecedor n??o encontrado');
            redirect('fornecedores');

        } else {

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
                [fornecedor_contato] => Jo??o Cesar
                [fornecedor_cep] => 83.505-000
                [fornecedor_endereco] => Avenida Jos?? Milek Filho
                [fornecedor_numero_endereco] => 701
                [fornecedor_bairro] => Jardim Campina do Arruda
                [fornecedor_complemento] => Loja 01
                [fornecedor_cidade] => Almirante Tamandar??
                [fornecedor_estado] => PR
                [fornecedor_ativo] => 1
                [fornecedor_obs] => 
                [fornecedor_data_alteracao] => 2020-12-11 23:47:45

             */

            $this->form_validation->set_rules('fornecedor_razao','','trim|required|min_length[4]|max_length[45]');
            $this->form_validation->set_rules('fornecedor_nome_fantasia','','trim|required|min_length[4]|max_length[45]|callback_check_nome_fantasia');
            $this->form_validation->set_rules('fornecedor_cnpj','','trim|required|exact_length[18]|callback_valida_cnpj');
            $this->form_validation->set_rules('fornecedor_ie','','trim|required|max_length[20]');
            $this->form_validation->set_rules('fornecedor_telefone','','trim|max_length[14]|callback_check_telefone');
            $this->form_validation->set_rules('fornecedor_celular','','trim|required|max_length[18]|callback_check_celular');
            $this->form_validation->set_rules('fornecedor_email','','trim|required|valid_email|max_length[45]|callback_check_email');
            $this->form_validation->set_rules('fornecedor_contato','trim|required|max_length[20]');
            $this->form_validation->set_rules('fornecedor_cep','','trim|max_length[10]');
            $this->form_validation->set_rules('fornecedor_endereco','','trim|max_length[50]');
            $this->form_validation->set_rules('fornecedor_numero_endereco','','trim|max_length[20]');
            $this->form_validation->set_rules('fornecedor_bairro','','trim|required|max_length[35]');
            $this->form_validation->set_rules('fornecedor_complemento','','trim|max_length[30]');
            $this->form_validation->set_rules('fornecedor_cidade','','trim|required|max_length[50]');
            $this->form_validation->set_rules('fornecedor_estado','','trim|exact_length[2]'); 
            $this->form_validation->set_rules('fornecedor_ativo','','trim|required'); 
            $this->form_validation->set_rules('fornecedor_obs','','trim|max_length[150]');

            if($this->form_validation->run()){

                $fornecedor_ativo = $this->input->post('fornecedor_ativo');

                if($this->db->table_exists('produtos')){

                    if($fornecedor_ativo == 0 && $this->model->get_by_id('produtos', array('produto_fornecedor_id' => $fornecedor_id, 'produto_ativo' => 1))){
                        
                        $this->session->set_flashdata('error','Este fornecedor n??o pode ser desativado, pois est?? sendo ultilizado  em produtos');
                        redirect('fornecedores');
                    }
                }

            $data = elements(

                array(

                    'fornecedor_razao',
                    'fornecedor_nome_fantasia',
                    'fornecedor_cnpj',
                    'fornecedor_ie',
                    'fornecedor_email',
                    'fornecedor_contato',
                    'fornecedor_telefone',
                    'fornecedor_celular',
                    'fornecedor_endereco',
                    'fornecedor_numero_endereco',
                    'fornecedor_complemento',
                    'fornecedor_bairro',
                    'fornecedor_cep',
                    'fornecedor_numero_endereco',
                    'fornecedor_cidade',
                    'fornecedor_estado',
                    'fornecedor_ativo',
                    'fornecedor_obs',
                    
                ),$this->input->post()
            );

            $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));
            $data = $this->security->xss_clean($data);

            $this->model->update('fornecedores', $data , array('fornecedor_id' => $fornecedor_id));
            redirect('fornecedores');


        } else {

            $data = array(

                'title'   => 'Atualizar Fornecedor',
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
             
            ),
            
            'fornecedor' => $this->model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id)),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('fornecedores/edit_fornecedor');
            $this->load->view('layout/footer');

            }

        }
    }

    public function check_ie($fornecedor_ie){

        $fornecedor_id = $this->input->post('fornecedor_id');
        

        //Verifica se j?? existe um RG ou I.E cadastrados
        if($this->model->get_by_id('fornecedores', array('fornecedor_ie' => $fornecedor_ie ,'fornecedor_id !=' => $fornecedor_id))){
            
            $this->form_validation->set_message('fornecedor_ie','Esse documento j?? existe');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    public function check_email($fornecedor_email){

        $fornecedor_id = $this->input->post('fornecedor_id');
        

        //Verifica se j?? existe um E-mail cadastrados
        if($this->model->get_by_id('fornecedores', array('fornecedor_email' => $fornecedor_email ,'fornecedor_id !=' => $fornecedor_id))){
            
            $this->form_validation->set_message('check_email','Esse E-mail j?? existe');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    public function check_telefone($fornecedor_telefone){

        $fornecedor_id = $this->input->post('fornecedor_id');
        

        //Verifica se j?? existe um E-mail cadastrados
        if($this->model->get_by_id('fornecedores', array('fornecedor_telefone' => $fornecedor_telefone ,'fornecedor_id !=' => $fornecedor_id))){
            
            $this->form_validation->set_message('check_telefone','Esse Telefone j?? existe');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    public function check_celular($fornecedor_celular){

        $fornecedor_id = $this->input->post('fornecedor_id');
        

        //Verifica se j?? existe um E-mail cadastrados
        if($this->model->get_by_id('fornecedores', array('fornecedor_celular' => $fornecedor_celular ,'fornecedor_id !=' => $fornecedor_id))){
            
            $this->form_validation->set_message('check_celular','Esse celular j?? existe');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    public function check_nome_fantasia($fornecedor_nome_fantasia){

        $fornecedor_id = $this->input->post('fornecedor_id');
        

        //Verifica se j?? existe um nome fantasia cadastrados
        if($this->model->get_by_id('fornecedores', array('fornecedor_nome_fantasia' => $fornecedor_nome_fantasia ,'fornecedor_id !=' => $fornecedor_id))){
            
            $this->form_validation->set_message('check_nome_fantasia','Esse nome j?? existe');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    public function check_razao($fornecedor_razao){

        $fornecedor_id = $this->input->post('fornecedor_id');
        

        //Verifica se j?? existe um nome fantasia cadastrados
        if($this->model->get_by_id('fornecedores', array('fornecedor_razao' => $fornecedor_razao ,'fornecedor_id !=' => $fornecedor_id))){
            
            $this->form_validation->set_message('check_razao','Essa razao social ja existe !');

            return FALSE;

        } else {


            return TRUE;
        }

    }

    public function valida_cpf($cpf) {

        if ($this->input->post('cliente_id')) {

            $cliente_id = $this->input->post('cliente_id');

            if ($this->model->get_by_id('clientes', array('cliente_id !=' => $cliente_id, 'cliente_cpf_cnpj' => $cpf))) {
                $this->form_validation->set_message('valida_cpf', 'Este CPF j?? existe');
                return FALSE;
            }
        }

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequ??ncias abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

            $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF v??lido');
            return FALSE;
        } else {
            // Calcula os n??meros para verificar se o CPF ?? verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    //$d += $cpf{$c} * (($t + 1) - $c); // Para PHP com vers??o < 7.4
                    $d += $cpf[$c] * (($t + 1) - $c);// Para PHP com vers??o < 7.4
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF v??lido');
                    return FALSE;
                }
            }
            return TRUE;
        }
    }

    public function valida_cnpj($cnpj) {

        // Verifica se um n??mero foi informado
        if (empty($cnpj)) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ v??lido');
            return false;
        }

        if ($this->input->post('fornecedor_id')) {

            $fornecedor_id = $this->input->post('fornecedor_id');

            if ($this->model->get_by_id('fornecedores', array('fornecedor_id !=' => $fornecedor_id, 'fornecedor_cnpj' => $cnpj))) {
                $this->form_validation->set_message('valida_cnpj', 'Esse CNPJ j?? existe');
                return FALSE;
            }
        }

        // Elimina possivel mascara
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);


        // Verifica se o numero de digitos informados ?? igual a 11 
        if (strlen($cnpj) != 14) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ v??lido');
            return false;
        }

        // Verifica se nenhuma das sequ??ncias invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cnpj == '00000000000000' ||
                $cnpj == '11111111111111' ||
                $cnpj == '22222222222222' ||
                $cnpj == '33333333333333' ||
                $cnpj == '44444444444444' ||
                $cnpj == '55555555555555' ||
                $cnpj == '66666666666666' ||
                $cnpj == '77777777777777' ||
                $cnpj == '88888888888888' ||
                $cnpj == '99999999999999') {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ v??lido');
            return false;

            // Calcula os digitos verificadores para verificar se o
            // CPF ?? v??lido
        } else {

            $j = 5;
            $k = 6;
            $soma1 = "";
            $soma2 = "";

            for ($i = 0; $i < 13; $i++) {

                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;

                //$soma2 += ($cnpj{$i} * $k);

                //$soma2 = intval($soma2) + ($cnpj{$i} * $k); //Para PHP com vers??o < 7.4
                $soma2 = intval($soma2) + ($cnpj[$i] * $k); //Para PHP com vers??o > 7.4

                if ($i < 12) {
                    //$soma1 = intval($soma1) + ($cnpj{$i} * $j); //Para PHP com vers??o < 7.4
                    $soma1 = intval($soma1) + ($cnpj[$i] * $j); //Para PHP com vers??o > 7.4
                }

                $k--;
                $j--;
            }

            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

            if (!($cnpj[12] == $digito1) and ( $cnpj[13] == $digito2)) {
                $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ v??lido');
                return false;
            } else {
                return true;
            }
        }
    }

    public function remove($fornecedor_id = NULL){

        if(!$fornecedor_id || !$this->model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))){

            $this->session->set_flashdata('error','Fornecedor n??o encontrado');
            redirect('fornecedores');

        }else{

            $this->model->delete('fornecedores', array('fornecedor_id' => $fornecedor_id));

            $this->session->set_flashdata('sucesso','Registro removido com sucesso');
            redirect('fornecedores');

        }

    }

}