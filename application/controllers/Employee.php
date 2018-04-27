<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('employee/employee_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Employee_model->json();
    }

    public function read($id) 
    {
        $row = $this->Employee_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'EmployeeID' => $row->EmployeeID,
		'ParentEmployeeID' => $row->ParentEmployeeID,
		'EmployeeOldCode' => $row->EmployeeOldCode,
		'EmployeeNewCode' => $row->EmployeeNewCode,
		'EmployeeStatus' => $row->EmployeeStatus,
		'UserGroupID' => $row->UserGroupID,
		'EmployeeGrade' => $row->EmployeeGrade,
		'IdentityType' => $row->IdentityType,
		'IdentityFilePath' => $row->IdentityFilePath,
		'IdentityFileName' => $row->IdentityFileName,
		'PhotoFilePath' => $row->PhotoFilePath,
		'Sex' => $row->Sex,
		'AgencyID' => $row->AgencyID,
		'SalesCenterID' => $row->SalesCenterID,
		'id_posisi' => $row->id_posisi,
		'photo' => $row->photo,
		'nama_lengkap' => $row->nama_lengkap,
		'nama_panggil' => $row->nama_panggil,
		'no_ktp' => $row->no_ktp,
		'npwp' => $row->npwp,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'tinggi_badan' => $row->tinggi_badan,
		'berat_badan' => $row->berat_badan,
		'alamat' => $row->alamat,
		'kota' => $row->kota,
		'kodepos' => $row->kodepos,
		'lama' => $row->lama,
		'status_tinggal' => $row->status_tinggal,
		'status' => $row->status,
		'agama' => $row->agama,
		'telp' => $row->telp,
		'hp' => $row->hp,
		'hp2' => $row->hp2,
		'ibu' => $row->ibu,
		'alamat_ktp' => $row->alamat_ktp,
		'kota_ktp' => $row->kota_ktp,
		'kodepos_ktp' => $row->kodepos_ktp,
		'tinggal_ktp' => $row->tinggal_ktp,
		'email' => $row->email,
		'kendaraan' => $row->kendaraan,
		'nama' => $row->nama,
		'hubungan' => $row->hubungan,
		'no_hp' => $row->no_hp,
		'alamat_emergency' => $row->alamat_emergency,
		'InterviewApprovalID' => $row->InterviewApprovalID,
		'InterviewLevel' => $row->InterviewLevel,
		'InterviewStatus' => $row->InterviewStatus,
		'HiringApprovalID' => $row->HiringApprovalID,
		'HiringLevel' => $row->HiringLevel,
		'HiringStatus' => $row->HiringStatus,
		'ApprovalID' => $row->ApprovalID,
		'ApprovalLevel' => $row->ApprovalLevel,
		'ApprovalStatus' => $row->ApprovalStatus,
		'IsDiscontinued' => $row->IsDiscontinued,
		'IsDedicated' => $row->IsDedicated,
		'DedicatedRemark' => $row->DedicatedRemark,
		'tgl_aktif' => $row->tgl_aktif,
		'tgl_nonaktif' => $row->tgl_nonaktif,
		'keterangan' => $row->keterangan,
		'tanggal_buat' => $row->tanggal_buat,
		'CreatedBy' => $row->CreatedBy,
		'jenjang_pendidikan' => $row->jenjang_pendidikan,
		'nama_sekolah' => $row->nama_sekolah,
		'kota_sekolah' => $row->kota_sekolah,
		'program_study' => $row->program_study,
		'ipk' => $row->ipk,
		'tahun_ijazah' => $row->tahun_ijazah,
		'jenjang_pendidikan1' => $row->jenjang_pendidikan1,
		'nama_sekolah1' => $row->nama_sekolah1,
		'kota_sekolah1' => $row->kota_sekolah1,
		'program_study1' => $row->program_study1,
		'ipk1' => $row->ipk1,
		'tahun_ijazah1' => $row->tahun_ijazah1,
		'jenjang_pendidikan2' => $row->jenjang_pendidikan2,
		'nama_sekolah2' => $row->nama_sekolah2,
		'kota_sekolah2' => $row->kota_sekolah2,
		'program_study2' => $row->program_study2,
		'ipk2' => $row->ipk2,
		'tahun_ijazah2' => $row->tahun_ijazah2,
		'perusahaan' => $row->perusahaan,
		'jabatan' => $row->jabatan,
		'tgl_masuk' => $row->tgl_masuk,
		'tgl_resign' => $row->tgl_resign,
		'alasan' => $row->alasan,
		'perusahaan1' => $row->perusahaan1,
		'jabatan1' => $row->jabatan1,
		'tgl_masuk1' => $row->tgl_masuk1,
		'tgl_resign1' => $row->tgl_resign1,
		'alasan1' => $row->alasan1,
		'perusahaan2' => $row->perusahaan2,
		'jabatan2' => $row->jabatan2,
		'tgl_masuk2' => $row->tgl_masuk2,
		'tgl_resign2' => $row->tgl_resign2,
		'alasan2' => $row->alasan2,
		'ktp' => $row->ktp,
		'do_dont' => $row->do_dont,
		'ijazah' => $row->ijazah,
		'ket' => $row->ket,
		'tgl' => $row->tgl,
		'notif' => $row->notif,
	    );
            $this->load->view('employee/employee_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('employee/create_action'),
	    'ID' => set_value('ID'),
	    'EmployeeID' => set_value('EmployeeID'),
	    'ParentEmployeeID' => set_value('ParentEmployeeID'),
	    'EmployeeOldCode' => set_value('EmployeeOldCode'),
	    'EmployeeNewCode' => set_value('EmployeeNewCode'),
	    'EmployeeStatus' => set_value('EmployeeStatus'),
	    'UserGroupID' => set_value('UserGroupID'),
	    'EmployeeGrade' => set_value('EmployeeGrade'),
	    'IdentityType' => set_value('IdentityType'),
	    'IdentityFilePath' => set_value('IdentityFilePath'),
	    'IdentityFileName' => set_value('IdentityFileName'),
	    'PhotoFilePath' => set_value('PhotoFilePath'),
	    'Sex' => set_value('Sex'),
	    'AgencyID' => set_value('AgencyID'),
	    'SalesCenterID' => set_value('SalesCenterID'),
	    'id_posisi' => set_value('id_posisi'),
	    'photo' => set_value('photo'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'nama_panggil' => set_value('nama_panggil'),
	    'no_ktp' => set_value('no_ktp'),
	    'npwp' => set_value('npwp'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'tinggi_badan' => set_value('tinggi_badan'),
	    'berat_badan' => set_value('berat_badan'),
	    'alamat' => set_value('alamat'),
	    'kota' => set_value('kota'),
	    'kodepos' => set_value('kodepos'),
	    'lama' => set_value('lama'),
	    'status_tinggal' => set_value('status_tinggal'),
	    'status' => set_value('status'),
	    'agama' => set_value('agama'),
	    'telp' => set_value('telp'),
	    'hp' => set_value('hp'),
	    'hp2' => set_value('hp2'),
	    'ibu' => set_value('ibu'),
	    'alamat_ktp' => set_value('alamat_ktp'),
	    'kota_ktp' => set_value('kota_ktp'),
	    'kodepos_ktp' => set_value('kodepos_ktp'),
	    'tinggal_ktp' => set_value('tinggal_ktp'),
	    'email' => set_value('email'),
	    'kendaraan' => set_value('kendaraan'),
	    'nama' => set_value('nama'),
	    'hubungan' => set_value('hubungan'),
	    'no_hp' => set_value('no_hp'),
	    'alamat_emergency' => set_value('alamat_emergency'),
	    'InterviewApprovalID' => set_value('InterviewApprovalID'),
	    'InterviewLevel' => set_value('InterviewLevel'),
	    'InterviewStatus' => set_value('InterviewStatus'),
	    'HiringApprovalID' => set_value('HiringApprovalID'),
	    'HiringLevel' => set_value('HiringLevel'),
	    'HiringStatus' => set_value('HiringStatus'),
	    'ApprovalID' => set_value('ApprovalID'),
	    'ApprovalLevel' => set_value('ApprovalLevel'),
	    'ApprovalStatus' => set_value('ApprovalStatus'),
	    'IsDiscontinued' => set_value('IsDiscontinued'),
	    'IsDedicated' => set_value('IsDedicated'),
	    'DedicatedRemark' => set_value('DedicatedRemark'),
	    'tgl_aktif' => set_value('tgl_aktif'),
	    'tgl_nonaktif' => set_value('tgl_nonaktif'),
	    'keterangan' => set_value('keterangan'),
	    'tanggal_buat' => set_value('tanggal_buat'),
	    'CreatedBy' => set_value('CreatedBy'),
	    'jenjang_pendidikan' => set_value('jenjang_pendidikan'),
	    'nama_sekolah' => set_value('nama_sekolah'),
	    'kota_sekolah' => set_value('kota_sekolah'),
	    'program_study' => set_value('program_study'),
	    'ipk' => set_value('ipk'),
	    'tahun_ijazah' => set_value('tahun_ijazah'),
	    'jenjang_pendidikan1' => set_value('jenjang_pendidikan1'),
	    'nama_sekolah1' => set_value('nama_sekolah1'),
	    'kota_sekolah1' => set_value('kota_sekolah1'),
	    'program_study1' => set_value('program_study1'),
	    'ipk1' => set_value('ipk1'),
	    'tahun_ijazah1' => set_value('tahun_ijazah1'),
	    'jenjang_pendidikan2' => set_value('jenjang_pendidikan2'),
	    'nama_sekolah2' => set_value('nama_sekolah2'),
	    'kota_sekolah2' => set_value('kota_sekolah2'),
	    'program_study2' => set_value('program_study2'),
	    'ipk2' => set_value('ipk2'),
	    'tahun_ijazah2' => set_value('tahun_ijazah2'),
	    'perusahaan' => set_value('perusahaan'),
	    'jabatan' => set_value('jabatan'),
	    'tgl_masuk' => set_value('tgl_masuk'),
	    'tgl_resign' => set_value('tgl_resign'),
	    'alasan' => set_value('alasan'),
	    'perusahaan1' => set_value('perusahaan1'),
	    'jabatan1' => set_value('jabatan1'),
	    'tgl_masuk1' => set_value('tgl_masuk1'),
	    'tgl_resign1' => set_value('tgl_resign1'),
	    'alasan1' => set_value('alasan1'),
	    'perusahaan2' => set_value('perusahaan2'),
	    'jabatan2' => set_value('jabatan2'),
	    'tgl_masuk2' => set_value('tgl_masuk2'),
	    'tgl_resign2' => set_value('tgl_resign2'),
	    'alasan2' => set_value('alasan2'),
	    'ktp' => set_value('ktp'),
	    'do_dont' => set_value('do_dont'),
	    'ijazah' => set_value('ijazah'),
	    'ket' => set_value('ket'),
	    'tgl' => set_value('tgl'),
	    'notif' => set_value('notif'),
	);
        $this->load->view('employee/employee_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'EmployeeID' => $this->input->post('EmployeeID',TRUE),
		'ParentEmployeeID' => $this->input->post('ParentEmployeeID',TRUE),
		'EmployeeOldCode' => $this->input->post('EmployeeOldCode',TRUE),
		'EmployeeNewCode' => $this->input->post('EmployeeNewCode',TRUE),
		'EmployeeStatus' => $this->input->post('EmployeeStatus',TRUE),
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'EmployeeGrade' => $this->input->post('EmployeeGrade',TRUE),
		'IdentityType' => $this->input->post('IdentityType',TRUE),
		'IdentityFilePath' => $this->input->post('IdentityFilePath',TRUE),
		'IdentityFileName' => $this->input->post('IdentityFileName',TRUE),
		'PhotoFilePath' => $this->input->post('PhotoFilePath',TRUE),
		'Sex' => $this->input->post('Sex',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'SalesCenterID' => $this->input->post('SalesCenterID',TRUE),
		'id_posisi' => $this->input->post('id_posisi',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'nama_panggil' => $this->input->post('nama_panggil',TRUE),
		'no_ktp' => $this->input->post('no_ktp',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
		'berat_badan' => $this->input->post('berat_badan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'kodepos' => $this->input->post('kodepos',TRUE),
		'lama' => $this->input->post('lama',TRUE),
		'status_tinggal' => $this->input->post('status_tinggal',TRUE),
		'status' => $this->input->post('status',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'hp2' => $this->input->post('hp2',TRUE),
		'ibu' => $this->input->post('ibu',TRUE),
		'alamat_ktp' => $this->input->post('alamat_ktp',TRUE),
		'kota_ktp' => $this->input->post('kota_ktp',TRUE),
		'kodepos_ktp' => $this->input->post('kodepos_ktp',TRUE),
		'tinggal_ktp' => $this->input->post('tinggal_ktp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'kendaraan' => $this->input->post('kendaraan',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'hubungan' => $this->input->post('hubungan',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'alamat_emergency' => $this->input->post('alamat_emergency',TRUE),
		'InterviewApprovalID' => $this->input->post('InterviewApprovalID',TRUE),
		'InterviewLevel' => $this->input->post('InterviewLevel',TRUE),
		'InterviewStatus' => $this->input->post('InterviewStatus',TRUE),
		'HiringApprovalID' => $this->input->post('HiringApprovalID',TRUE),
		'HiringLevel' => $this->input->post('HiringLevel',TRUE),
		'HiringStatus' => $this->input->post('HiringStatus',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'ApprovalLevel' => $this->input->post('ApprovalLevel',TRUE),
		'ApprovalStatus' => $this->input->post('ApprovalStatus',TRUE),
		'IsDiscontinued' => $this->input->post('IsDiscontinued',TRUE),
		'IsDedicated' => $this->input->post('IsDedicated',TRUE),
		'DedicatedRemark' => $this->input->post('DedicatedRemark',TRUE),
		'tgl_aktif' => $this->input->post('tgl_aktif',TRUE),
		'tgl_nonaktif' => $this->input->post('tgl_nonaktif',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tanggal_buat' => $this->input->post('tanggal_buat',TRUE),
		'CreatedBy' => $this->input->post('CreatedBy',TRUE),
		'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan',TRUE),
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'kota_sekolah' => $this->input->post('kota_sekolah',TRUE),
		'program_study' => $this->input->post('program_study',TRUE),
		'ipk' => $this->input->post('ipk',TRUE),
		'tahun_ijazah' => $this->input->post('tahun_ijazah',TRUE),
		'jenjang_pendidikan1' => $this->input->post('jenjang_pendidikan1',TRUE),
		'nama_sekolah1' => $this->input->post('nama_sekolah1',TRUE),
		'kota_sekolah1' => $this->input->post('kota_sekolah1',TRUE),
		'program_study1' => $this->input->post('program_study1',TRUE),
		'ipk1' => $this->input->post('ipk1',TRUE),
		'tahun_ijazah1' => $this->input->post('tahun_ijazah1',TRUE),
		'jenjang_pendidikan2' => $this->input->post('jenjang_pendidikan2',TRUE),
		'nama_sekolah2' => $this->input->post('nama_sekolah2',TRUE),
		'kota_sekolah2' => $this->input->post('kota_sekolah2',TRUE),
		'program_study2' => $this->input->post('program_study2',TRUE),
		'ipk2' => $this->input->post('ipk2',TRUE),
		'tahun_ijazah2' => $this->input->post('tahun_ijazah2',TRUE),
		'perusahaan' => $this->input->post('perusahaan',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
		'tgl_resign' => $this->input->post('tgl_resign',TRUE),
		'alasan' => $this->input->post('alasan',TRUE),
		'perusahaan1' => $this->input->post('perusahaan1',TRUE),
		'jabatan1' => $this->input->post('jabatan1',TRUE),
		'tgl_masuk1' => $this->input->post('tgl_masuk1',TRUE),
		'tgl_resign1' => $this->input->post('tgl_resign1',TRUE),
		'alasan1' => $this->input->post('alasan1',TRUE),
		'perusahaan2' => $this->input->post('perusahaan2',TRUE),
		'jabatan2' => $this->input->post('jabatan2',TRUE),
		'tgl_masuk2' => $this->input->post('tgl_masuk2',TRUE),
		'tgl_resign2' => $this->input->post('tgl_resign2',TRUE),
		'alasan2' => $this->input->post('alasan2',TRUE),
		'ktp' => $this->input->post('ktp',TRUE),
		'do_dont' => $this->input->post('do_dont',TRUE),
		'ijazah' => $this->input->post('ijazah',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'notif' => $this->input->post('notif',TRUE),
	    );

            $this->Employee_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('employee'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employee/update_action'),
		'ID' => set_value('ID', $row->ID),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
		'ParentEmployeeID' => set_value('ParentEmployeeID', $row->ParentEmployeeID),
		'EmployeeOldCode' => set_value('EmployeeOldCode', $row->EmployeeOldCode),
		'EmployeeNewCode' => set_value('EmployeeNewCode', $row->EmployeeNewCode),
		'EmployeeStatus' => set_value('EmployeeStatus', $row->EmployeeStatus),
		'UserGroupID' => set_value('UserGroupID', $row->UserGroupID),
		'EmployeeGrade' => set_value('EmployeeGrade', $row->EmployeeGrade),
		'IdentityType' => set_value('IdentityType', $row->IdentityType),
		'IdentityFilePath' => set_value('IdentityFilePath', $row->IdentityFilePath),
		'IdentityFileName' => set_value('IdentityFileName', $row->IdentityFileName),
		'PhotoFilePath' => set_value('PhotoFilePath', $row->PhotoFilePath),
		'Sex' => set_value('Sex', $row->Sex),
		'AgencyID' => set_value('AgencyID', $row->AgencyID),
		'SalesCenterID' => set_value('SalesCenterID', $row->SalesCenterID),
		'id_posisi' => set_value('id_posisi', $row->id_posisi),
		'photo' => set_value('photo', $row->photo),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'nama_panggil' => set_value('nama_panggil', $row->nama_panggil),
		'no_ktp' => set_value('no_ktp', $row->no_ktp),
		'npwp' => set_value('npwp', $row->npwp),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'tinggi_badan' => set_value('tinggi_badan', $row->tinggi_badan),
		'berat_badan' => set_value('berat_badan', $row->berat_badan),
		'alamat' => set_value('alamat', $row->alamat),
		'kota' => set_value('kota', $row->kota),
		'kodepos' => set_value('kodepos', $row->kodepos),
		'lama' => set_value('lama', $row->lama),
		'status_tinggal' => set_value('status_tinggal', $row->status_tinggal),
		'status' => set_value('status', $row->status),
		'agama' => set_value('agama', $row->agama),
		'telp' => set_value('telp', $row->telp),
		'hp' => set_value('hp', $row->hp),
		'hp2' => set_value('hp2', $row->hp2),
		'ibu' => set_value('ibu', $row->ibu),
		'alamat_ktp' => set_value('alamat_ktp', $row->alamat_ktp),
		'kota_ktp' => set_value('kota_ktp', $row->kota_ktp),
		'kodepos_ktp' => set_value('kodepos_ktp', $row->kodepos_ktp),
		'tinggal_ktp' => set_value('tinggal_ktp', $row->tinggal_ktp),
		'email' => set_value('email', $row->email),
		'kendaraan' => set_value('kendaraan', $row->kendaraan),
		'nama' => set_value('nama', $row->nama),
		'hubungan' => set_value('hubungan', $row->hubungan),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'alamat_emergency' => set_value('alamat_emergency', $row->alamat_emergency),
		'InterviewApprovalID' => set_value('InterviewApprovalID', $row->InterviewApprovalID),
		'InterviewLevel' => set_value('InterviewLevel', $row->InterviewLevel),
		'InterviewStatus' => set_value('InterviewStatus', $row->InterviewStatus),
		'HiringApprovalID' => set_value('HiringApprovalID', $row->HiringApprovalID),
		'HiringLevel' => set_value('HiringLevel', $row->HiringLevel),
		'HiringStatus' => set_value('HiringStatus', $row->HiringStatus),
		'ApprovalID' => set_value('ApprovalID', $row->ApprovalID),
		'ApprovalLevel' => set_value('ApprovalLevel', $row->ApprovalLevel),
		'ApprovalStatus' => set_value('ApprovalStatus', $row->ApprovalStatus),
		'IsDiscontinued' => set_value('IsDiscontinued', $row->IsDiscontinued),
		'IsDedicated' => set_value('IsDedicated', $row->IsDedicated),
		'DedicatedRemark' => set_value('DedicatedRemark', $row->DedicatedRemark),
		'tgl_aktif' => set_value('tgl_aktif', $row->tgl_aktif),
		'tgl_nonaktif' => set_value('tgl_nonaktif', $row->tgl_nonaktif),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'tanggal_buat' => set_value('tanggal_buat', $row->tanggal_buat),
		'CreatedBy' => set_value('CreatedBy', $row->CreatedBy),
		'jenjang_pendidikan' => set_value('jenjang_pendidikan', $row->jenjang_pendidikan),
		'nama_sekolah' => set_value('nama_sekolah', $row->nama_sekolah),
		'kota_sekolah' => set_value('kota_sekolah', $row->kota_sekolah),
		'program_study' => set_value('program_study', $row->program_study),
		'ipk' => set_value('ipk', $row->ipk),
		'tahun_ijazah' => set_value('tahun_ijazah', $row->tahun_ijazah),
		'jenjang_pendidikan1' => set_value('jenjang_pendidikan1', $row->jenjang_pendidikan1),
		'nama_sekolah1' => set_value('nama_sekolah1', $row->nama_sekolah1),
		'kota_sekolah1' => set_value('kota_sekolah1', $row->kota_sekolah1),
		'program_study1' => set_value('program_study1', $row->program_study1),
		'ipk1' => set_value('ipk1', $row->ipk1),
		'tahun_ijazah1' => set_value('tahun_ijazah1', $row->tahun_ijazah1),
		'jenjang_pendidikan2' => set_value('jenjang_pendidikan2', $row->jenjang_pendidikan2),
		'nama_sekolah2' => set_value('nama_sekolah2', $row->nama_sekolah2),
		'kota_sekolah2' => set_value('kota_sekolah2', $row->kota_sekolah2),
		'program_study2' => set_value('program_study2', $row->program_study2),
		'ipk2' => set_value('ipk2', $row->ipk2),
		'tahun_ijazah2' => set_value('tahun_ijazah2', $row->tahun_ijazah2),
		'perusahaan' => set_value('perusahaan', $row->perusahaan),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'tgl_masuk' => set_value('tgl_masuk', $row->tgl_masuk),
		'tgl_resign' => set_value('tgl_resign', $row->tgl_resign),
		'alasan' => set_value('alasan', $row->alasan),
		'perusahaan1' => set_value('perusahaan1', $row->perusahaan1),
		'jabatan1' => set_value('jabatan1', $row->jabatan1),
		'tgl_masuk1' => set_value('tgl_masuk1', $row->tgl_masuk1),
		'tgl_resign1' => set_value('tgl_resign1', $row->tgl_resign1),
		'alasan1' => set_value('alasan1', $row->alasan1),
		'perusahaan2' => set_value('perusahaan2', $row->perusahaan2),
		'jabatan2' => set_value('jabatan2', $row->jabatan2),
		'tgl_masuk2' => set_value('tgl_masuk2', $row->tgl_masuk2),
		'tgl_resign2' => set_value('tgl_resign2', $row->tgl_resign2),
		'alasan2' => set_value('alasan2', $row->alasan2),
		'ktp' => set_value('ktp', $row->ktp),
		'do_dont' => set_value('do_dont', $row->do_dont),
		'ijazah' => set_value('ijazah', $row->ijazah),
		'ket' => set_value('ket', $row->ket),
		'tgl' => set_value('tgl', $row->tgl),
		'notif' => set_value('notif', $row->notif),
	    );
            $this->load->view('employee/employee_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'EmployeeID' => $this->input->post('EmployeeID',TRUE),
		'ParentEmployeeID' => $this->input->post('ParentEmployeeID',TRUE),
		'EmployeeOldCode' => $this->input->post('EmployeeOldCode',TRUE),
		'EmployeeNewCode' => $this->input->post('EmployeeNewCode',TRUE),
		'EmployeeStatus' => $this->input->post('EmployeeStatus',TRUE),
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'EmployeeGrade' => $this->input->post('EmployeeGrade',TRUE),
		'IdentityType' => $this->input->post('IdentityType',TRUE),
		'IdentityFilePath' => $this->input->post('IdentityFilePath',TRUE),
		'IdentityFileName' => $this->input->post('IdentityFileName',TRUE),
		'PhotoFilePath' => $this->input->post('PhotoFilePath',TRUE),
		'Sex' => $this->input->post('Sex',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'SalesCenterID' => $this->input->post('SalesCenterID',TRUE),
		'id_posisi' => $this->input->post('id_posisi',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'nama_panggil' => $this->input->post('nama_panggil',TRUE),
		'no_ktp' => $this->input->post('no_ktp',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
		'berat_badan' => $this->input->post('berat_badan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'kodepos' => $this->input->post('kodepos',TRUE),
		'lama' => $this->input->post('lama',TRUE),
		'status_tinggal' => $this->input->post('status_tinggal',TRUE),
		'status' => $this->input->post('status',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'hp2' => $this->input->post('hp2',TRUE),
		'ibu' => $this->input->post('ibu',TRUE),
		'alamat_ktp' => $this->input->post('alamat_ktp',TRUE),
		'kota_ktp' => $this->input->post('kota_ktp',TRUE),
		'kodepos_ktp' => $this->input->post('kodepos_ktp',TRUE),
		'tinggal_ktp' => $this->input->post('tinggal_ktp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'kendaraan' => $this->input->post('kendaraan',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'hubungan' => $this->input->post('hubungan',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'alamat_emergency' => $this->input->post('alamat_emergency',TRUE),
		'InterviewApprovalID' => $this->input->post('InterviewApprovalID',TRUE),
		'InterviewLevel' => $this->input->post('InterviewLevel',TRUE),
		'InterviewStatus' => $this->input->post('InterviewStatus',TRUE),
		'HiringApprovalID' => $this->input->post('HiringApprovalID',TRUE),
		'HiringLevel' => $this->input->post('HiringLevel',TRUE),
		'HiringStatus' => $this->input->post('HiringStatus',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'ApprovalLevel' => $this->input->post('ApprovalLevel',TRUE),
		'ApprovalStatus' => $this->input->post('ApprovalStatus',TRUE),
		'IsDiscontinued' => $this->input->post('IsDiscontinued',TRUE),
		'IsDedicated' => $this->input->post('IsDedicated',TRUE),
		'DedicatedRemark' => $this->input->post('DedicatedRemark',TRUE),
		'tgl_aktif' => $this->input->post('tgl_aktif',TRUE),
		'tgl_nonaktif' => $this->input->post('tgl_nonaktif',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tanggal_buat' => $this->input->post('tanggal_buat',TRUE),
		'CreatedBy' => $this->input->post('CreatedBy',TRUE),
		'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan',TRUE),
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'kota_sekolah' => $this->input->post('kota_sekolah',TRUE),
		'program_study' => $this->input->post('program_study',TRUE),
		'ipk' => $this->input->post('ipk',TRUE),
		'tahun_ijazah' => $this->input->post('tahun_ijazah',TRUE),
		'jenjang_pendidikan1' => $this->input->post('jenjang_pendidikan1',TRUE),
		'nama_sekolah1' => $this->input->post('nama_sekolah1',TRUE),
		'kota_sekolah1' => $this->input->post('kota_sekolah1',TRUE),
		'program_study1' => $this->input->post('program_study1',TRUE),
		'ipk1' => $this->input->post('ipk1',TRUE),
		'tahun_ijazah1' => $this->input->post('tahun_ijazah1',TRUE),
		'jenjang_pendidikan2' => $this->input->post('jenjang_pendidikan2',TRUE),
		'nama_sekolah2' => $this->input->post('nama_sekolah2',TRUE),
		'kota_sekolah2' => $this->input->post('kota_sekolah2',TRUE),
		'program_study2' => $this->input->post('program_study2',TRUE),
		'ipk2' => $this->input->post('ipk2',TRUE),
		'tahun_ijazah2' => $this->input->post('tahun_ijazah2',TRUE),
		'perusahaan' => $this->input->post('perusahaan',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
		'tgl_resign' => $this->input->post('tgl_resign',TRUE),
		'alasan' => $this->input->post('alasan',TRUE),
		'perusahaan1' => $this->input->post('perusahaan1',TRUE),
		'jabatan1' => $this->input->post('jabatan1',TRUE),
		'tgl_masuk1' => $this->input->post('tgl_masuk1',TRUE),
		'tgl_resign1' => $this->input->post('tgl_resign1',TRUE),
		'alasan1' => $this->input->post('alasan1',TRUE),
		'perusahaan2' => $this->input->post('perusahaan2',TRUE),
		'jabatan2' => $this->input->post('jabatan2',TRUE),
		'tgl_masuk2' => $this->input->post('tgl_masuk2',TRUE),
		'tgl_resign2' => $this->input->post('tgl_resign2',TRUE),
		'alasan2' => $this->input->post('alasan2',TRUE),
		'ktp' => $this->input->post('ktp',TRUE),
		'do_dont' => $this->input->post('do_dont',TRUE),
		'ijazah' => $this->input->post('ijazah',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'notif' => $this->input->post('notif',TRUE),
	    );

            $this->Employee_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employee'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $this->Employee_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('employee'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('EmployeeID', 'employeeid', 'trim|required');
	$this->form_validation->set_rules('ParentEmployeeID', 'parentemployeeid', 'trim|required');
	$this->form_validation->set_rules('EmployeeOldCode', 'employeeoldcode', 'trim|required');
	$this->form_validation->set_rules('EmployeeNewCode', 'employeenewcode', 'trim|required');
	$this->form_validation->set_rules('EmployeeStatus', 'employeestatus', 'trim|required');
	$this->form_validation->set_rules('UserGroupID', 'usergroupid', 'trim|required');
	$this->form_validation->set_rules('EmployeeGrade', 'employeegrade', 'trim|required');
	$this->form_validation->set_rules('IdentityType', 'identitytype', 'trim|required');
	$this->form_validation->set_rules('IdentityFilePath', 'identityfilepath', 'trim|required');
	$this->form_validation->set_rules('IdentityFileName', 'identityfilename', 'trim|required');
	$this->form_validation->set_rules('PhotoFilePath', 'photofilepath', 'trim|required');
	$this->form_validation->set_rules('Sex', 'sex', 'trim|required');
	$this->form_validation->set_rules('AgencyID', 'agencyid', 'trim|required');
	$this->form_validation->set_rules('SalesCenterID', 'salescenterid', 'trim|required');
	$this->form_validation->set_rules('id_posisi', 'id posisi', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('nama_panggil', 'nama panggil', 'trim|required');
	$this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required');
	$this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim|required');
	$this->form_validation->set_rules('berat_badan', 'berat badan', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('kodepos', 'kodepos', 'trim|required');
	$this->form_validation->set_rules('lama', 'lama', 'trim|required');
	$this->form_validation->set_rules('status_tinggal', 'status tinggal', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');
	$this->form_validation->set_rules('hp2', 'hp2', 'trim|required');
	$this->form_validation->set_rules('ibu', 'ibu', 'trim|required');
	$this->form_validation->set_rules('alamat_ktp', 'alamat ktp', 'trim|required');
	$this->form_validation->set_rules('kota_ktp', 'kota ktp', 'trim|required');
	$this->form_validation->set_rules('kodepos_ktp', 'kodepos ktp', 'trim|required');
	$this->form_validation->set_rules('tinggal_ktp', 'tinggal ktp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('kendaraan', 'kendaraan', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('hubungan', 'hubungan', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('alamat_emergency', 'alamat emergency', 'trim|required');
	$this->form_validation->set_rules('InterviewApprovalID', 'interviewapprovalid', 'trim|required');
	$this->form_validation->set_rules('InterviewLevel', 'interviewlevel', 'trim|required');
	$this->form_validation->set_rules('InterviewStatus', 'interviewstatus', 'trim|required');
	$this->form_validation->set_rules('HiringApprovalID', 'hiringapprovalid', 'trim|required');
	$this->form_validation->set_rules('HiringLevel', 'hiringlevel', 'trim|required');
	$this->form_validation->set_rules('HiringStatus', 'hiringstatus', 'trim|required');
	$this->form_validation->set_rules('ApprovalID', 'approvalid', 'trim|required');
	$this->form_validation->set_rules('ApprovalLevel', 'approvallevel', 'trim|required');
	$this->form_validation->set_rules('ApprovalStatus', 'approvalstatus', 'trim|required');
	$this->form_validation->set_rules('IsDiscontinued', 'isdiscontinued', 'trim|required');
	$this->form_validation->set_rules('IsDedicated', 'isdedicated', 'trim|required');
	$this->form_validation->set_rules('DedicatedRemark', 'dedicatedremark', 'trim|required');
	$this->form_validation->set_rules('tgl_aktif', 'tgl aktif', 'trim|required');
	$this->form_validation->set_rules('tgl_nonaktif', 'tgl nonaktif', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('tanggal_buat', 'tanggal buat', 'trim|required');
	$this->form_validation->set_rules('CreatedBy', 'createdby', 'trim|required');
	$this->form_validation->set_rules('jenjang_pendidikan', 'jenjang pendidikan', 'trim|required');
	$this->form_validation->set_rules('nama_sekolah', 'nama sekolah', 'trim|required');
	$this->form_validation->set_rules('kota_sekolah', 'kota sekolah', 'trim|required');
	$this->form_validation->set_rules('program_study', 'program study', 'trim|required');
	$this->form_validation->set_rules('ipk', 'ipk', 'trim|required');
	$this->form_validation->set_rules('tahun_ijazah', 'tahun ijazah', 'trim|required');
	$this->form_validation->set_rules('jenjang_pendidikan1', 'jenjang pendidikan1', 'trim|required');
	$this->form_validation->set_rules('nama_sekolah1', 'nama sekolah1', 'trim|required');
	$this->form_validation->set_rules('kota_sekolah1', 'kota sekolah1', 'trim|required');
	$this->form_validation->set_rules('program_study1', 'program study1', 'trim|required');
	$this->form_validation->set_rules('ipk1', 'ipk1', 'trim|required');
	$this->form_validation->set_rules('tahun_ijazah1', 'tahun ijazah1', 'trim|required');
	$this->form_validation->set_rules('jenjang_pendidikan2', 'jenjang pendidikan2', 'trim|required');
	$this->form_validation->set_rules('nama_sekolah2', 'nama sekolah2', 'trim|required');
	$this->form_validation->set_rules('kota_sekolah2', 'kota sekolah2', 'trim|required');
	$this->form_validation->set_rules('program_study2', 'program study2', 'trim|required');
	$this->form_validation->set_rules('ipk2', 'ipk2', 'trim|required');
	$this->form_validation->set_rules('tahun_ijazah2', 'tahun ijazah2', 'trim|required');
	$this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('tgl_masuk', 'tgl masuk', 'trim|required');
	$this->form_validation->set_rules('tgl_resign', 'tgl resign', 'trim|required');
	$this->form_validation->set_rules('alasan', 'alasan', 'trim|required');
	$this->form_validation->set_rules('perusahaan1', 'perusahaan1', 'trim|required');
	$this->form_validation->set_rules('jabatan1', 'jabatan1', 'trim|required');
	$this->form_validation->set_rules('tgl_masuk1', 'tgl masuk1', 'trim|required');
	$this->form_validation->set_rules('tgl_resign1', 'tgl resign1', 'trim|required');
	$this->form_validation->set_rules('alasan1', 'alasan1', 'trim|required');
	$this->form_validation->set_rules('perusahaan2', 'perusahaan2', 'trim|required');
	$this->form_validation->set_rules('jabatan2', 'jabatan2', 'trim|required');
	$this->form_validation->set_rules('tgl_masuk2', 'tgl masuk2', 'trim|required');
	$this->form_validation->set_rules('tgl_resign2', 'tgl resign2', 'trim|required');
	$this->form_validation->set_rules('alasan2', 'alasan2', 'trim|required');
	$this->form_validation->set_rules('ktp', 'ktp', 'trim|required');
	$this->form_validation->set_rules('do_dont', 'do dont', 'trim|required');
	$this->form_validation->set_rules('ijazah', 'ijazah', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('notif', 'notif', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "employee.xls";
        $judul = "employee";
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
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeID");
	xlsWriteLabel($tablehead, $kolomhead++, "ParentEmployeeID");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeOldCode");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeNewCode");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "UserGroupID");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeGrade");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityType");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityFilePath");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityFileName");
	xlsWriteLabel($tablehead, $kolomhead++, "PhotoFilePath");
	xlsWriteLabel($tablehead, $kolomhead++, "Sex");
	xlsWriteLabel($tablehead, $kolomhead++, "AgencyID");
	xlsWriteLabel($tablehead, $kolomhead++, "SalesCenterID");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Posisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Photo");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Panggil");
	xlsWriteLabel($tablehead, $kolomhead++, "No Ktp");
	xlsWriteLabel($tablehead, $kolomhead++, "Npwp");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tinggi Badan");
	xlsWriteLabel($tablehead, $kolomhead++, "Berat Badan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Kodepos");
	xlsWriteLabel($tablehead, $kolomhead++, "Lama");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Tinggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp2");
	xlsWriteLabel($tablehead, $kolomhead++, "Ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Ktp");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota Ktp");
	xlsWriteLabel($tablehead, $kolomhead++, "Kodepos Ktp");
	xlsWriteLabel($tablehead, $kolomhead++, "Tinggal Ktp");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Kendaraan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Hubungan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Emergency");
	xlsWriteLabel($tablehead, $kolomhead++, "InterviewApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "InterviewLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "InterviewStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "HiringApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "HiringLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "HiringStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "IsDiscontinued");
	xlsWriteLabel($tablehead, $kolomhead++, "IsDedicated");
	xlsWriteLabel($tablehead, $kolomhead++, "DedicatedRemark");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Aktif");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Nonaktif");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Buat");
	xlsWriteLabel($tablehead, $kolomhead++, "CreatedBy");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenjang Pendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Study");
	xlsWriteLabel($tablehead, $kolomhead++, "Ipk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Ijazah");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenjang Pendidikan1");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Sekolah1");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota Sekolah1");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Study1");
	xlsWriteLabel($tablehead, $kolomhead++, "Ipk1");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Ijazah1");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenjang Pendidikan2");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Sekolah2");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota Sekolah2");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Study2");
	xlsWriteLabel($tablehead, $kolomhead++, "Ipk2");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Ijazah2");
	xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Resign");
	xlsWriteLabel($tablehead, $kolomhead++, "Alasan");
	xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan1");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan1");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Masuk1");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Resign1");
	xlsWriteLabel($tablehead, $kolomhead++, "Alasan1");
	xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan2");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan2");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Masuk2");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Resign2");
	xlsWriteLabel($tablehead, $kolomhead++, "Alasan2");
	xlsWriteLabel($tablehead, $kolomhead++, "Ktp");
	xlsWriteLabel($tablehead, $kolomhead++, "Do Dont");
	xlsWriteLabel($tablehead, $kolomhead++, "Ijazah");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Notif");

	foreach ($this->Employee_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->EmployeeID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ParentEmployeeID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeOldCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeNewCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UserGroupID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeGrade);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityType);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityFilePath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityFileName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhotoFilePath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Sex);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AgencyID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->SalesCenterID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_posisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->photo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_panggil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_ktp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tinggi_badan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berat_badan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kodepos);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_tinggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_ktp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota_ktp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kodepos_ktp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tinggal_ktp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kendaraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hubungan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_emergency);
	    xlsWriteNumber($tablebody, $kolombody++, $data->InterviewApprovalID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->InterviewLevel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->InterviewStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->HiringApprovalID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->HiringLevel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->HiringStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ApprovalLevel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ApprovalStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IsDiscontinued);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IsDedicated);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DedicatedRemark);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_aktif);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_nonaktif);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_buat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->CreatedBy);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenjang_pendidikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->program_study);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ipk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tahun_ijazah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenjang_pendidikan1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sekolah1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota_sekolah1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->program_study1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ipk1);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tahun_ijazah1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenjang_pendidikan2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sekolah2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota_sekolah2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->program_study2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ipk2);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tahun_ijazah2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_resign);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alasan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perusahaan1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_resign1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alasan1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perusahaan2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_resign2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alasan2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ktp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->do_dont);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ijazah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->notif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=employee.doc");

        $data = array(
            'employee_data' => $this->Employee_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('employee/employee_doc',$data);
    }

}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:46 */
/* http://harviacode.com */