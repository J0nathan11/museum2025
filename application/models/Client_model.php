<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

    // Método para verificar si la cédula existe
    public function check_client_exists($id_card_cli) {
        $this->db->where('id_card_cli', $id_card_cli);
        $query = $this->db->get('clients');
        
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Devuelve los datos del cliente si existe
        } else {
            return false; // Si no existe, devuelve false
        }
    }

    // Método para obtener las inscripciones de un cliente
    public function get_client_inscriptions($id_cli) {
        $this->db->select('clients.first_name_cli, clients.last_name_cli, workshops.topic_work, registration.date_reg');
        $this->db->from('registration');
        $this->db->join('workshops', 'workshops.id_work = registration.fk_id_work');
        $this->db->join('clients', 'clients.id_cli = registration.fk_id_cli'); // Unir con la tabla de clientes
        $this->db->where('registration.fk_id_cli', $id_cli);
        $query = $this->db->get();
        
        return $query->result_array(); // Devuelve todas las inscripciones del cliente
    }
}
?>
