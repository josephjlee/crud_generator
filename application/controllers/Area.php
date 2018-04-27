<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Area_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('area/area_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Area_model->json();
    }

    public function read($id) 
    {
        $row = $this->Area_model->get_by_id($id);
        if ($row) {
            $data = array(
		'AreaID' => $row->AreaID,
		'AreaGroupID' => $row->AreaGroupID,
		'AreaCode' => $row->AreaCode,
		'AreaName' => $row->AreaName,
		'IsActive' => $row->IsActive,
		'AreaTargetID' => $row->AreaTargetID,
	    );
            $this->load->view('area/area_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('area'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('area/create_action'),
	    'AreaID' => set_value('AreaID'),
	    'AreaGroupID' => set_value('AreaGroupID'),
	    'AreaCode' => set_value('AreaCode'),
	    'AreaName' => set_value('AreaName'),
	    'IsActive' => set_value('IsActive'),
	    'AreaTargetID' => set_value('AreaTargetID'),
	);
        $this->load->view('area/area_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'AreaID' => $this->input->post('AreaID',TRUE),
		'AreaGroupID' => $this->input->post('AreaGroupID',TRUE),
		'AreaCode' => $this->input->post('AreaCode',TRUE),
		'AreaName' => $this->input->post('AreaName',TRUE),
		'IsActive' => $this->input->post('IsActive',TRUE),
		'AreaTargetID' => $this->input->post('AreaTargetID',TRUE),
	    );

            $this->Area_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('area'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Area_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('area/update_action'),
		'AreaID' => set_value('AreaID', $row->AreaID),
		'AreaGroupID' => set_value('AreaGroupID', $row->AreaGroupID),
		'AreaCode' => set_value('AreaCode', $row->AreaCode),
		'AreaName' => set_value('AreaName', $row->AreaName),
		'IsActive' => set_value('IsActive', $row->IsActive),
		'AreaTargetID' => set_value('AreaTargetID', $row->AreaTargetID),
	    );
            $this->load->view('area/area_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('area'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'AreaID' => $this->input->post('AreaID',TRUE),
		'AreaGroupID' => $this->input->post('AreaGroupID',TRUE),
		'AreaCode' => $this->input->post('AreaCode',TRUE),
		'AreaName' => $this->input->post('AreaName',TRUE),
		'IsActive' => $this->input->post('IsActive',TRUE),
		'AreaTargetID' => $this->input->post('AreaTargetID',TRUE),
	    );

            $this->Area_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('area'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Area_model->get_by_id($id);

        if ($row) {
            $this->Area_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('area'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('area'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('AreaID', 'areaid', 'trim|required');
	$this->form_validation->set_rules('AreaGroupID', 'areagroupid', 'trim|required');
	$this->form_validation->set_rules('AreaCode', 'areacode', 'trim|required');
	$this->form_validation->set_rules('AreaName', 'areaname', 'trim|required');
	$this->form_validation->set_rules('IsActive', 'isactive', 'trim|required');
	$this->form_validation->set_rules('AreaTargetID', 'areatargetid', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "area.xls";
        $judul = "area";
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
	xlsWriteLabel($tablehead, $kolomhead++, "AreaID");
	xlsWriteLabel($tablehead, $kolomhead++, "AreaGroupID");
	xlsWriteLabel($tablehead, $kolomhead++, "AreaCode");
	xlsWriteLabel($tablehead, $kolomhead++, "AreaName");
	xlsWriteLabel($tablehead, $kolomhead++, "IsActive");
	xlsWriteLabel($tablehead, $kolomhead++, "AreaTargetID");

	foreach ($this->Area_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AreaID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AreaGroupID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AreaCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AreaName);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IsActive);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AreaTargetID);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=area.doc");

        $data = array(
            'area_data' => $this->Area_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('area/area_doc',$data);
    }

}

/* End of file Area.php */
/* Location: ./application/controllers/Area.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:45 */
/* http://harviacode.com */