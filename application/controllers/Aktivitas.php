<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aktivitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aktivitas_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('aktivitas/aktivitas_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Aktivitas_model->json();
    }

    public function read($id) 
    {
        $row = $this->Aktivitas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idaktivitas' => $row->idaktivitas,
		'nama_nasabah' => $row->nama_nasabah,
		'tanggal' => $row->tanggal,
		'waktu' => $row->waktu,
		'alamat' => $row->alamat,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('aktivitas/aktivitas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aktivitas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('aktivitas/create_action'),
	    'idaktivitas' => set_value('idaktivitas'),
	    'nama_nasabah' => set_value('nama_nasabah'),
	    'tanggal' => set_value('tanggal'),
	    'waktu' => set_value('waktu'),
	    'alamat' => set_value('alamat'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('aktivitas/aktivitas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_nasabah' => $this->input->post('nama_nasabah',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Aktivitas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('aktivitas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Aktivitas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('aktivitas/update_action'),
		'idaktivitas' => set_value('idaktivitas', $row->idaktivitas),
		'nama_nasabah' => set_value('nama_nasabah', $row->nama_nasabah),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'waktu' => set_value('waktu', $row->waktu),
		'alamat' => set_value('alamat', $row->alamat),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('aktivitas/aktivitas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aktivitas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idaktivitas', TRUE));
        } else {
            $data = array(
		'nama_nasabah' => $this->input->post('nama_nasabah',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Aktivitas_model->update($this->input->post('idaktivitas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('aktivitas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Aktivitas_model->get_by_id($id);

        if ($row) {
            $this->Aktivitas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('aktivitas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aktivitas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_nasabah', 'nama nasabah', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('idaktivitas', 'idaktivitas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "aktivitas.xls";
        $judul = "aktivitas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Aktivitas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_nasabah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
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
        header("Content-Disposition: attachment;Filename=aktivitas.doc");

        $data = array(
            'aktivitas_data' => $this->Aktivitas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('aktivitas/aktivitas_doc',$data);
    }

}

/* End of file Aktivitas.php */
/* Location: ./application/controllers/Aktivitas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-07 10:42:58 */
/* http://harviacode.com */