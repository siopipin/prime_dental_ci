<?php

// defined('BASEPATH') or exit('No direct script access allowed');

class Users_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index($offset = 0)
    {
        // Pagination Config
        $config['base_url'] = base_url() . 'administrator/users/users/';
        $config['total_rows'] = $this->db->count_all('users');
        $config['per_page'] = 10;
        $config['uri_segment'] = 10;
        $config['attributes'] = ['class' => 'paginate-link'];

        // Init Pagination
        $this->pagination->initialize($config);

        $data['title'] = 'Latest Users';

        $data['users'] = $this->Administrator_Model->get_users(
            false,
            $config['per_page'],
            $offset
        );

        $css['css'] = 'users';
        $this->load->view('administrator/header-script');
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom', $css);
        $this->load->view('administrator/users/users', $data);
        $this->load->view('administrator/footer');
    }

    public function add_user($page = 'users/add-user')
    {
        if (!file_exists(APPPATH . 'views/administrator/' . $page . '.php')) {
            show_404();
        }
        // Check login
        if (!$this->session->userdata('login')) {
            redirect('administrator/index');
        }

        $data['title'] = 'Create User';

        //$data['add-user'] = $this->Administrator_Model->get_categories();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required'
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required'
        );
        $css['css'] = 'add_user';
        if ($this->form_validation->run() === false) {
            $this->load->view('administrator/header-script');
            $this->load->view('administrator/header');
            $this->load->view('administrator/header-bottom', $css);
            $this->load->view('administrator/' . $page, $data);
            $this->load->view('administrator/footer');
        } else {
            //Upload Image
            $config['upload_path'] = FCPATH . './assets/images/users/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite'] = true;
            $config['max_size'] = '10048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            $file_name = str_replace(' ', '_', $_FILES['userfile']['name']);

            if ($this->upload->do_upload('userfile')) {
                $post_image = $file_name;
            } else {
                $data['error'] = $this->upload->display_errors();
                $post_image = 'noimage.jpg';
            }
            $password = md5('123456');
            $this->Administrator_Model->add_user($post_image, $password);

            //Set Message
            $this->session->set_flashdata(
                'success',
                'User has been created Successfull.'
            );
            redirect('Admin/Users/index');
        }
    }

    public function update_user($id = null)
    {
        $data['user'] = $this->Administrator_Model->get_user($id);

        if (empty($data['user'])) {
            show_404();
        }
        $data['title'] = 'Update User';
        $css['css'] = 'users';

        $this->load->view('administrator/header-script');
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom', $css);
        $this->load->view('administrator/users/update-user', $data);
        $this->load->view('administrator/footer');
    }

    public function update_user_data($page = 'update-user')
    {
        if (!file_exists(APPPATH . 'views/administrator/' . $page . '.php')) {
            show_404();
        }
        // Check login
        if (!$this->session->userdata('login')) {
            redirect('administrator/index');
        }

        $data['title'] = 'Update User';

        //$data['add-user'] = $this->Administrator_Model->get_categories();

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('administrator/header-script');
            $this->load->view('administrator/header');
            $this->load->view('administrator/header-bottom');
            $this->load->view('administrator/' . $page, $data);
            $this->load->view('administrator/footer');
        } else {
            //Upload Image

            $config['upload_path'] = './assets/images/users';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $id = $this->input->post('id');
                $data['img'] = $this->Administrator_Model->get_user($id);
                $errors = ['error' => $this->upload->display_errors()];
                $post_image = $data['img']['image'];
            } else {
                $data = ['upload_data' => $this->upload->data()];
                $post_image = $_FILES['userfile']['name'];
            }

            $this->Administrator_Model->update_user_data($post_image);

            //Set Message
            $this->session->set_flashdata(
                'success',
                'User has been Updated Successfull.'
            );
            redirect('administrator/users');
        }
    }


    public function delete($id)
    {
        $table = base64_decode($this->input->get('table'));
        //$table = $this->input->post('table');
        $this->Administrator_Model->delete($id, $table);
        $this->session->set_flashdata(
            'success',
            'Data has been deleted Successfully.'
        );
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    public function enable($id)
    {
        $table = base64_decode($this->input->get('table'));
        //$table = $this->input->post('table');
        $this->Administrator_Model->enable($id, $table);
        $this->session->set_flashdata('success', 'Desabled Successfully.');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    public function disable($id)
    {
        $table = base64_decode($this->input->get('table'));
        //$table = $this->input->post('table');
        $this->Administrator_Model->desable($id, $table);
        $this->session->set_flashdata('success', 'Enabled Successfully.');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

/* End of file Dokter.php and path /application/controllers/Admin/Dokter.php */