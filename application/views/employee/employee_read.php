<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Employee Read</h2>
        <table class="table">
	    <tr><td>EmployeeID</td><td><?php echo $EmployeeID; ?></td></tr>
	    <tr><td>ParentEmployeeID</td><td><?php echo $ParentEmployeeID; ?></td></tr>
	    <tr><td>EmployeeOldCode</td><td><?php echo $EmployeeOldCode; ?></td></tr>
	    <tr><td>EmployeeNewCode</td><td><?php echo $EmployeeNewCode; ?></td></tr>
	    <tr><td>EmployeeStatus</td><td><?php echo $EmployeeStatus; ?></td></tr>
	    <tr><td>UserGroupID</td><td><?php echo $UserGroupID; ?></td></tr>
	    <tr><td>EmployeeGrade</td><td><?php echo $EmployeeGrade; ?></td></tr>
	    <tr><td>IdentityType</td><td><?php echo $IdentityType; ?></td></tr>
	    <tr><td>IdentityFilePath</td><td><?php echo $IdentityFilePath; ?></td></tr>
	    <tr><td>IdentityFileName</td><td><?php echo $IdentityFileName; ?></td></tr>
	    <tr><td>PhotoFilePath</td><td><?php echo $PhotoFilePath; ?></td></tr>
	    <tr><td>Sex</td><td><?php echo $Sex; ?></td></tr>
	    <tr><td>AgencyID</td><td><?php echo $AgencyID; ?></td></tr>
	    <tr><td>SalesCenterID</td><td><?php echo $SalesCenterID; ?></td></tr>
	    <tr><td>Id Posisi</td><td><?php echo $id_posisi; ?></td></tr>
	    <tr><td>Photo</td><td><?php echo $photo; ?></td></tr>
	    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
	    <tr><td>Nama Panggil</td><td><?php echo $nama_panggil; ?></td></tr>
	    <tr><td>No Ktp</td><td><?php echo $no_ktp; ?></td></tr>
	    <tr><td>Npwp</td><td><?php echo $npwp; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Tinggi Badan</td><td><?php echo $tinggi_badan; ?></td></tr>
	    <tr><td>Berat Badan</td><td><?php echo $berat_badan; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Kodepos</td><td><?php echo $kodepos; ?></td></tr>
	    <tr><td>Lama</td><td><?php echo $lama; ?></td></tr>
	    <tr><td>Status Tinggal</td><td><?php echo $status_tinggal; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Telp</td><td><?php echo $telp; ?></td></tr>
	    <tr><td>Hp</td><td><?php echo $hp; ?></td></tr>
	    <tr><td>Hp2</td><td><?php echo $hp2; ?></td></tr>
	    <tr><td>Ibu</td><td><?php echo $ibu; ?></td></tr>
	    <tr><td>Alamat Ktp</td><td><?php echo $alamat_ktp; ?></td></tr>
	    <tr><td>Kota Ktp</td><td><?php echo $kota_ktp; ?></td></tr>
	    <tr><td>Kodepos Ktp</td><td><?php echo $kodepos_ktp; ?></td></tr>
	    <tr><td>Tinggal Ktp</td><td><?php echo $tinggal_ktp; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Kendaraan</td><td><?php echo $kendaraan; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Hubungan</td><td><?php echo $hubungan; ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
	    <tr><td>Alamat Emergency</td><td><?php echo $alamat_emergency; ?></td></tr>
	    <tr><td>InterviewApprovalID</td><td><?php echo $InterviewApprovalID; ?></td></tr>
	    <tr><td>InterviewLevel</td><td><?php echo $InterviewLevel; ?></td></tr>
	    <tr><td>InterviewStatus</td><td><?php echo $InterviewStatus; ?></td></tr>
	    <tr><td>HiringApprovalID</td><td><?php echo $HiringApprovalID; ?></td></tr>
	    <tr><td>HiringLevel</td><td><?php echo $HiringLevel; ?></td></tr>
	    <tr><td>HiringStatus</td><td><?php echo $HiringStatus; ?></td></tr>
	    <tr><td>ApprovalID</td><td><?php echo $ApprovalID; ?></td></tr>
	    <tr><td>ApprovalLevel</td><td><?php echo $ApprovalLevel; ?></td></tr>
	    <tr><td>ApprovalStatus</td><td><?php echo $ApprovalStatus; ?></td></tr>
	    <tr><td>IsDiscontinued</td><td><?php echo $IsDiscontinued; ?></td></tr>
	    <tr><td>IsDedicated</td><td><?php echo $IsDedicated; ?></td></tr>
	    <tr><td>DedicatedRemark</td><td><?php echo $DedicatedRemark; ?></td></tr>
	    <tr><td>Tgl Aktif</td><td><?php echo $tgl_aktif; ?></td></tr>
	    <tr><td>Tgl Nonaktif</td><td><?php echo $tgl_nonaktif; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Tanggal Buat</td><td><?php echo $tanggal_buat; ?></td></tr>
	    <tr><td>CreatedBy</td><td><?php echo $CreatedBy; ?></td></tr>
	    <tr><td>Jenjang Pendidikan</td><td><?php echo $jenjang_pendidikan; ?></td></tr>
	    <tr><td>Nama Sekolah</td><td><?php echo $nama_sekolah; ?></td></tr>
	    <tr><td>Kota Sekolah</td><td><?php echo $kota_sekolah; ?></td></tr>
	    <tr><td>Program Study</td><td><?php echo $program_study; ?></td></tr>
	    <tr><td>Ipk</td><td><?php echo $ipk; ?></td></tr>
	    <tr><td>Tahun Ijazah</td><td><?php echo $tahun_ijazah; ?></td></tr>
	    <tr><td>Jenjang Pendidikan1</td><td><?php echo $jenjang_pendidikan1; ?></td></tr>
	    <tr><td>Nama Sekolah1</td><td><?php echo $nama_sekolah1; ?></td></tr>
	    <tr><td>Kota Sekolah1</td><td><?php echo $kota_sekolah1; ?></td></tr>
	    <tr><td>Program Study1</td><td><?php echo $program_study1; ?></td></tr>
	    <tr><td>Ipk1</td><td><?php echo $ipk1; ?></td></tr>
	    <tr><td>Tahun Ijazah1</td><td><?php echo $tahun_ijazah1; ?></td></tr>
	    <tr><td>Jenjang Pendidikan2</td><td><?php echo $jenjang_pendidikan2; ?></td></tr>
	    <tr><td>Nama Sekolah2</td><td><?php echo $nama_sekolah2; ?></td></tr>
	    <tr><td>Kota Sekolah2</td><td><?php echo $kota_sekolah2; ?></td></tr>
	    <tr><td>Program Study2</td><td><?php echo $program_study2; ?></td></tr>
	    <tr><td>Ipk2</td><td><?php echo $ipk2; ?></td></tr>
	    <tr><td>Tahun Ijazah2</td><td><?php echo $tahun_ijazah2; ?></td></tr>
	    <tr><td>Perusahaan</td><td><?php echo $perusahaan; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Tgl Masuk</td><td><?php echo $tgl_masuk; ?></td></tr>
	    <tr><td>Tgl Resign</td><td><?php echo $tgl_resign; ?></td></tr>
	    <tr><td>Alasan</td><td><?php echo $alasan; ?></td></tr>
	    <tr><td>Perusahaan1</td><td><?php echo $perusahaan1; ?></td></tr>
	    <tr><td>Jabatan1</td><td><?php echo $jabatan1; ?></td></tr>
	    <tr><td>Tgl Masuk1</td><td><?php echo $tgl_masuk1; ?></td></tr>
	    <tr><td>Tgl Resign1</td><td><?php echo $tgl_resign1; ?></td></tr>
	    <tr><td>Alasan1</td><td><?php echo $alasan1; ?></td></tr>
	    <tr><td>Perusahaan2</td><td><?php echo $perusahaan2; ?></td></tr>
	    <tr><td>Jabatan2</td><td><?php echo $jabatan2; ?></td></tr>
	    <tr><td>Tgl Masuk2</td><td><?php echo $tgl_masuk2; ?></td></tr>
	    <tr><td>Tgl Resign2</td><td><?php echo $tgl_resign2; ?></td></tr>
	    <tr><td>Alasan2</td><td><?php echo $alasan2; ?></td></tr>
	    <tr><td>Ktp</td><td><?php echo $ktp; ?></td></tr>
	    <tr><td>Do Dont</td><td><?php echo $do_dont; ?></td></tr>
	    <tr><td>Ijazah</td><td><?php echo $ijazah; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Notif</td><td><?php echo $notif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>