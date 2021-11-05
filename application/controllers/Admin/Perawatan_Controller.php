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
        $data['jenisperawatan'] = $this->Perawatan_model->get_jenis_perawatan();

        $css['css'] = 'perawatan';
        $this->load->view('administrator/header-script');
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom', $css);
        $this->load->view('administrator/perawatan/perawatan', $data);
        $this->load->view('administrator/footer');
    }



    public function add_perawatan($offset = 0, $page = 'perawatan/perawatan')
    {

        // Check login
        if (!$this->session->userdata('login')) {
            redirect('administrator/index');
        }

        $data['title'] = 'Tambah Layanan Perawatan';

        //$data['add-user'] = $this->Administrator_Model->get_categories();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules(
            'jenisperawatan',
            'Jenis Perawatan',
            'required'
        );
        $this->form_validation->set_rules(
            'biaya',
            'Biaya',
            'required'
        );
        $this->form_validation->set_rules(
            'satuan',
            'Satuan',
            'required'
        );
        $css['css'] = 'perawatan';

        // Pagination Config
        $config['base_url'] = base_url() . 'administrator/perawatan/';
        $config['total_rows'] = $this->db->count_all('tbl_perawatan');
        $config['per_page'] = 10;
        $config['uri_segment'] = 10;
        $config['attributes'] = ['class' => 'paginate-link'];

        // Init Pagination
        $this->pagination->initialize($config);
        $data['queryPerawatan'] = $this->Perawatan_model->get_perawatan(
            false,
            $config['per_page'],
            $offset
        );

        $data['jenisperawatan'] = $this->Perawatan_model->get_jenis_perawatan(
            false,
            $config['per_page'],
            $offset
        );
        if ($this->form_validation->run() === false) {
            $this->load->view('administrator/header-script');
            $this->load->view('administrator/header');
            $this->load->view('administrator/header-bottom', $css);
            $this->load->view('administrator/' . $page, $data);
            $this->load->view('administrator/footer');
        } else {

            //Simpan ke database
            $this->Perawatan_model->add_perawatan();

            //Set Message
            $this->session->set_flashdata(
                'success',
                'User has been created Successfull.'
            );
            redirect('Admin/Perawatan_Controller/index');
        }
    }


    public function update_perawatan($id = null)
    {
        $data['row'] = $this->Perawatan_model->update_perawatan($id);
        $data['jenisperawatan'] = $this->Perawatan_model->get_jenis_perawatan($id);

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


    public function update_perawatan_data($page = 'update-perawatan')
    {

        // Check login
        if (!$this->session->userdata('login')) {
            redirect('administrator/index');
        }

        //Data
        $data['title'] = 'Update Perawatan';
        $css['css'] = 'perawatan';


        //Validasi
        $this->form_validation->set_rules('nama_perawatan', 'Nama Perawatan', 'required');
        $this->form_validation->set_rules(
            'jenis_layanan',
            'Jenis Perawatan',
            'required'
        );
        $this->form_validation->set_rules(
            'biaya',
            'Biaya',
            'required'
        );
        $this->form_validation->set_rules(
            'satuan',
            'Satuan',
            'required'
        );

        if ($this->form_validation->run() === false) {
            $this->load->view('administrator/header-script');
            $this->load->view('administrator/header');
            $this->load->view('administrator/header-bottom', $css);
            $this->load->view('administrator/perawatan/update-perawatan' . $page, $data);
            $this->load->view('administrator/footer');
        } else {

            //Simpan Data
            $this->Perawatan_model->update_perawatan_data();

            //Set Message
            $this->session->set_flashdata(
                'success',
                'Perawatan has been Updated Successfull.'
            );
            redirect('Admin/Perawatan_Controller/index');
        }
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



    ///Jenis Perawatan
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

        $data['rows'] = $this->Perawatan_model->get_jenis_perawatan(
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

    public function add_jenis_perawatan($offset = 0, $page = 'perawatan/jenis-perawatan')
    {

        $CI = get_instance();
        $CI->load->helper('debug_helper');

        // Check login
        if (!$this->session->userdata('login')) {
            redirect('administrator/index');
        }


        // Pagination Config
        $config['base_url'] = base_url() . 'administrator/perawatan/jenis/';
        $config['total_rows'] = $this->db->count_all('tbl_jenis_perawatan');
        $config['per_page'] = 10;
        $config['uri_segment'] = 10;
        $config['attributes'] = ['class' => 'paginate-link'];

        // Init Pagination
        $this->pagination->initialize($config);

        $data['title'] = 'Jenis Perawatan';

        $data['rows'] = $this->Perawatan_model->get_jenis_perawatan(
            false,
            $config['per_page'],
            $offset
        );

        $css['css'] = 'jenis_perawatan';

        $this->form_validation->set_rules('jenis_perawatan', 'Jenis Perawatan', 'required');
        $this->form_validation->set_rules(
            'deskripsi',
            'deskripsi',
            'required'
        );


        if ($this->form_validation->run() === false) {
            debug_to_console('false');
            $this->load->view('administrator/header-script');
            $this->load->view('administrator/header');
            $this->load->view('administrator/header-bottom', $css);
            $this->load->view('administrator/' . $page, $data);
            $this->load->view('administrator/footer');
        } else {
            debug_to_console('menyimpan');

            //Simpan ke database
            $this->Perawatan_model->add_jenis_perawatan();

            //Set Message
            $this->session->set_flashdata(
                'success',
                'Jenis Perawatan has been created Successfull.'
            );
            redirect('Admin/Perawatan_Controller/jenis_perawatan');
        }
    }

    public function update_jenis_perawatan($id = null)
    {
        $data['row'] = $this->Perawatan_model->get_jenis_perawatan_byid($id);

        if (empty($data['row'])) {
            show_404();
        }
        $data['title'] = 'Update Jenis Perawatan';
        $css['css'] = 'jenis_perawatan';

        $this->load->view('administrator/header-script');
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom', $css);
        $this->load->view('administrator/perawatan/update-jenis-perawatan', $data);
        $this->load->view('administrator/footer');
    }


    public function update_jenis_perawatan_data($page = 'update-jenis-perawatan')
    {

        // Check login
        if (!$this->session->userdata('login')) {
            redirect('administrator/index');
        }

        //Data
        $data['title'] = 'Update Jenis Perawatan';
        $css['css'] = 'jenis_perawatan';


        //Validasi
        $this->form_validation->set_rules('jenis_perawatan', 'Jenis Perawatan', 'required');
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required'
        );

        if ($this->form_validation->run() === false) {
            $this->load->view('administrator/header-script');
            $this->load->view('administrator/header');
            $this->load->view('administrator/header-bottom', $css);
            $this->load->view('administrator/perawatan/update-jenis-perawatan' . $page, $data);
            $this->load->view('administrator/footer');
        } else {

            //Simpan Data
            $this->Perawatan_model->update_jenis_perawatan();

            //Set Message
            $this->session->set_flashdata(
                'success',
                'Jenis Perawatan has been Updated Successfull.'
            );
            redirect('Admin/Perawatan_Controller/jenis_perawatan');
        }
    }

    public function delete_jenis_perawatan($id)
    {
        $table = base64_decode($this->input->get('table'));
        //$table = $this->input->post('table');
        $this->Perawatan_model->delete_jenis_perawatan($id, $table);
        $this->session->set_flashdata(
            'success',
            'Data has been deleted Successfully.'
        );
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

/* End of file Perawatan.php and path /application/controllers/Admin/Perawatan.php */