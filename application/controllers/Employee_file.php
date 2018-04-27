<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_file extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_file_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('employee_file/employee_file_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Employee_file_model->json();
    }

    public function read($id) 
    {
        $row = $this->Employee_file_model->get_by_id($id);
        if ($row) {
            $data = array(
		'NoKTP' => $row->NoKTP,
		'NamaFile' => $row->NamaFile,
		'JenisFile' => $row->JenisFile,
	    );
            $this->load->view('employee_file/employee_file_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee_file'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('employee_file/create_action'),
	    'NoKTP' => set_value('NoKTP'),
	    'NamaFile' => set_value('NamaFile'),
	    'JenisFile' => set_value('JenisFile'),
	);
        $this->load->view('employee_file/employee_file_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NoKTP' => $this->input->post('NoKTP',TRUE),
		'NamaFile' => $this->input->post('NamaFile',TRUE),
		'JenisFile' => $this->input->post('JenisFile',TRUE),
	    );

            $this->Employee_file_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('employee_file'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Employee_file_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employee_file/update_action'),
		'NoKTP' => set_value('NoKTP', $row->NoKTP),
		'NamaFile' => set_value('NamaFile', $row->NamaFile),
		'JenisFile' => set_value('JenisFile', $row->JenisFile),
	    );
            $this->load->view('employee_file/employee_file_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee_file'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'NoKTP' => $this->input->post('NoKTP',TRUE),
		'NamaFile' => $this->input->post('NamaFile',TRUE),
		'JenisFile' => $this->input->post('JenisFile',TRUE),
	    );

            $this->Employee_file_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employee_file'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Employee_file_model->get_by_id($id);

        if ($row) {
            $this->Employee_file_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('employee_file'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee_file'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NoKTP', 'noktp', 'trim|required');
	$this->form_validation->set_rules('NamaFile', 'namafile', 'trim|required');
	$this->form_validation->set_rules('JenisFile', 'jenisfile', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "employee_file.xls";
        $judul = "employee_file";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NoKTP");
	xlsWriteLabel($tablehead, $kolomhead++, "NamaFile");
	xlsWriteLabel($tablehead, $kolomhead++, "JenisFile");

	foreach ($this->Employee_file_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->NoKTP);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NamaFile);
	    xlsWriteLabel($tablebody, $kolombody++, $data->JenisFile);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=employee_file.doc");

        $data = array(
            'employee_file_data' => $this->Employee_file_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('employee_file/employee_file_doc',$data);
    }

}

/* End of file Employee_file.php */
/* Location: ./application/controllers/Employee_file.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:46 */
/* http://harviacode.com */