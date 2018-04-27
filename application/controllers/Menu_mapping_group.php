<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_mapping_group extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_mapping_group_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('menu_mapping_group/menu_mapping_group_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Menu_mapping_group_model->json();
    }

    public function read($id) 
    {
        $row = $this->Menu_mapping_group_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_group' => $row->id_group,
		'id_menu' => $row->id_menu,
	    );
            $this->load->view('menu_mapping_group/menu_mapping_group_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_mapping_group'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu_mapping_group/create_action'),
	    'id' => set_value('id'),
	    'id_group' => set_value('id_group'),
	    'id_menu' => set_value('id_menu'),
	);
        $this->load->view('menu_mapping_group/menu_mapping_group_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_group' => $this->input->post('id_group',TRUE),
		'id_menu' => $this->input->post('id_menu',TRUE),
	    );

            $this->Menu_mapping_group_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu_mapping_group'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_mapping_group_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu_mapping_group/update_action'),
		'id' => set_value('id', $row->id),
		'id_group' => set_value('id_group', $row->id_group),
		'id_menu' => set_value('id_menu', $row->id_menu),
	    );
            $this->load->view('menu_mapping_group/menu_mapping_group_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_mapping_group'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_group' => $this->input->post('id_group',TRUE),
		'id_menu' => $this->input->post('id_menu',TRUE),
	    );

            $this->Menu_mapping_group_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu_mapping_group'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_mapping_group_model->get_by_id($id);

        if ($row) {
            $this->Menu_mapping_group_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu_mapping_group'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_mapping_group'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_group', 'id group', 'trim|required');
	$this->form_validation->set_rules('id_menu', 'id menu', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "menu_mapping_group.xls";
        $judul = "menu_mapping_group";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Group");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Menu");

	foreach ($this->Menu_mapping_group_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_group);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_menu);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=menu_mapping_group.doc");

        $data = array(
            'menu_mapping_group_data' => $this->Menu_mapping_group_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('menu_mapping_group/menu_mapping_group_doc',$data);
    }

}

/* End of file Menu_mapping_group.php */
/* Location: ./application/controllers/Menu_mapping_group.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:46 */
/* http://harviacode.com */