<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mp3 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mp3_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('mp3/mp3_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mp3_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mp3_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'file' => $row->file,
		'name' => $row->name,
		'a_number' => $row->a_number,
		'create_at' => $row->create_at,
	    );
            $this->load->view('mp3/mp3_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mp3'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mp3/create_action'),
	    'id' => set_value('id'),
	    'file' => set_value('file'),
	    'name' => set_value('name'),
	    'a_number' => set_value('a_number'),
	    'create_at' => set_value('create_at'),
	);
        $this->load->view('mp3/mp3_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'file' => $this->input->post('file',TRUE),
		'name' => $this->input->post('name',TRUE),
		'a_number' => $this->input->post('a_number',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
	    );

            $this->Mp3_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mp3'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mp3_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mp3/update_action'),
		'id' => set_value('id', $row->id),
		'file' => set_value('file', $row->file),
		'name' => set_value('name', $row->name),
		'a_number' => set_value('a_number', $row->a_number),
		'create_at' => set_value('create_at', $row->create_at),
	    );
            $this->load->view('mp3/mp3_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mp3'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'file' => $this->input->post('file',TRUE),
		'name' => $this->input->post('name',TRUE),
		'a_number' => $this->input->post('a_number',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
	    );

            $this->Mp3_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mp3'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mp3_model->get_by_id($id);

        if ($row) {
            $this->Mp3_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mp3'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mp3'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('a_number', 'a number', 'trim|required');
	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mp3.xls";
        $judul = "mp3";
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
	xlsWriteLabel($tablehead, $kolomhead++, "File");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "A Number");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");

	foreach ($this->Mp3_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->a_number);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=mp3.doc");

        $data = array(
            'mp3_data' => $this->Mp3_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mp3/mp3_doc',$data);
    }

}

/* End of file Mp3.php */
/* Location: ./application/controllers/Mp3.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 06:29:08 */
/* http://harviacode.com */