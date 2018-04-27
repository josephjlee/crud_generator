<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appusergroup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Appusergroup_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('appusergroup/appusergroup_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Appusergroup_model->json();
    }

    public function read($id) 
    {
        $row = $this->Appusergroup_model->get_by_id($id);
        if ($row) {
            $data = array(
		'UserGroupID' => $row->UserGroupID,
		'ParentUserGroupID' => $row->ParentUserGroupID,
		'UserGroupName' => $row->UserGroupName,
		'IsActive' => $row->IsActive,
		'IsInternal' => $row->IsInternal,
		'UserType' => $row->UserType,
	    );
            $this->load->view('appusergroup/appusergroup_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appusergroup'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('appusergroup/create_action'),
	    'UserGroupID' => set_value('UserGroupID'),
	    'ParentUserGroupID' => set_value('ParentUserGroupID'),
	    'UserGroupName' => set_value('UserGroupName'),
	    'IsActive' => set_value('IsActive'),
	    'IsInternal' => set_value('IsInternal'),
	    'UserType' => set_value('UserType'),
	);
        $this->load->view('appusergroup/appusergroup_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ParentUserGroupID' => $this->input->post('ParentUserGroupID',TRUE),
		'UserGroupName' => $this->input->post('UserGroupName',TRUE),
		'IsActive' => $this->input->post('IsActive',TRUE),
		'IsInternal' => $this->input->post('IsInternal',TRUE),
		'UserType' => $this->input->post('UserType',TRUE),
	    );

            $this->Appusergroup_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('appusergroup'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Appusergroup_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('appusergroup/update_action'),
		'UserGroupID' => set_value('UserGroupID', $row->UserGroupID),
		'ParentUserGroupID' => set_value('ParentUserGroupID', $row->ParentUserGroupID),
		'UserGroupName' => set_value('UserGroupName', $row->UserGroupName),
		'IsActive' => set_value('IsActive', $row->IsActive),
		'IsInternal' => set_value('IsInternal', $row->IsInternal),
		'UserType' => set_value('UserType', $row->UserType),
	    );
            $this->load->view('appusergroup/appusergroup_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appusergroup'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('UserGroupID', TRUE));
        } else {
            $data = array(
		'ParentUserGroupID' => $this->input->post('ParentUserGroupID',TRUE),
		'UserGroupName' => $this->input->post('UserGroupName',TRUE),
		'IsActive' => $this->input->post('IsActive',TRUE),
		'IsInternal' => $this->input->post('IsInternal',TRUE),
		'UserType' => $this->input->post('UserType',TRUE),
	    );

            $this->Appusergroup_model->update($this->input->post('UserGroupID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('appusergroup'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Appusergroup_model->get_by_id($id);

        if ($row) {
            $this->Appusergroup_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('appusergroup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appusergroup'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ParentUserGroupID', 'parentusergroupid', 'trim|required');
	$this->form_validation->set_rules('UserGroupName', 'usergroupname', 'trim|required');
	$this->form_validation->set_rules('IsActive', 'isactive', 'trim|required');
	$this->form_validation->set_rules('IsInternal', 'isinternal', 'trim|required');
	$this->form_validation->set_rules('UserType', 'usertype', 'trim|required');

	$this->form_validation->set_rules('UserGroupID', 'UserGroupID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "appusergroup.xls";
        $judul = "appusergroup";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ParentUserGroupID");
	xlsWriteLabel($tablehead, $kolomhead++, "UserGroupName");
	xlsWriteLabel($tablehead, $kolomhead++, "IsActive");
	xlsWriteLabel($tablehead, $kolomhead++, "IsInternal");
	xlsWriteLabel($tablehead, $kolomhead++, "UserType");

	foreach ($this->Appusergroup_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ParentUserGroupID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UserGroupName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IsActive);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IsInternal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UserType);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=appusergroup.doc");

        $data = array(
            'appusergroup_data' => $this->Appusergroup_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('appusergroup/appusergroup_doc',$data);
    }

}

/* End of file Appusergroup.php */
/* Location: ./application/controllers/Appusergroup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:45 */
/* http://harviacode.com */