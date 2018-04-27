<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kodepos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_kodepos_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tbl_kodepos/tbl_kodepos_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_kodepos_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_kodepos_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kelurahan' => $row->kelurahan,
		'kecamatan' => $row->kecamatan,
		'kabupaten' => $row->kabupaten,
		'provinsi' => $row->provinsi,
		'kodepos' => $row->kodepos,
	    );
            $this->load->view('tbl_kodepos/tbl_kodepos_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kodepos'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kodepos/create_action'),
	    'id' => set_value('id'),
	    'kelurahan' => set_value('kelurahan'),
	    'kecamatan' => set_value('kecamatan'),
	    'kabupaten' => set_value('kabupaten'),
	    'provinsi' => set_value('provinsi'),
	    'kodepos' => set_value('kodepos'),
	);
        $this->load->view('tbl_kodepos/tbl_kodepos_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kodepos' => $this->input->post('kodepos',TRUE),
	    );

            $this->Tbl_kodepos_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbl_kodepos'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kodepos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kodepos/update_action'),
		'id' => set_value('id', $row->id),
		'kelurahan' => set_value('kelurahan', $row->kelurahan),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kodepos' => set_value('kodepos', $row->kodepos),
	    );
            $this->load->view('tbl_kodepos/tbl_kodepos_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kodepos'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kodepos' => $this->input->post('kodepos',TRUE),
	    );

            $this->Tbl_kodepos_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kodepos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kodepos_model->get_by_id($id);

        if ($row) {
            $this->Tbl_kodepos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kodepos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kodepos'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kodepos', 'kodepos', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_kodepos.xls";
        $judul = "tbl_kodepos";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kelurahan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kabupaten");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kodepos");

	foreach ($this->Tbl_kodepos_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelurahan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kabupaten);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kodepos);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_kodepos.doc");

        $data = array(
            'tbl_kodepos_data' => $this->Tbl_kodepos_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kodepos/tbl_kodepos_doc',$data);
    }

}

/* End of file Tbl_kodepos.php */
/* Location: ./application/controllers/Tbl_kodepos.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:46 */
/* http://harviacode.com */