<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appuser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Appuser_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('appuser/appuser_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Appuser_model->json();
    }

    public function read($id) 
    {
        $row = $this->Appuser_model->get_by_id($id);
        if ($row) {
            $data = array(
		'UserID' => $row->UserID,
		'UserGroupID' => $row->UserGroupID,
		'ParentUserID' => $row->ParentUserID,
		'UserLoginID' => $row->UserLoginID,
		'UserName' => $row->UserName,
		'NPP' => $row->NPP,
		'Password' => $row->Password,
		'SRLanguage' => $row->SRLanguage,
		'EmailAddress' => $row->EmailAddress,
		'PhoneNumber' => $row->PhoneNumber,
		'ActiveDate' => $row->ActiveDate,
		'ExpireDate' => $row->ExpireDate,
		'IsActive' => $row->IsActive,
		'AreaGroupID' => $row->AreaGroupID,
		'AreaID' => $row->AreaID,
		'AgencyID' => $row->AgencyID,
		'EmployeeID' => $row->EmployeeID,
		'PhotoFilePath' => $row->PhotoFilePath,
		'PhotoFileName' => $row->PhotoFileName,
		'IconPhotoFilePath' => $row->IconPhotoFilePath,
	    );
            $this->load->view('appuser/appuser_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appuser'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('appuser/create_action'),
	    'UserID' => set_value('UserID'),
	    'UserGroupID' => set_value('UserGroupID'),
	    'ParentUserID' => set_value('ParentUserID'),
	    'UserLoginID' => set_value('UserLoginID'),
	    'UserName' => set_value('UserName'),
	    'NPP' => set_value('NPP'),
	    'Password' => set_value('Password'),
	    'SRLanguage' => set_value('SRLanguage'),
	    'EmailAddress' => set_value('EmailAddress'),
	    'PhoneNumber' => set_value('PhoneNumber'),
	    'ActiveDate' => set_value('ActiveDate'),
	    'ExpireDate' => set_value('ExpireDate'),
	    'IsActive' => set_value('IsActive'),
	    'AreaGroupID' => set_value('AreaGroupID'),
	    'AreaID' => set_value('AreaID'),
	    'AgencyID' => set_value('AgencyID'),
	    'EmployeeID' => set_value('EmployeeID'),
	    'PhotoFilePath' => set_value('PhotoFilePath'),
	    'PhotoFileName' => set_value('PhotoFileName'),
	    'IconPhotoFilePath' => set_value('IconPhotoFilePath'),
	);
        $this->load->view('appuser/appuser_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'ParentUserID' => $this->input->post('ParentUserID',TRUE),
		'UserLoginID' => $this->input->post('UserLoginID',TRUE),
		'UserName' => $this->input->post('UserName',TRUE),
		'NPP' => $this->input->post('NPP',TRUE),
		'Password' => $this->input->post('Password',TRUE),
		'SRLanguage' => $this->input->post('SRLanguage',TRUE),
		'EmailAddress' => $this->input->post('EmailAddress',TRUE),
		'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
		'ActiveDate' => $this->input->post('ActiveDate',TRUE),
		'ExpireDate' => $this->input->post('ExpireDate',TRUE),
		'IsActive' => $this->input->post('IsActive',TRUE),
		'AreaGroupID' => $this->input->post('AreaGroupID',TRUE),
		'AreaID' => $this->input->post('AreaID',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'EmployeeID' => $this->input->post('EmployeeID',TRUE),
		'PhotoFilePath' => $this->input->post('PhotoFilePath',TRUE),
		'PhotoFileName' => $this->input->post('PhotoFileName',TRUE),
		'IconPhotoFilePath' => $this->input->post('IconPhotoFilePath',TRUE),
	    );

            $this->Appuser_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('appuser'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Appuser_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('appuser/update_action'),
		'UserID' => set_value('UserID', $row->UserID),
		'UserGroupID' => set_value('UserGroupID', $row->UserGroupID),
		'ParentUserID' => set_value('ParentUserID', $row->ParentUserID),
		'UserLoginID' => set_value('UserLoginID', $row->UserLoginID),
		'UserName' => set_value('UserName', $row->UserName),
		'NPP' => set_value('NPP', $row->NPP),
		'Password' => set_value('Password', $row->Password),
		'SRLanguage' => set_value('SRLanguage', $row->SRLanguage),
		'EmailAddress' => set_value('EmailAddress', $row->EmailAddress),
		'PhoneNumber' => set_value('PhoneNumber', $row->PhoneNumber),
		'ActiveDate' => set_value('ActiveDate', $row->ActiveDate),
		'ExpireDate' => set_value('ExpireDate', $row->ExpireDate),
		'IsActive' => set_value('IsActive', $row->IsActive),
		'AreaGroupID' => set_value('AreaGroupID', $row->AreaGroupID),
		'AreaID' => set_value('AreaID', $row->AreaID),
		'AgencyID' => set_value('AgencyID', $row->AgencyID),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
		'PhotoFilePath' => set_value('PhotoFilePath', $row->PhotoFilePath),
		'PhotoFileName' => set_value('PhotoFileName', $row->PhotoFileName),
		'IconPhotoFilePath' => set_value('IconPhotoFilePath', $row->IconPhotoFilePath),
	    );
            $this->load->view('appuser/appuser_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appuser'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('UserID', TRUE));
        } else {
            $data = array(
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'ParentUserID' => $this->input->post('ParentUserID',TRUE),
		'UserLoginID' => $this->input->post('UserLoginID',TRUE),
		'UserName' => $this->input->post('UserName',TRUE),
		'NPP' => $this->input->post('NPP',TRUE),
		'Password' => $this->input->post('Password',TRUE),
		'SRLanguage' => $this->input->post('SRLanguage',TRUE),
		'EmailAddress' => $this->input->post('EmailAddress',TRUE),
		'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
		'ActiveDate' => $this->input->post('ActiveDate',TRUE),
		'ExpireDate' => $this->input->post('ExpireDate',TRUE),
		'IsActive' => $this->input->post('IsActive',TRUE),
		'AreaGroupID' => $this->input->post('AreaGroupID',TRUE),
		'AreaID' => $this->input->post('AreaID',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'EmployeeID' => $this->input->post('EmployeeID',TRUE),
		'PhotoFilePath' => $this->input->post('PhotoFilePath',TRUE),
		'PhotoFileName' => $this->input->post('PhotoFileName',TRUE),
		'IconPhotoFilePath' => $this->input->post('IconPhotoFilePath',TRUE),
	    );

            $this->Appuser_model->update($this->input->post('UserID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('appuser'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Appuser_model->get_by_id($id);

        if ($row) {
            $this->Appuser_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('appuser'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('appuser'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('UserGroupID', 'usergroupid', 'trim|required');
	$this->form_validation->set_rules('ParentUserID', 'parentuserid', 'trim|required');
	$this->form_validation->set_rules('UserLoginID', 'userloginid', 'trim|required');
	$this->form_validation->set_rules('UserName', 'username', 'trim|required');
	$this->form_validation->set_rules('NPP', 'npp', 'trim|required');
	$this->form_validation->set_rules('Password', 'password', 'trim|required');
	$this->form_validation->set_rules('SRLanguage', 'srlanguage', 'trim|required');
	$this->form_validation->set_rules('EmailAddress', 'emailaddress', 'trim|required');
	$this->form_validation->set_rules('PhoneNumber', 'phonenumber', 'trim|required');
	$this->form_validation->set_rules('ActiveDate', 'activedate', 'trim|required');
	$this->form_validation->set_rules('ExpireDate', 'expiredate', 'trim|required');
	$this->form_validation->set_rules('IsActive', 'isactive', 'trim|required');
	$this->form_validation->set_rules('AreaGroupID', 'areagroupid', 'trim|required');
	$this->form_validation->set_rules('AreaID', 'areaid', 'trim|required');
	$this->form_validation->set_rules('AgencyID', 'agencyid', 'trim|required');
	$this->form_validation->set_rules('EmployeeID', 'employeeid', 'trim|required');
	$this->form_validation->set_rules('PhotoFilePath', 'photofilepath', 'trim|required');
	$this->form_validation->set_rules('PhotoFileName', 'photofilename', 'trim|required');
	$this->form_validation->set_rules('IconPhotoFilePath', 'iconphotofilepath', 'trim|required');

	$this->form_validation->set_rules('UserID', 'UserID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "appuser.xls";
        $judul = "appuser";
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
	xlsWriteLabel($tablehead, $kolomhead++, "UserGroupID");
	xlsWriteLabel($tablehead, $kolomhead++, "ParentUserID");
	xlsWriteLabel($tablehead, $kolomhead++, "UserLoginID");
	xlsWriteLabel($tablehead, $kolomhead++, "UserName");
	xlsWriteLabel($tablehead, $kolomhead++, "NPP");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "SRLanguage");
	xlsWriteLabel($tablehead, $kolomhead++, "EmailAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "PhoneNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "ActiveDate");
	xlsWriteLabel($tablehead, $kolomhead++, "ExpireDate");
	xlsWriteLabel($tablehead, $kolomhead++, "IsActive");
	xlsWriteLabel($tablehead, $kolomhead++, "AreaGroupID");
	xlsWriteLabel($tablehead, $kolomhead++, "AreaID");
	xlsWriteLabel($tablehead, $kolomhead++, "AgencyID");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeID");
	xlsWriteLabel($tablehead, $kolomhead++, "PhotoFilePath");
	xlsWriteLabel($tablehead, $kolomhead++, "PhotoFileName");
	xlsWriteLabel($tablehead, $kolomhead++, "IconPhotoFilePath");

	foreach ($this->Appuser_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UserGroupID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ParentUserID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UserLoginID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UserName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NPP);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SRLanguage);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmailAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhoneNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ActiveDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ExpireDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IsActive);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AreaGroupID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AreaID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AgencyID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhotoFilePath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhotoFileName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IconPhotoFilePath);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=appuser.doc");

        $data = array(
            'appuser_data' => $this->Appuser_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('appuser/appuser_doc',$data);
    }

}

/* End of file Appuser.php */
/* Location: ./application/controllers/Appuser.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:45 */
/* http://harviacode.com */