<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_model extends CI_Model
{

    public $table = 'employee';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID,EmployeeID,ParentEmployeeID,EmployeeOldCode,EmployeeNewCode,EmployeeStatus,UserGroupID,EmployeeGrade,IdentityType,IdentityFilePath,IdentityFileName,PhotoFilePath,Sex,AgencyID,SalesCenterID,id_posisi,photo,nama_lengkap,nama_panggil,no_ktp,npwp,tempat_lahir,tanggal_lahir,tinggi_badan,berat_badan,alamat,kota,kodepos,lama,status_tinggal,status,agama,telp,hp,hp2,ibu,alamat_ktp,kota_ktp,kodepos_ktp,tinggal_ktp,email,kendaraan,nama,hubungan,no_hp,alamat_emergency,InterviewApprovalID,InterviewLevel,InterviewStatus,HiringApprovalID,HiringLevel,HiringStatus,ApprovalID,ApprovalLevel,ApprovalStatus,IsDiscontinued,IsDedicated,DedicatedRemark,tgl_aktif,tgl_nonaktif,keterangan,tanggal_buat,CreatedBy,jenjang_pendidikan,nama_sekolah,kota_sekolah,program_study,ipk,tahun_ijazah,jenjang_pendidikan1,nama_sekolah1,kota_sekolah1,program_study1,ipk1,tahun_ijazah1,jenjang_pendidikan2,nama_sekolah2,kota_sekolah2,program_study2,ipk2,tahun_ijazah2,perusahaan,jabatan,tgl_masuk,tgl_resign,alasan,perusahaan1,jabatan1,tgl_masuk1,tgl_resign1,alasan1,perusahaan2,jabatan2,tgl_masuk2,tgl_resign2,alasan2,ktp,do_dont,ijazah,ket,tgl,notif');
        $this->datatables->from('employee');
        //add this line for join
        //$this->datatables->join('table2', 'employee.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('employee/read/$1'),'Read')." | ".anchor(site_url('employee/update/$1'),'Update')." | ".anchor(site_url('employee/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID', $q);
	$this->db->or_like('EmployeeID', $q);
	$this->db->or_like('ParentEmployeeID', $q);
	$this->db->or_like('EmployeeOldCode', $q);
	$this->db->or_like('EmployeeNewCode', $q);
	$this->db->or_like('EmployeeStatus', $q);
	$this->db->or_like('UserGroupID', $q);
	$this->db->or_like('EmployeeGrade', $q);
	$this->db->or_like('IdentityType', $q);
	$this->db->or_like('IdentityFilePath', $q);
	$this->db->or_like('IdentityFileName', $q);
	$this->db->or_like('PhotoFilePath', $q);
	$this->db->or_like('Sex', $q);
	$this->db->or_like('AgencyID', $q);
	$this->db->or_like('SalesCenterID', $q);
	$this->db->or_like('id_posisi', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('nama_panggil', $q);
	$this->db->or_like('no_ktp', $q);
	$this->db->or_like('npwp', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('tinggi_badan', $q);
	$this->db->or_like('berat_badan', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('kota', $q);
	$this->db->or_like('kodepos', $q);
	$this->db->or_like('lama', $q);
	$this->db->or_like('status_tinggal', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('telp', $q);
	$this->db->or_like('hp', $q);
	$this->db->or_like('hp2', $q);
	$this->db->or_like('ibu', $q);
	$this->db->or_like('alamat_ktp', $q);
	$this->db->or_like('kota_ktp', $q);
	$this->db->or_like('kodepos_ktp', $q);
	$this->db->or_like('tinggal_ktp', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('kendaraan', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('hubungan', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('alamat_emergency', $q);
	$this->db->or_like('InterviewApprovalID', $q);
	$this->db->or_like('InterviewLevel', $q);
	$this->db->or_like('InterviewStatus', $q);
	$this->db->or_like('HiringApprovalID', $q);
	$this->db->or_like('HiringLevel', $q);
	$this->db->or_like('HiringStatus', $q);
	$this->db->or_like('ApprovalID', $q);
	$this->db->or_like('ApprovalLevel', $q);
	$this->db->or_like('ApprovalStatus', $q);
	$this->db->or_like('IsDiscontinued', $q);
	$this->db->or_like('IsDedicated', $q);
	$this->db->or_like('DedicatedRemark', $q);
	$this->db->or_like('tgl_aktif', $q);
	$this->db->or_like('tgl_nonaktif', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('tanggal_buat', $q);
	$this->db->or_like('CreatedBy', $q);
	$this->db->or_like('jenjang_pendidikan', $q);
	$this->db->or_like('nama_sekolah', $q);
	$this->db->or_like('kota_sekolah', $q);
	$this->db->or_like('program_study', $q);
	$this->db->or_like('ipk', $q);
	$this->db->or_like('tahun_ijazah', $q);
	$this->db->or_like('jenjang_pendidikan1', $q);
	$this->db->or_like('nama_sekolah1', $q);
	$this->db->or_like('kota_sekolah1', $q);
	$this->db->or_like('program_study1', $q);
	$this->db->or_like('ipk1', $q);
	$this->db->or_like('tahun_ijazah1', $q);
	$this->db->or_like('jenjang_pendidikan2', $q);
	$this->db->or_like('nama_sekolah2', $q);
	$this->db->or_like('kota_sekolah2', $q);
	$this->db->or_like('program_study2', $q);
	$this->db->or_like('ipk2', $q);
	$this->db->or_like('tahun_ijazah2', $q);
	$this->db->or_like('perusahaan', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('tgl_masuk', $q);
	$this->db->or_like('tgl_resign', $q);
	$this->db->or_like('alasan', $q);
	$this->db->or_like('perusahaan1', $q);
	$this->db->or_like('jabatan1', $q);
	$this->db->or_like('tgl_masuk1', $q);
	$this->db->or_like('tgl_resign1', $q);
	$this->db->or_like('alasan1', $q);
	$this->db->or_like('perusahaan2', $q);
	$this->db->or_like('jabatan2', $q);
	$this->db->or_like('tgl_masuk2', $q);
	$this->db->or_like('tgl_resign2', $q);
	$this->db->or_like('alasan2', $q);
	$this->db->or_like('ktp', $q);
	$this->db->or_like('do_dont', $q);
	$this->db->or_like('ijazah', $q);
	$this->db->or_like('ket', $q);
	$this->db->or_like('tgl', $q);
	$this->db->or_like('notif', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
	$this->db->or_like('EmployeeID', $q);
	$this->db->or_like('ParentEmployeeID', $q);
	$this->db->or_like('EmployeeOldCode', $q);
	$this->db->or_like('EmployeeNewCode', $q);
	$this->db->or_like('EmployeeStatus', $q);
	$this->db->or_like('UserGroupID', $q);
	$this->db->or_like('EmployeeGrade', $q);
	$this->db->or_like('IdentityType', $q);
	$this->db->or_like('IdentityFilePath', $q);
	$this->db->or_like('IdentityFileName', $q);
	$this->db->or_like('PhotoFilePath', $q);
	$this->db->or_like('Sex', $q);
	$this->db->or_like('AgencyID', $q);
	$this->db->or_like('SalesCenterID', $q);
	$this->db->or_like('id_posisi', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('nama_panggil', $q);
	$this->db->or_like('no_ktp', $q);
	$this->db->or_like('npwp', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('tinggi_badan', $q);
	$this->db->or_like('berat_badan', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('kota', $q);
	$this->db->or_like('kodepos', $q);
	$this->db->or_like('lama', $q);
	$this->db->or_like('status_tinggal', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('telp', $q);
	$this->db->or_like('hp', $q);
	$this->db->or_like('hp2', $q);
	$this->db->or_like('ibu', $q);
	$this->db->or_like('alamat_ktp', $q);
	$this->db->or_like('kota_ktp', $q);
	$this->db->or_like('kodepos_ktp', $q);
	$this->db->or_like('tinggal_ktp', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('kendaraan', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('hubungan', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('alamat_emergency', $q);
	$this->db->or_like('InterviewApprovalID', $q);
	$this->db->or_like('InterviewLevel', $q);
	$this->db->or_like('InterviewStatus', $q);
	$this->db->or_like('HiringApprovalID', $q);
	$this->db->or_like('HiringLevel', $q);
	$this->db->or_like('HiringStatus', $q);
	$this->db->or_like('ApprovalID', $q);
	$this->db->or_like('ApprovalLevel', $q);
	$this->db->or_like('ApprovalStatus', $q);
	$this->db->or_like('IsDiscontinued', $q);
	$this->db->or_like('IsDedicated', $q);
	$this->db->or_like('DedicatedRemark', $q);
	$this->db->or_like('tgl_aktif', $q);
	$this->db->or_like('tgl_nonaktif', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('tanggal_buat', $q);
	$this->db->or_like('CreatedBy', $q);
	$this->db->or_like('jenjang_pendidikan', $q);
	$this->db->or_like('nama_sekolah', $q);
	$this->db->or_like('kota_sekolah', $q);
	$this->db->or_like('program_study', $q);
	$this->db->or_like('ipk', $q);
	$this->db->or_like('tahun_ijazah', $q);
	$this->db->or_like('jenjang_pendidikan1', $q);
	$this->db->or_like('nama_sekolah1', $q);
	$this->db->or_like('kota_sekolah1', $q);
	$this->db->or_like('program_study1', $q);
	$this->db->or_like('ipk1', $q);
	$this->db->or_like('tahun_ijazah1', $q);
	$this->db->or_like('jenjang_pendidikan2', $q);
	$this->db->or_like('nama_sekolah2', $q);
	$this->db->or_like('kota_sekolah2', $q);
	$this->db->or_like('program_study2', $q);
	$this->db->or_like('ipk2', $q);
	$this->db->or_like('tahun_ijazah2', $q);
	$this->db->or_like('perusahaan', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('tgl_masuk', $q);
	$this->db->or_like('tgl_resign', $q);
	$this->db->or_like('alasan', $q);
	$this->db->or_like('perusahaan1', $q);
	$this->db->or_like('jabatan1', $q);
	$this->db->or_like('tgl_masuk1', $q);
	$this->db->or_like('tgl_resign1', $q);
	$this->db->or_like('alasan1', $q);
	$this->db->or_like('perusahaan2', $q);
	$this->db->or_like('jabatan2', $q);
	$this->db->or_like('tgl_masuk2', $q);
	$this->db->or_like('tgl_resign2', $q);
	$this->db->or_like('alasan2', $q);
	$this->db->or_like('ktp', $q);
	$this->db->or_like('do_dont', $q);
	$this->db->or_like('ijazah', $q);
	$this->db->or_like('ket', $q);
	$this->db->or_like('tgl', $q);
	$this->db->or_like('notif', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Employee_model.php */
/* Location: ./application/models/Employee_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 13:35:46 */
/* http://harviacode.com */