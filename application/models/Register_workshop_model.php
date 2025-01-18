<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_workshop_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Obtener el tema del taller por ID.
     * 
     * @param int $id_work El ID del taller.
     * @return string El tema del taller.
     */
    public function get_workshop_topic($id_work) {
        $this->db->select('topic_work');
        $this->db->from('workshops');
        $this->db->where('id_work', $id_work);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->topic_work;
        } else {
            return null;
        }
    }

    /**
     * Verificar si el cliente existe en la base de datos.
     * 
     * @param string $id_card_cli El número de cédula del cliente.
     * @return array|null Los datos del cliente si existe, o null si no.
     */
    public function check_client_exists($id_card_cli) {
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->where('id_card_cli', $id_card_cli);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Retorna los datos del cliente si existe
        } else {
            return null; // Si no existe, retorna null
        }
    }

    /**
     * Registrar al cliente en el taller.
     * 
     * @param int $client_id El ID del cliente.
     * @param int $id_work El ID del taller.
     * @return bool TRUE si el registro es exitoso, FALSE en caso contrario.
     */
    public function register_client_for_workshop($client_id, $id_work) {
        $data = [
            'date_reg' => date('Y-m-d'), // Fecha actual de registro
            'fk_id_cli' => $client_id,
            'fk_id_work' => $id_work
        ];

        return $this->db->insert('registration', $data);
    }
}
