<?php

class Perawatan_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_perawatan()
    {
        $query_str = "SELECT tbl_perawatan.id_perawatan, tbl_jenis_perawatan.id_jenis, tbl_perawatan.nama, tbl_jenis_perawatan.nama as jenis, tbl_perawatan.deskripsi, tbl_perawatan.biaya, tbl_perawatan.satuan, tbl_perawatan.status, tbl_perawatan.update_at  FROM tbl_perawatan JOIN tbl_jenis_perawatan ON tbl_perawatan.id_jenis =  tbl_jenis_perawatan.id_jenis ORDER BY tbl_perawatan.update_at DESC";
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    public function add_perawatan()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'id_jenis' => $this->input->post('jenisperawatan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'biaya' => $this->input->post('biaya'),
            'satuan' => $this->input->post('satuan'),
        );
        return $this->db->insert('tbl_perawatan', $data);
    }

    public function update_perawatan($id = FALSE)
    {
        $query_str = "SELECT tbl_perawatan.id_perawatan, tbl_jenis_perawatan.id_jenis, tbl_perawatan.nama, tbl_jenis_perawatan.nama as jenis, tbl_perawatan.deskripsi, tbl_perawatan.biaya, tbl_perawatan.satuan, tbl_perawatan.status, tbl_perawatan.update_at FROM tbl_perawatan JOIN tbl_jenis_perawatan ON tbl_perawatan.id_jenis =  tbl_jenis_perawatan.id_jenis WHERE tbl_perawatan.id_perawatan = $id  ORDER BY tbl_perawatan.update_at DESC";
        $query = $this->db->query($query_str);
        return $query->row_array();
    }

    public function update_perawatan_data()
    {
        $data = array(
            'nama' => $this->input->post('nama_perawatan'),
            'id_jenis' => $this->input->post('jenis_layanan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'biaya' => $this->input->post('biaya'),
            'satuan' => $this->input->post('satuan'),
            'status' => $this->input->post('status'),
        );

        $this->db->where('id_perawatan', $this->input->post('id'));
        $d = $this->db->update('tbl_perawatan', $data);
    }

    public function enablePerawatan($id, $table)
    {
        $data = array(
            'status' => 0
        );
        $this->db->where('id_perawatan', $id);
        return $this->db->update($table, $data);
    }
    public function disablePerawatan($id, $table)
    {
        $data = array(
            'status' => 1
        );
        $this->db->where('id_perawatan', $id);
        return $this->db->update($table, $data);
    }

    public function deletePerawatan($id, $table)
    {
        $this->db->where('id_perawatan', $id);
        $this->db->delete($table);
        return true;
    }


    ///Jenis Perawatan
    public function get_jenis_perawatan($username = FALSE, $limit = FALSE, $offset = FALSE)
    {
        $query_str = "SELECT * FROM tbl_jenis_perawatan ORDER BY update_at DESC";
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    public function get_jenis_perawatan_byid($id = FALSE)
    {
        $CI = get_instance();
        $CI->load->helper('debug_helper');
        debug_to_console($id);

        $query_str = "SELECT * FROM tbl_jenis_perawatan WHERE id_jenis = $id";
        $query = $this->db->query($query_str);
        return $query->row_array();
    }

    public function add_jenis_perawatan()
    {
        $data = array(
            'nama' => $this->input->post('jenis_perawatan'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        return $this->db->insert('tbl_jenis_perawatan', $data);
    }

    public function update_jenis_perawatan()
    {
        $data = array(
            'nama' => $this->input->post('jenis_perawatan'),
            'deskripsi' => $this->input->post('deskripsi'),

        );

        $this->db->where('id_jenis', $this->input->post('id'));
        $d = $this->db->update('tbl_jenis_perawatan', $data);
    }

    public function delete_jenis_perawatan($id, $table)
    {
        $this->db->where('id_jenis', $id);
        $this->db->delete($table);
        return true;
    }
}


/* End of file Perawatan_model.php and path /application/models/Perawatan_model.php */