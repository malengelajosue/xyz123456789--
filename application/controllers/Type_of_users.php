<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Type_of_users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Type_of_users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'type_of_users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'type_of_users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'type_of_users/index.html';
            $config['first_url'] = base_url() . 'type_of_users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Type_of_users_model->total_rows($q);
        $type_of_users = $this->Type_of_users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'type_of_users_data' => $type_of_users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('type_of_users/type_of_users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Type_of_users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'desciption' => $row->desciption,
	    );
            $this->load->view('type_of_users/type_of_users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('type_of_users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('type_of_users/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'desciption' => set_value('desciption'),
	);
        $this->load->view('type_of_users/type_of_users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'desciption' => $this->input->post('desciption',TRUE),
	    );

            $this->Type_of_users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('type_of_users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Type_of_users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('type_of_users/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'desciption' => set_value('desciption', $row->desciption),
	    );
            $this->load->view('type_of_users/type_of_users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('type_of_users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'desciption' => $this->input->post('desciption',TRUE),
	    );

            $this->Type_of_users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('type_of_users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Type_of_users_model->get_by_id($id);

        if ($row) {
            $this->Type_of_users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('type_of_users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('type_of_users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('desciption', 'desciption', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "type_of_users.xls";
        $judul = "type_of_users";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Desciption");

	foreach ($this->Type_of_users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->desciption);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Type_of_users.php */
/* Location: ./application/controllers/Type_of_users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-15 22:40:45 */
/* http://harviacode.com */