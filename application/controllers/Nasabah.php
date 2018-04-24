<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nasabah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nasabah_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('nasabah/nasabah_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Nasabah_model->json();
    }

    public function read($id) 
    {
        $row = $this->Nasabah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idnasabah' => $row->idnasabah,
		'nama_nasabah' => $row->nama_nasabah,
		'notelp_nasabah' => $row->notelp_nasabah,
		'alamat' => $row->alamat,
		'nama_pic' => $row->nama_pic,
		'notelp_pic' => $row->notelp_pic,
	    );
            $this->load->view('nasabah/nasabah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nasabah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nasabah/create_action'),
	    'idnasabah' => set_value('idnasabah'),
	    'nama_nasabah' => set_value('nama_nasabah'),
	    'notelp_nasabah' => set_value('notelp_nasabah'),
	    'alamat' => set_value('alamat'),
	    'nama_pic' => set_value('nama_pic'),
	    'notelp_pic' => set_value('notelp_pic'),
	);
        $this->load->view('nasabah/nasabah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_nasabah' => $this->input->post('nama_nasabah',TRUE),
		'notelp_nasabah' => $this->input->post('notelp_nasabah',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nama_pic' => $this->input->post('nama_pic',TRUE),
		'notelp_pic' => $this->input->post('notelp_pic',TRUE),
	    );

            $this->Nasabah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nasabah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nasabah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nasabah/update_action'),
		'idnasabah' => set_value('idnasabah', $row->idnasabah),
		'nama_nasabah' => set_value('nama_nasabah', $row->nama_nasabah),
		'notelp_nasabah' => set_value('notelp_nasabah', $row->notelp_nasabah),
		'alamat' => set_value('alamat', $row->alamat),
		'nama_pic' => set_value('nama_pic', $row->nama_pic),
		'notelp_pic' => set_value('notelp_pic', $row->notelp_pic),
	    );
            $this->load->view('nasabah/nasabah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nasabah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idnasabah', TRUE));
        } else {
            $data = array(
		'nama_nasabah' => $this->input->post('nama_nasabah',TRUE),
		'notelp_nasabah' => $this->input->post('notelp_nasabah',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nama_pic' => $this->input->post('nama_pic',TRUE),
		'notelp_pic' => $this->input->post('notelp_pic',TRUE),
	    );

            $this->Nasabah_model->update($this->input->post('idnasabah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nasabah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nasabah_model->get_by_id($id);

        if ($row) {
            $this->Nasabah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nasabah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nasabah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_nasabah', 'nama nasabah', 'trim|required');
	$this->form_validation->set_rules('notelp_nasabah', 'notelp nasabah', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('nama_pic', 'nama pic', 'trim|required');
	$this->form_validation->set_rules('notelp_pic', 'notelp pic', 'trim|required');

	$this->form_validation->set_rules('idnasabah', 'idnasabah', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "nasabah.xls";
        $judul = "nasabah";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Nasabah");
	xlsWriteLabel($tablehead, $kolomhead++, "Notelp Nasabah");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pic");
	xlsWriteLabel($tablehead, $kolomhead++, "Notelp Pic");

	foreach ($this->Nasabah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_nasabah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->notelp_nasabah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pic);
	    xlsWriteLabel($tablebody, $kolombody++, $data->notelp_pic);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=nasabah.doc");

        $data = array(
            'nasabah_data' => $this->Nasabah_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('nasabah/nasabah_doc',$data);
    }

}

/* End of file Nasabah.php */
/* Location: ./application/controllers/Nasabah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-07 10:42:58 */
/* http://harviacode.com */