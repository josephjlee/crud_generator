<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tanggal_libur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tanggal_libur_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tanggal_libur/tanggal_libur_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tanggal_libur_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tanggal_libur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tahun' => $row->tahun,
		'tanggal' => $row->tanggal,
	    );
            $this->load->view('tanggal_libur/tanggal_libur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tanggal_libur'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tanggal_libur/create_action'),
	    'id' => set_value('id'),
	    'tahun' => set_value('tahun'),
	    'tanggal' => set_value('tanggal'),
	);
        $this->load->view('tanggal_libur/tanggal_libur_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tahun' => $this->input->post('tahun',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->Tanggal_libur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tanggal_libur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tanggal_libur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tanggal_libur/update_action'),
		'id' => set_value('id', $row->id),
		'tahun' => set_value('tahun', $row->tahun),
		'tanggal' => set_value('tanggal', $row->tanggal),
	    );
            $this->load->view('tanggal_libur/tanggal_libur_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tanggal_libur'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tahun' => $this->input->post('tahun',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->Tanggal_libur_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tanggal_libur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tanggal_libur_model->get_by_id($id);

        if ($row) {
            $this->Tanggal_libur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tanggal_libur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tanggal_libur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tanggal_libur.xls";
        $judul = "tanggal_libur";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Tanggal_libur_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tanggal_libur.doc");

        $data = array(
            'tanggal_libur_data' => $this->Tanggal_libur_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tanggal_libur/tanggal_libur_doc',$data);
    }

}

/* End of file Tanggal_libur.php */
/* Location: ./application/controllers/Tanggal_libur.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 06:29:09 */
/* http://harviacode.com */