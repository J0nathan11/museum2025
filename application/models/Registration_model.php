<?php
class Registration_model extends CI_Model
{
    public function get_client_registrations($id_card_cli) {
        $this->db->select('clients.first_name_cli, clients.last_name_cli, workshops.topic_work, registration.date_reg');
        $this->db->from('registration');
        $this->db->join('clients', 'clients.id_cli = registration.fk_id_cli');
        $this->db->join('workshops', 'workshops.id_work = registration.fk_id_work');
        $this->db->where('clients.id_card_cli', $id_card_cli);
        $query = $this->db->get();
        return $query->result_array(); // Devolver los resultados
    }
}
