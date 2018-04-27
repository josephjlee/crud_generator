<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Employee List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EmployeeID</th>
		<th>ParentEmployeeID</th>
		<th>EmployeeOldCode</th>
		<th>EmployeeNewCode</th>
		<th>EmployeeStatus</th>
		<th>UserGroupID</th>
		<th>EmployeeGrade</th>
		<th>IdentityType</th>
		<th>IdentityFilePath</th>
		<th>IdentityFileName</th>
		<th>PhotoFilePath</th>
		<th>Sex</th>
		<th>AgencyID</th>
		<th>SalesCenterID</th>
		<th>Id Posisi</th>
		<th>Photo</th>
		<th>Nama Lengkap</th>
		<th>Nama Panggil</th>
		<th>No Ktp</th>
		<th>Npwp</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Tinggi Badan</th>
		<th>Berat Badan</th>
		<th>Alamat</th>
		<th>Kota</th>
		<th>Kodepos</th>
		<th>Lama</th>
		<th>Status Tinggal</th>
		<th>Status</th>
		<th>Agama</th>
		<th>Telp</th>
		<th>Hp</th>
		<th>Hp2</th>
		<th>Ibu</th>
		<th>Alamat Ktp</th>
		<th>Kota Ktp</th>
		<th>Kodepos Ktp</th>
		<th>Tinggal Ktp</th>
		<th>Email</th>
		<th>Kendaraan</th>
		<th>Nama</th>
		<th>Hubungan</th>
		<th>No Hp</th>
		<th>Alamat Emergency</th>
		<th>InterviewApprovalID</th>
		<th>InterviewLevel</th>
		<th>InterviewStatus</th>
		<th>HiringApprovalID</th>
		<th>HiringLevel</th>
		<th>HiringStatus</th>
		<th>ApprovalID</th>
		<th>ApprovalLevel</th>
		<th>ApprovalStatus</th>
		<th>IsDiscontinued</th>
		<th>IsDedicated</th>
		<th>DedicatedRemark</th>
		<th>Tgl Aktif</th>
		<th>Tgl Nonaktif</th>
		<th>Keterangan</th>
		<th>Tanggal Buat</th>
		<th>CreatedBy</th>
		<th>Jenjang Pendidikan</th>
		<th>Nama Sekolah</th>
		<th>Kota Sekolah</th>
		<th>Program Study</th>
		<th>Ipk</th>
		<th>Tahun Ijazah</th>
		<th>Jenjang Pendidikan1</th>
		<th>Nama Sekolah1</th>
		<th>Kota Sekolah1</th>
		<th>Program Study1</th>
		<th>Ipk1</th>
		<th>Tahun Ijazah1</th>
		<th>Jenjang Pendidikan2</th>
		<th>Nama Sekolah2</th>
		<th>Kota Sekolah2</th>
		<th>Program Study2</th>
		<th>Ipk2</th>
		<th>Tahun Ijazah2</th>
		<th>Perusahaan</th>
		<th>Jabatan</th>
		<th>Tgl Masuk</th>
		<th>Tgl Resign</th>
		<th>Alasan</th>
		<th>Perusahaan1</th>
		<th>Jabatan1</th>
		<th>Tgl Masuk1</th>
		<th>Tgl Resign1</th>
		<th>Alasan1</th>
		<th>Perusahaan2</th>
		<th>Jabatan2</th>
		<th>Tgl Masuk2</th>
		<th>Tgl Resign2</th>
		<th>Alasan2</th>
		<th>Ktp</th>
		<th>Do Dont</th>
		<th>Ijazah</th>
		<th>Ket</th>
		<th>Tgl</th>
		<th>Notif</th>
		
            </tr><?php
            foreach ($employee_data as $employee)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $employee->EmployeeID ?></td>
		      <td><?php echo $employee->ParentEmployeeID ?></td>
		      <td><?php echo $employee->EmployeeOldCode ?></td>
		      <td><?php echo $employee->EmployeeNewCode ?></td>
		      <td><?php echo $employee->EmployeeStatus ?></td>
		      <td><?php echo $employee->UserGroupID ?></td>
		      <td><?php echo $employee->EmployeeGrade ?></td>
		      <td><?php echo $employee->IdentityType ?></td>
		      <td><?php echo $employee->IdentityFilePath ?></td>
		      <td><?php echo $employee->IdentityFileName ?></td>
		      <td><?php echo $employee->PhotoFilePath ?></td>
		      <td><?php echo $employee->Sex ?></td>
		      <td><?php echo $employee->AgencyID ?></td>
		      <td><?php echo $employee->SalesCenterID ?></td>
		      <td><?php echo $employee->id_posisi ?></td>
		      <td><?php echo $employee->photo ?></td>
		      <td><?php echo $employee->nama_lengkap ?></td>
		      <td><?php echo $employee->nama_panggil ?></td>
		      <td><?php echo $employee->no_ktp ?></td>
		      <td><?php echo $employee->npwp ?></td>
		      <td><?php echo $employee->tempat_lahir ?></td>
		      <td><?php echo $employee->tanggal_lahir ?></td>
		      <td><?php echo $employee->tinggi_badan ?></td>
		      <td><?php echo $employee->berat_badan ?></td>
		      <td><?php echo $employee->alamat ?></td>
		      <td><?php echo $employee->kota ?></td>
		      <td><?php echo $employee->kodepos ?></td>
		      <td><?php echo $employee->lama ?></td>
		      <td><?php echo $employee->status_tinggal ?></td>
		      <td><?php echo $employee->status ?></td>
		      <td><?php echo $employee->agama ?></td>
		      <td><?php echo $employee->telp ?></td>
		      <td><?php echo $employee->hp ?></td>
		      <td><?php echo $employee->hp2 ?></td>
		      <td><?php echo $employee->ibu ?></td>
		      <td><?php echo $employee->alamat_ktp ?></td>
		      <td><?php echo $employee->kota_ktp ?></td>
		      <td><?php echo $employee->kodepos_ktp ?></td>
		      <td><?php echo $employee->tinggal_ktp ?></td>
		      <td><?php echo $employee->email ?></td>
		      <td><?php echo $employee->kendaraan ?></td>
		      <td><?php echo $employee->nama ?></td>
		      <td><?php echo $employee->hubungan ?></td>
		      <td><?php echo $employee->no_hp ?></td>
		      <td><?php echo $employee->alamat_emergency ?></td>
		      <td><?php echo $employee->InterviewApprovalID ?></td>
		      <td><?php echo $employee->InterviewLevel ?></td>
		      <td><?php echo $employee->InterviewStatus ?></td>
		      <td><?php echo $employee->HiringApprovalID ?></td>
		      <td><?php echo $employee->HiringLevel ?></td>
		      <td><?php echo $employee->HiringStatus ?></td>
		      <td><?php echo $employee->ApprovalID ?></td>
		      <td><?php echo $employee->ApprovalLevel ?></td>
		      <td><?php echo $employee->ApprovalStatus ?></td>
		      <td><?php echo $employee->IsDiscontinued ?></td>
		      <td><?php echo $employee->IsDedicated ?></td>
		      <td><?php echo $employee->DedicatedRemark ?></td>
		      <td><?php echo $employee->tgl_aktif ?></td>
		      <td><?php echo $employee->tgl_nonaktif ?></td>
		      <td><?php echo $employee->keterangan ?></td>
		      <td><?php echo $employee->tanggal_buat ?></td>
		      <td><?php echo $employee->CreatedBy ?></td>
		      <td><?php echo $employee->jenjang_pendidikan ?></td>
		      <td><?php echo $employee->nama_sekolah ?></td>
		      <td><?php echo $employee->kota_sekolah ?></td>
		      <td><?php echo $employee->program_study ?></td>
		      <td><?php echo $employee->ipk ?></td>
		      <td><?php echo $employee->tahun_ijazah ?></td>
		      <td><?php echo $employee->jenjang_pendidikan1 ?></td>
		      <td><?php echo $employee->nama_sekolah1 ?></td>
		      <td><?php echo $employee->kota_sekolah1 ?></td>
		      <td><?php echo $employee->program_study1 ?></td>
		      <td><?php echo $employee->ipk1 ?></td>
		      <td><?php echo $employee->tahun_ijazah1 ?></td>
		      <td><?php echo $employee->jenjang_pendidikan2 ?></td>
		      <td><?php echo $employee->nama_sekolah2 ?></td>
		      <td><?php echo $employee->kota_sekolah2 ?></td>
		      <td><?php echo $employee->program_study2 ?></td>
		      <td><?php echo $employee->ipk2 ?></td>
		      <td><?php echo $employee->tahun_ijazah2 ?></td>
		      <td><?php echo $employee->perusahaan ?></td>
		      <td><?php echo $employee->jabatan ?></td>
		      <td><?php echo $employee->tgl_masuk ?></td>
		      <td><?php echo $employee->tgl_resign ?></td>
		      <td><?php echo $employee->alasan ?></td>
		      <td><?php echo $employee->perusahaan1 ?></td>
		      <td><?php echo $employee->jabatan1 ?></td>
		      <td><?php echo $employee->tgl_masuk1 ?></td>
		      <td><?php echo $employee->tgl_resign1 ?></td>
		      <td><?php echo $employee->alasan1 ?></td>
		      <td><?php echo $employee->perusahaan2 ?></td>
		      <td><?php echo $employee->jabatan2 ?></td>
		      <td><?php echo $employee->tgl_masuk2 ?></td>
		      <td><?php echo $employee->tgl_resign2 ?></td>
		      <td><?php echo $employee->alasan2 ?></td>
		      <td><?php echo $employee->ktp ?></td>
		      <td><?php echo $employee->do_dont ?></td>
		      <td><?php echo $employee->ijazah ?></td>
		      <td><?php echo $employee->ket ?></td>
		      <td><?php echo $employee->tgl ?></td>
		      <td><?php echo $employee->notif ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>