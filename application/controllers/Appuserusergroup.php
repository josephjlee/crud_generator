<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appuserusergroup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Appuserusergroup_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('appuserusergroup/appuserusergroup_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Appuserusergroup_model->json();
    }

    public function read($id) 
    {
        $row = $this->Appuserusergroup_model->get_by_id($id);
        if ($row) {
            $data = array(
		'UserID' => $row->UserID,
		'UserGroupID' => $row->UserGroupID,
	    );
            $this->load->view('appuserusergroup/appuserusergroup_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appuserusergroup'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('appuserusergroup/create_action'),
	    'UserID' => set_value('UserID'),
	    'UserGroupID' => set_value('UserGroupID'),
	);
        $this->load->view('appuserusergroup/appuserusergroup_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'UserID' => $this->input->post('UserID',TRUE),
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
	    );

            $this->Appuserusergroup_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('appuserusergroup'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Appuserusergroup_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('appuserusergroup/update_action'),
		'UserID' => set_value('UserID', $row->UserID),
		'UserGroupID' => set_value('UserGroupID', $row->UserGroupID),
	    );
            $this->load->view('appuserusergroup/appuserusergroup_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appuserusergroup'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'UserID' => $this->input->post('UserID',TRUE),
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
	    );

            $this->Appuserusergroup_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('appuserusergroup'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Appuserusergroup_model->get_by_id($id);

        if ($row) {
            $this->Appuserusergroup_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('appuserusergroup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appuserusergroup'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('UserID', 'userid', 'trim|required');
	$this->form_validation->set_rules('UserGroupID', 'usergroupid', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "appuserusergroup.xls";
        $judul = "appuserusergroup";
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
	xlsWriteLabel($tablehead, $kolomhead++, "UserID");
	xlsWriteLabel($tablehead, $kolomhead++, "UserGroupID");

	foreach ($this->Appuserusergroup_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UserID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UserGroupID);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=appuserusergroup.doc");

        $data = array(
            'appuserusergroup_data' => $this->Appuserusergroup_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('appuserusergroup/appuserusergroup_doc',$data);
    }

}

/* End of file Appuserusergroup.php */
/* Location: ./application/controllers/Appuserusergroup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:45 */
/* http://harviacode.com */