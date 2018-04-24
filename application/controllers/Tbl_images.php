<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_images extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_images_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tbl_images/tbl_images_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_images_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_images_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'jenis_file' => $row->jenis_file,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('tbl_images/tbl_images_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_images'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_images/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'jenis_file' => set_value('jenis_file'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('tbl_images/tbl_images_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'jenis_file' => $this->input->post('jenis_file',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Tbl_images_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbl_images'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_images_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_images/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'jenis_file' => set_value('jenis_file', $row->jenis_file),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('tbl_images/tbl_images_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_images'));
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
		'jenis_file' => $this->input->post('jenis_file',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Tbl_images_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_images'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_images_model->get_by_id($id);

        if ($row) {
            $this->Tbl_images_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_images'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_images'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('jenis_file', 'jenis file', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_images.xls";
        $judul = "tbl_images";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis File");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Tbl_images_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_file);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_images.doc");

        $data = array(
            'tbl_images_data' => $this->Tbl_images_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_images/tbl_images_doc',$data);
    }

}

/* End of file Tbl_images.php */
/* Location: ./application/controllers/Tbl_images.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 06:29:09 */
/* http://harviacode.com */