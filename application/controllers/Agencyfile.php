<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agencyfile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agencyfile_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('agencyfile/agencyfile_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Agencyfile_model->json();
    }

    public function read($id) 
    {
        $row = $this->Agencyfile_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'Name' => $row->Name,
		'JenisFile' => $row->JenisFile,
		'Keterangan' => $row->Keterangan,
		'AgencyID' => $row->AgencyID,
	    );
            $this->load->view('agencyfile/agencyfile_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agencyfile'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('agencyfile/create_action'),
	    'ID' => set_value('ID'),
	    'Name' => set_value('Name'),
	    'JenisFile' => set_value('JenisFile'),
	    'Keterangan' => set_value('Keterangan'),
	    'AgencyID' => set_value('AgencyID'),
	);
        $this->load->view('agencyfile/agencyfile_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Name' => $this->input->post('Name',TRUE),
		'JenisFile' => $this->input->post('JenisFile',TRUE),
		'Keterangan' => $this->input->post('Keterangan',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
	    );

            $this->Agencyfile_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('agencyfile'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Agencyfile_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('agencyfile/update_action'),
		'ID' => set_value('ID', $row->ID),
		'Name' => set_value('Name', $row->Name),
		'JenisFile' => set_value('JenisFile', $row->JenisFile),
		'Keterangan' => set_value('Keterangan', $row->Keterangan),
		'AgencyID' => set_value('AgencyID', $row->AgencyID),
	    );
            $this->load->view('agencyfile/agencyfile_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agencyfile'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'Name' => $this->input->post('Name',TRUE),
		'JenisFile' => $this->input->post('JenisFile',TRUE),
		'Keterangan' => $this->input->post('Keterangan',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
	    );

            $this->Agencyfile_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('agencyfile'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Agencyfile_model->get_by_id($id);

        if ($row) {
            $this->Agencyfile_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('agencyfile'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agencyfile'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Name', 'name', 'trim|required');
	$this->form_validation->set_rules('JenisFile', 'jenisfile', 'trim|required');
	$this->form_validation->set_rules('Keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('AgencyID', 'agencyid', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "agencyfile.xls";
        $judul = "agencyfile";
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
	xlsWriteLabel($tablehead, $kolomhead++, "JenisFile");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "AgencyID");

	foreach ($this->Agencyfile_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->JenisFile);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Keterangan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AgencyID);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=agencyfile.doc");

        $data = array(
            'agencyfile_data' => $this->Agencyfile_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('agencyfile/agencyfile_doc',$data);
    }

}

/* End of file Agencyfile.php */
/* Location: ./application/controllers/Agencyfile.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:45 */
/* http://harviacode.com */