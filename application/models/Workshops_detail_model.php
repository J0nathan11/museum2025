<?php
class Workshops_detail_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Obtener los detalles de un taller por su ID.
     * 
     * @param int $id_work El ID del taller.
     * @return array|null Los detalles del taller o null si no se encuentra.
     */
    public function get_workshop_details($id_work) {
        // Realizamos la consulta SQL para obtener los detalles del taller
        $this->db->select('w.id_work, w.topic_work, w.date_work, w.time_work, w.status_work, d.description_detail');
        $this->db->from('workshops w');
        $this->db->join('details d', 'w.id_work = d.fk_id_work', 'left');
        $this->db->where('w.id_work', $id_work);
        $query = $this->db->get();

        // Verificar si se obtuvieron resultados
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Retornar los detalles del taller
        } else {
            return null; // Si no hay resultados, retornar null
        }
    }
}
