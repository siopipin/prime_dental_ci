<?php

// defined('BASEPATH') or exit('No direct script access allowed');

class Perawatan_Controller extends CI_Controller
{

    var $useModel = "Perawatan";


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/' . $this->useModel . '_model');

        // Common Model Library
        $this->load->model('Perawatan_model');
    }
    public function index($offset = 0)
    {

        // Pagination Config
        $config['base_url'] = base_url() . 'administrator/perawatan/';
        $config['total_rows'] = $this->db->count_all('tbl_perawatan');
        $config['per_page'] = 10;
        $config['uri_segment'] = 10;
        $config['attributes'] = ['class' => 'paginate-link'];

        // Init Pagination
        $this->pagination->initialize($config);

        $data['title'] = 'Perawatan';

        $data['queryPerawatan'] = $this->Perawatan_model->get_perawatan(
            false,
            $config['per_page'],
            $offset
        );

        $css['css'] = 'perawatan';
        $this->load->view('administrator/header-script');
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom', $css);
        $this->load->view('administrator/perawatan/perawatan', $data);
        $this->load->view('administrator/footer');
    }

    public function jenis_perawatan($offset = 0)
    {
        // Pagination Config
        $config['base_url'] = base_url() . 'administrator/perawatan/jenis/';
        $config['total_rows'] = $this->db->count_all('tbl_jenis_perawatan');
        $config['per_page'] = 10;
        $config['uri_segment'] = 10;
        $config['attributes'] = ['class' => 'paginate-link'];

        // Init Pagination
        $this->pagination->initialize($config);

        $data['title'] = 'Jenis Perawatan';

        $data['queryJenisPerawatan'] = $this->Perawatan_model->get_jenis_perawatan(
            false,
            $config['per_page'],
            $offset
        );

        $css['css'] = 'jenis_perawatan';
        $this->load->view('administrator/header-script');
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom', $css);
        $this->load->view('administrator/perawatan/jenis-perawatan', $data);
        $this->load->view('administrator/footer');
    }

    public function update_perawatan($id = null)
    {
        $data['row'] = $this->Perawatan_model->update_perawatan($id);

        if (empty($data['row'])) {
            show_404();
        }
        $data['title'] = 'Update Perawatan';
        $css['css'] = 'perawatan';

        $this->load->view('administrator/header-script');
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom', $css);
        $this->load->view('administrator/perawatan/update-perawatan', $data);
        $this->load->view('administrator/footer');
    }

    public function deletePerawatan($id)
    {
        $table = base64_decode($this->input->get('table'));
        //$table = $this->input->post('table');
        $this->Perawatan_model->deletePerawatan($id, $table);
        $this->session->set_flashdata(
            'success',
            'Data has been deleted Successfully.'
        );
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    public function enablePerawatan($id)
    {
        $table = base64_decode($this->input->get('table'));
        //$table = $this->input->post('table');
        $this->Perawatan_model->enablePerawatan($id, $table);
        $this->session->set_flashdata('success', 'Desabled Successfully.');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    public function disablePerawatan($id)
    {
        $table = base64_decode($this->input->get('table'));
        //$table = $this->input->post('table');
        $this->Perawatan_model->disablePerawatan($id, $table);
        $this->session->set_flashdata('success', 'Enabled Successfully.');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

/* End of file Perawatan.php and path /application/controllers/Admin/Perawatan.php */