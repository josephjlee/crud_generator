<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kota_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('kota/kota_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kota_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kota' => $row->id_kota,
		'id_provinsi_fk' => $row->id_provinsi_fk,
		'nama_kota' => $row->nama_kota,
	    );
            $this->load->view('kota/kota_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kota/create_action'),
	    'id_kota' => set_value('id_kota'),
	    'id_provinsi_fk' => set_value('id_provinsi_fk'),
	    'nama_kota' => set_value('nama_kota'),
	);
        $this->load->view('kota/kota_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_provinsi_fk' => $this->input->post('id_provinsi_fk',TRUE),
		'nama_kota' => $this->input->post('nama_kota',TRUE),
	    );

            $this->Kota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kota/update_action'),
		'id_kota' => set_value('id_kota', $row->id_kota),
		'id_provinsi_fk' => set_value('id_provinsi_fk', $row->id_provinsi_fk),
		'nama_kota' => set_value('nama_kota', $row->nama_kota),
	    );
            $this->load->view('kota/kota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kota', TRUE));
        } else {
            $data = array(
		'id_provinsi_fk' => $this->input->post('id_provinsi_fk',TRUE),
		'nama_kota' => $this->input->post('nama_kota',TRUE),
	    );

            $this->Kota_model->update($this->input->post('id_kota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kota_model->get_by_id($id);

        if ($row) {
            $this->Kota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_provinsi_fk', 'id provinsi fk', 'trim|required');
	$this->form_validation->set_rules('nama_kota', 'nama kota', 'trim|required');

	$this->form_validation->set_rules('id_kota', 'id_kota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kota.xls";
        $judul = "kota";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Provinsi Fk");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kota");

	foreach ($this->Kota_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_provinsi_fk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kota);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kota.doc");

        $data = array(
            'kota_data' => $this->Kota_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kota/kota_doc',$data);
    }

}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 06:29:08 */
/* http://harviacode.com */