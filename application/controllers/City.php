<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class City extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('City_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('city/city_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->City_model->json();
    }

    public function read($id) 
    {
        $row = $this->City_model->get_by_id($id);
        if ($row) {
            $data = array(
		'CityID' => $row->CityID,
		'CityName' => $row->CityName,
		'AreaID' => $row->AreaID,
	    );
            $this->load->view('city/city_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('city'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('city/create_action'),
	    'CityID' => set_value('CityID'),
	    'CityName' => set_value('CityName'),
	    'AreaID' => set_value('AreaID'),
	);
        $this->load->view('city/city_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'CityID' => $this->input->post('CityID',TRUE),
		'CityName' => $this->input->post('CityName',TRUE),
		'AreaID' => $this->input->post('AreaID',TRUE),
	    );

            $this->City_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('city'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->City_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('city/update_action'),
		'CityID' => set_value('CityID', $row->CityID),
		'CityName' => set_value('CityName', $row->CityName),
		'AreaID' => set_value('AreaID', $row->AreaID),
	    );
            $this->load->view('city/city_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('city'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'CityID' => $this->input->post('CityID',TRUE),
		'CityName' => $this->input->post('CityName',TRUE),
		'AreaID' => $this->input->post('AreaID',TRUE),
	    );

            $this->City_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('city'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->City_model->get_by_id($id);

        if ($row) {
            $this->City_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('city'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('city'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('CityID', 'cityid', 'trim|required');
	$this->form_validation->set_rules('CityName', 'cityname', 'trim|required');
	$this->form_validation->set_rules('AreaID', 'areaid', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "city.xls";
        $judul = "city";
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
	xlsWriteLabel($tablehead, $kolomhead++, "CityID");
	xlsWriteLabel($tablehead, $kolomhead++, "CityName");
	xlsWriteLabel($tablehead, $kolomhead++, "AreaID");

	foreach ($this->City_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->CityID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CityName);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AreaID);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=city.doc");

        $data = array(
            'city_data' => $this->City_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('city/city_doc',$data);
    }

}

/* End of file City.php */
/* Location: ./application/controllers/City.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:46 */
/* http://harviacode.com */