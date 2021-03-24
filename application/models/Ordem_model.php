<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ordem_model extends CI_Model {

        public function get_all(){

            $query = $this->db->select([

                'ordens_servicos.*',
                'clientes.cliente_id',
                'clientes.cliente_nome',
                'formas_pagamentos.forma_pagamento_id',
                'formas_pagamentos.forma_pagamento_nome',
               
            ]);

            $this->db->join('clientes','cliente_id = ordem_servico_cliente_id','LEFT');
            $this->db->join('formas_pagamentos','forma_pagamento_id = ordem_servico_forma_pagamento_id');

          

            return  $query = $this->db->get('ordens_servicos')->result();
        }
    }