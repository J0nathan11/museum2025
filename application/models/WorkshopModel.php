<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkshopModel extends CI_Model {

    // Obtener el taller por su ID
    public function get_workshop_by_id($id_work) {
        // Seleccionamos los campos del taller y la descripción
        $this->db->select('workshops.*, details.description_detail');
        $this->db->from('workshops');
        $this->db->join('details', 'workshops.id_work = details.fk_id_work', 'left');
        $this->db->where('workshops.id_work', $id_work);
        return $this->db->get()->row_array();
    }

    // Obtener todos los organizadores
    public function get_all_organizers() {
        $this->db->select('id_org, first_name_org, last_name_org');
        $this->db->from('organizer');
        return $this->db->get()->result_array();
    }

    // Actualizar el taller y su descripción
    public function update_workshop($id_work, $data) {
        // Actualizar taller
        $this->db->where('id_work', $id_work);
        $this->db->update('workshops', [
            'topic_work' => $data['topic_work'],
            'date_work' => $data['date_work'],
            'time_work' => $data['time_work'],
            'status_work' => $data['status_work'],
            'fk_id_org' => $data['fk_id_org']
        ]);
    
        // Verificar si ya existe una descripción en la tabla details
        $this->db->where('fk_id_work', $id_work);
        $existing_description = $this->db->get('details')->row_array();
    
        if ($existing_description) {
            // Si existe, actualizarla
            $this->db->where('fk_id_work', $id_work);
            $this->db->update('details', [
                'description_detail' => $data['description_detail']
            ]);
        } else {
            // Si no existe, insertarla
            $this->db->insert('details', [
                'fk_id_work' => $id_work,
                'description_detail' => $data['description_detail']
            ]);
        }
    
        return $this->db->affected_rows() > 0;
    }    
}
