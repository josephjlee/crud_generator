<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('sales/sales_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Sales_model->json();
    }

    public function read($id) 
    {
        $row = $this->Sales_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idsales' => $row->idsales,
		'npp' => $row->npp,
		'nama_sales' => $row->nama_sales,
		'email' => $row->email,
		'notelp' => $row->notelp,
		'password' => $row->password,
	    );
            $this->load->view('sales/sales_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sales/create_action'),
	    'idsales' => set_value('idsales'),
	    'npp' => set_value('npp'),
	    'nama_sales' => set_value('nama_sales'),
	    'email' => set_value('email'),
	    'notelp' => set_value('notelp'),
	    'password' => set_value('password'),
	);
        $this->load->view('sales/sales_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'npp' => $this->input->post('npp',TRUE),
		'nama_sales' => $this->input->post('nama_sales',TRUE),
		'email' => $this->input->post('email',TRUE),
		'notelp' => $this->input->post('notelp',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Sales_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sales'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sales_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sales/update_action'),
		'idsales' => set_value('idsales', $row->idsales),
		'npp' => set_value('npp', $row->npp),
		'nama_sales' => set_value('nama_sales', $row->nama_sales),
		'email' => set_value('email', $row->email),
		'notelp' => set_value('notelp', $row->notelp),
		'password' => set_value('password', $row->password),
	    );
            $this->load->view('sales/sales_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idsales', TRUE));
        } else {
            $data = array(
		'npp' => $this->input->post('npp',TRUE),
		'nama_sales' => $this->input->post('nama_sales',TRUE),
		'email' => $this->input->post('email',TRUE),
		'notelp' => $this->input->post('notelp',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Sales_model->update($this->input->post('idsales', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sales'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sales_model->get_by_id($id);

        if ($row) {
            $this->Sales_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sales'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('npp', 'npp', 'trim|required');
	$this->form_validation->set_rules('nama_sales', 'nama sales', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('notelp', 'notelp', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('idsales', 'idsales', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sales.xls";
        $judul = "sales";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Npp");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Sales");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Notelp");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");

	foreach ($this->Sales_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->npp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sales);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->notelp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sales.doc");

        $data = array(
            'sales_data' => $this->Sales_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sales/sales_doc',$data);
    }

}

/* End of file Sales.php */
/* Location: ./application/controllers/Sales.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-07 10:42:58 */
/* http://harviacode.com */