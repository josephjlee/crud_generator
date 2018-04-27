<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Areagroup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Areagroup_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('areagroup/areagroup_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Areagroup_model->json();
    }

    public function read($id) 
    {
        $row = $this->Areagroup_model->get_by_id($id);
        if ($row) {
            $data = array(
		'AreaGroupID' => $row->AreaGroupID,
		'AreaGroupName' => $row->AreaGroupName,
	    );
            $this->load->view('areagroup/areagroup_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('areagroup'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('areagroup/create_action'),
	    'AreaGroupID' => set_value('AreaGroupID'),
	    'AreaGroupName' => set_value('AreaGroupName'),
	);
        $this->load->view('areagroup/areagroup_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'AreaGroupID' => $this->input->post('AreaGroupID',TRUE),
		'AreaGroupName' => $this->input->post('AreaGroupName',TRUE),
	    );

            $this->Areagroup_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('areagroup'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Areagroup_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('areagroup/update_action'),
		'AreaGroupID' => set_value('AreaGroupID', $row->AreaGroupID),
		'AreaGroupName' => set_value('AreaGroupName', $row->AreaGroupName),
	    );
            $this->load->view('areagroup/areagroup_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('areagroup'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'AreaGroupID' => $this->input->post('AreaGroupID',TRUE),
		'AreaGroupName' => $this->input->post('AreaGroupName',TRUE),
	    );

            $this->Areagroup_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('areagroup'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Areagroup_model->get_by_id($id);

        if ($row) {
            $this->Areagroup_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('areagroup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('areagroup'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('AreaGroupID', 'areagroupid', 'trim|required');
	$this->form_validation->set_rules('AreaGroupName', 'areagroupname', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "areagroup.xls";
        $judul = "areagroup";
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
	xlsWriteLabel($tablehead, $kolomhead++, "AreaGroupID");
	xlsWriteLabel($tablehead, $kolomhead++, "AreaGroupName");

	foreach ($this->Areagroup_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AreaGroupID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AreaGroupName);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=areagroup.doc");

        $data = array(
            'areagroup_data' => $this->Areagroup_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('areagroup/areagroup_doc',$data);
    }

}

/* End of file Areagroup.php */
/* Location: ./application/controllers/Areagroup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:46 */
/* http://harviacode.com */