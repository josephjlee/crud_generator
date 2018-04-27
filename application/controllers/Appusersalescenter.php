<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appusersalescenter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Appusersalescenter_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('appusersalescenter/appusersalescenter_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Appusersalescenter_model->json();
    }

    public function read($id) 
    {
        $row = $this->Appusersalescenter_model->get_by_id($id);
        if ($row) {
            $data = array(
		'UserID' => $row->UserID,
		'SalesCenterID' => $row->SalesCenterID,
	    );
            $this->load->view('appusersalescenter/appusersalescenter_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appusersalescenter'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('appusersalescenter/create_action'),
	    'UserID' => set_value('UserID'),
	    'SalesCenterID' => set_value('SalesCenterID'),
	);
        $this->load->view('appusersalescenter/appusersalescenter_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'UserID' => $this->input->post('UserID',TRUE),
		'SalesCenterID' => $this->input->post('SalesCenterID',TRUE),
	    );

            $this->Appusersalescenter_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('appusersalescenter'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Appusersalescenter_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('appusersalescenter/update_action'),
		'UserID' => set_value('UserID', $row->UserID),
		'SalesCenterID' => set_value('SalesCenterID', $row->SalesCenterID),
	    );
            $this->load->view('appusersalescenter/appusersalescenter_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appusersalescenter'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'UserID' => $this->input->post('UserID',TRUE),
		'SalesCenterID' => $this->input->post('SalesCenterID',TRUE),
	    );

            $this->Appusersalescenter_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('appusersalescenter'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Appusersalescenter_model->get_by_id($id);

        if ($row) {
            $this->Appusersalescenter_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('appusersalescenter'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appusersalescenter'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('UserID', 'userid', 'trim|required');
	$this->form_validation->set_rules('SalesCenterID', 'salescenterid', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "appusersalescenter.xls";
        $judul = "appusersalescenter";
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
	xlsWriteLabel($tablehead, $kolomhead++, "UserID");
	xlsWriteLabel($tablehead, $kolomhead++, "SalesCenterID");

	foreach ($this->Appusersalescenter_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UserID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->SalesCenterID);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=appusersalescenter.doc");

        $data = array(
            'appusersalescenter_data' => $this->Appusersalescenter_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('appusersalescenter/appusersalescenter_doc',$data);
    }

}

/* End of file Appusersalescenter.php */
/* Location: ./application/controllers/Appusersalescenter.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:45 */
/* http://harviacode.com */