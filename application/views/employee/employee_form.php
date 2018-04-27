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
        <h2 style="margin-top:0px">Employee <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">EmployeeID <?php echo form_error('EmployeeID') ?></label>
            <input type="text" class="form-control" name="EmployeeID" id="EmployeeID" placeholder="EmployeeID" value="<?php echo $EmployeeID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ParentEmployeeID <?php echo form_error('ParentEmployeeID') ?></label>
            <input type="text" class="form-control" name="ParentEmployeeID" id="ParentEmployeeID" placeholder="ParentEmployeeID" value="<?php echo $ParentEmployeeID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmployeeOldCode <?php echo form_error('EmployeeOldCode') ?></label>
            <input type="text" class="form-control" name="EmployeeOldCode" id="EmployeeOldCode" placeholder="EmployeeOldCode" value="<?php echo $EmployeeOldCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmployeeNewCode <?php echo form_error('EmployeeNewCode') ?></label>
            <input type="text" class="form-control" name="EmployeeNewCode" id="EmployeeNewCode" placeholder="EmployeeNewCode" value="<?php echo $EmployeeNewCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmployeeStatus <?php echo form_error('EmployeeStatus') ?></label>
            <input type="text" class="form-control" name="EmployeeStatus" id="EmployeeStatus" placeholder="EmployeeStatus" value="<?php echo $EmployeeStatus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">UserGroupID <?php echo form_error('UserGroupID') ?></label>
            <input type="text" class="form-control" name="UserGroupID" id="UserGroupID" placeholder="UserGroupID" value="<?php echo $UserGroupID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmployeeGrade <?php echo form_error('EmployeeGrade') ?></label>
            <input type="text" class="form-control" name="EmployeeGrade" id="EmployeeGrade" placeholder="EmployeeGrade" value="<?php echo $EmployeeGrade; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">IdentityType <?php echo form_error('IdentityType') ?></label>
            <input type="text" class="form-control" name="IdentityType" id="IdentityType" placeholder="IdentityType" value="<?php echo $IdentityType; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">IdentityFilePath <?php echo form_error('IdentityFilePath') ?></label>
            <input type="text" class="form-control" name="IdentityFilePath" id="IdentityFilePath" placeholder="IdentityFilePath" value="<?php echo $IdentityFilePath; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">IdentityFileName <?php echo form_error('IdentityFileName') ?></label>
            <input type="text" class="form-control" name="IdentityFileName" id="IdentityFileName" placeholder="IdentityFileName" value="<?php echo $IdentityFileName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PhotoFilePath <?php echo form_error('PhotoFilePath') ?></label>
            <input type="text" class="form-control" name="PhotoFilePath" id="PhotoFilePath" placeholder="PhotoFilePath" value="<?php echo $PhotoFilePath; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sex <?php echo form_error('Sex') ?></label>
            <input type="text" class="form-control" name="Sex" id="Sex" placeholder="Sex" value="<?php echo $Sex; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">AgencyID <?php echo form_error('AgencyID') ?></label>
            <input type="text" class="form-control" name="AgencyID" id="AgencyID" placeholder="AgencyID" value="<?php echo $AgencyID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">SalesCenterID <?php echo form_error('SalesCenterID') ?></label>
            <input type="text" class="form-control" name="SalesCenterID" id="SalesCenterID" placeholder="SalesCenterID" value="<?php echo $SalesCenterID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Posisi <?php echo form_error('id_posisi') ?></label>
            <input type="text" class="form-control" name="id_posisi" id="id_posisi" placeholder="Id Posisi" value="<?php echo $id_posisi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Photo <?php echo form_error('photo') ?></label>
            <input type="text" class="form-control" name="photo" id="photo" placeholder="Photo" value="<?php echo $photo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Panggil <?php echo form_error('nama_panggil') ?></label>
            <input type="text" class="form-control" name="nama_panggil" id="nama_panggil" placeholder="Nama Panggil" value="<?php echo $nama_panggil; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Ktp <?php echo form_error('no_ktp') ?></label>
            <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No Ktp" value="<?php echo $no_ktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Npwp <?php echo form_error('npwp') ?></label>
            <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Npwp" value="<?php echo $npwp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Tinggi Badan <?php echo form_error('tinggi_badan') ?></label>
            <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan" value="<?php echo $tinggi_badan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Berat Badan <?php echo form_error('berat_badan') ?></label>
            <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan" value="<?php echo $berat_badan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kodepos <?php echo form_error('kodepos') ?></label>
            <input type="text" class="form-control" name="kodepos" id="kodepos" placeholder="Kodepos" value="<?php echo $kodepos; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lama <?php echo form_error('lama') ?></label>
            <input type="text" class="form-control" name="lama" id="lama" placeholder="Lama" value="<?php echo $lama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Tinggal <?php echo form_error('status_tinggal') ?></label>
            <input type="text" class="form-control" name="status_tinggal" id="status_tinggal" placeholder="Status Tinggal" value="<?php echo $status_tinggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Agama <?php echo form_error('agama') ?></label>
            <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telp <?php echo form_error('telp') ?></label>
            <input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hp2 <?php echo form_error('hp2') ?></label>
            <input type="text" class="form-control" name="hp2" id="hp2" placeholder="Hp2" value="<?php echo $hp2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ibu <?php echo form_error('ibu') ?></label>
            <input type="text" class="form-control" name="ibu" id="ibu" placeholder="Ibu" value="<?php echo $ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Ktp <?php echo form_error('alamat_ktp') ?></label>
            <input type="text" class="form-control" name="alamat_ktp" id="alamat_ktp" placeholder="Alamat Ktp" value="<?php echo $alamat_ktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="kota_ktp">Kota Ktp <?php echo form_error('kota_ktp') ?></label>
            <textarea class="form-control" rows="3" name="kota_ktp" id="kota_ktp" placeholder="Kota Ktp"><?php echo $kota_ktp; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Kodepos Ktp <?php echo form_error('kodepos_ktp') ?></label>
            <input type="text" class="form-control" name="kodepos_ktp" id="kodepos_ktp" placeholder="Kodepos Ktp" value="<?php echo $kodepos_ktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tinggal Ktp <?php echo form_error('tinggal_ktp') ?></label>
            <input type="text" class="form-control" name="tinggal_ktp" id="tinggal_ktp" placeholder="Tinggal Ktp" value="<?php echo $tinggal_ktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kendaraan <?php echo form_error('kendaraan') ?></label>
            <input type="text" class="form-control" name="kendaraan" id="kendaraan" placeholder="Kendaraan" value="<?php echo $kendaraan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hubungan <?php echo form_error('hubungan') ?></label>
            <input type="text" class="form-control" name="hubungan" id="hubungan" placeholder="Hubungan" value="<?php echo $hubungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Emergency <?php echo form_error('alamat_emergency') ?></label>
            <input type="text" class="form-control" name="alamat_emergency" id="alamat_emergency" placeholder="Alamat Emergency" value="<?php echo $alamat_emergency; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">InterviewApprovalID <?php echo form_error('InterviewApprovalID') ?></label>
            <input type="text" class="form-control" name="InterviewApprovalID" id="InterviewApprovalID" placeholder="InterviewApprovalID" value="<?php echo $InterviewApprovalID; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">InterviewLevel <?php echo form_error('InterviewLevel') ?></label>
            <input type="text" class="form-control" name="InterviewLevel" id="InterviewLevel" placeholder="InterviewLevel" value="<?php echo $InterviewLevel; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">InterviewStatus <?php echo form_error('InterviewStatus') ?></label>
            <input type="text" class="form-control" name="InterviewStatus" id="InterviewStatus" placeholder="InterviewStatus" value="<?php echo $InterviewStatus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">HiringApprovalID <?php echo form_error('HiringApprovalID') ?></label>
            <input type="text" class="form-control" name="HiringApprovalID" id="HiringApprovalID" placeholder="HiringApprovalID" value="<?php echo $HiringApprovalID; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">HiringLevel <?php echo form_error('HiringLevel') ?></label>
            <input type="text" class="form-control" name="HiringLevel" id="HiringLevel" placeholder="HiringLevel" value="<?php echo $HiringLevel; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">HiringStatus <?php echo form_error('HiringStatus') ?></label>
            <input type="text" class="form-control" name="HiringStatus" id="HiringStatus" placeholder="HiringStatus" value="<?php echo $HiringStatus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ApprovalID <?php echo form_error('ApprovalID') ?></label>
            <input type="text" class="form-control" name="ApprovalID" id="ApprovalID" placeholder="ApprovalID" value="<?php echo $ApprovalID; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">ApprovalLevel <?php echo form_error('ApprovalLevel') ?></label>
            <input type="text" class="form-control" name="ApprovalLevel" id="ApprovalLevel" placeholder="ApprovalLevel" value="<?php echo $ApprovalLevel; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">ApprovalStatus <?php echo form_error('ApprovalStatus') ?></label>
            <input type="text" class="form-control" name="ApprovalStatus" id="ApprovalStatus" placeholder="ApprovalStatus" value="<?php echo $ApprovalStatus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IsDiscontinued <?php echo form_error('IsDiscontinued') ?></label>
            <input type="text" class="form-control" name="IsDiscontinued" id="IsDiscontinued" placeholder="IsDiscontinued" value="<?php echo $IsDiscontinued; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IsDedicated <?php echo form_error('IsDedicated') ?></label>
            <input type="text" class="form-control" name="IsDedicated" id="IsDedicated" placeholder="IsDedicated" value="<?php echo $IsDedicated; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DedicatedRemark <?php echo form_error('DedicatedRemark') ?></label>
            <input type="text" class="form-control" name="DedicatedRemark" id="DedicatedRemark" placeholder="DedicatedRemark" value="<?php echo $DedicatedRemark; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Aktif <?php echo form_error('tgl_aktif') ?></label>
            <input type="text" class="form-control" name="tgl_aktif" id="tgl_aktif" placeholder="Tgl Aktif" value="<?php echo $tgl_aktif; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Nonaktif <?php echo form_error('tgl_nonaktif') ?></label>
            <input type="text" class="form-control" name="tgl_nonaktif" id="tgl_nonaktif" placeholder="Tgl Nonaktif" value="<?php echo $tgl_nonaktif; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Buat <?php echo form_error('tanggal_buat') ?></label>
            <input type="text" class="form-control" name="tanggal_buat" id="tanggal_buat" placeholder="Tanggal Buat" value="<?php echo $tanggal_buat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">CreatedBy <?php echo form_error('CreatedBy') ?></label>
            <input type="text" class="form-control" name="CreatedBy" id="CreatedBy" placeholder="CreatedBy" value="<?php echo $CreatedBy; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenjang Pendidikan <?php echo form_error('jenjang_pendidikan') ?></label>
            <input type="text" class="form-control" name="jenjang_pendidikan" id="jenjang_pendidikan" placeholder="Jenjang Pendidikan" value="<?php echo $jenjang_pendidikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Sekolah <?php echo form_error('nama_sekolah') ?></label>
            <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $nama_sekolah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota Sekolah <?php echo form_error('kota_sekolah') ?></label>
            <input type="text" class="form-control" name="kota_sekolah" id="kota_sekolah" placeholder="Kota Sekolah" value="<?php echo $kota_sekolah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Program Study <?php echo form_error('program_study') ?></label>
            <input type="text" class="form-control" name="program_study" id="program_study" placeholder="Program Study" value="<?php echo $program_study; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ipk <?php echo form_error('ipk') ?></label>
            <input type="text" class="form-control" name="ipk" id="ipk" placeholder="Ipk" value="<?php echo $ipk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tahun Ijazah <?php echo form_error('tahun_ijazah') ?></label>
            <input type="text" class="form-control" name="tahun_ijazah" id="tahun_ijazah" placeholder="Tahun Ijazah" value="<?php echo $tahun_ijazah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenjang Pendidikan1 <?php echo form_error('jenjang_pendidikan1') ?></label>
            <input type="text" class="form-control" name="jenjang_pendidikan1" id="jenjang_pendidikan1" placeholder="Jenjang Pendidikan1" value="<?php echo $jenjang_pendidikan1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Sekolah1 <?php echo form_error('nama_sekolah1') ?></label>
            <input type="text" class="form-control" name="nama_sekolah1" id="nama_sekolah1" placeholder="Nama Sekolah1" value="<?php echo $nama_sekolah1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota Sekolah1 <?php echo form_error('kota_sekolah1') ?></label>
            <input type="text" class="form-control" name="kota_sekolah1" id="kota_sekolah1" placeholder="Kota Sekolah1" value="<?php echo $kota_sekolah1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Program Study1 <?php echo form_error('program_study1') ?></label>
            <input type="text" class="form-control" name="program_study1" id="program_study1" placeholder="Program Study1" value="<?php echo $program_study1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ipk1 <?php echo form_error('ipk1') ?></label>
            <input type="text" class="form-control" name="ipk1" id="ipk1" placeholder="Ipk1" value="<?php echo $ipk1; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tahun Ijazah1 <?php echo form_error('tahun_ijazah1') ?></label>
            <input type="text" class="form-control" name="tahun_ijazah1" id="tahun_ijazah1" placeholder="Tahun Ijazah1" value="<?php echo $tahun_ijazah1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenjang Pendidikan2 <?php echo form_error('jenjang_pendidikan2') ?></label>
            <input type="text" class="form-control" name="jenjang_pendidikan2" id="jenjang_pendidikan2" placeholder="Jenjang Pendidikan2" value="<?php echo $jenjang_pendidikan2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Sekolah2 <?php echo form_error('nama_sekolah2') ?></label>
            <input type="text" class="form-control" name="nama_sekolah2" id="nama_sekolah2" placeholder="Nama Sekolah2" value="<?php echo $nama_sekolah2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota Sekolah2 <?php echo form_error('kota_sekolah2') ?></label>
            <input type="text" class="form-control" name="kota_sekolah2" id="kota_sekolah2" placeholder="Kota Sekolah2" value="<?php echo $kota_sekolah2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Program Study2 <?php echo form_error('program_study2') ?></label>
            <input type="text" class="form-control" name="program_study2" id="program_study2" placeholder="Program Study2" value="<?php echo $program_study2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ipk2 <?php echo form_error('ipk2') ?></label>
            <input type="text" class="form-control" name="ipk2" id="ipk2" placeholder="Ipk2" value="<?php echo $ipk2; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tahun Ijazah2 <?php echo form_error('tahun_ijazah2') ?></label>
            <input type="text" class="form-control" name="tahun_ijazah2" id="tahun_ijazah2" placeholder="Tahun Ijazah2" value="<?php echo $tahun_ijazah2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Perusahaan <?php echo form_error('perusahaan') ?></label>
            <input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="<?php echo $perusahaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Masuk <?php echo form_error('tgl_masuk') ?></label>
            <input type="text" class="form-control" name="tgl_masuk" id="tgl_masuk" placeholder="Tgl Masuk" value="<?php echo $tgl_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Resign <?php echo form_error('tgl_resign') ?></label>
            <input type="text" class="form-control" name="tgl_resign" id="tgl_resign" placeholder="Tgl Resign" value="<?php echo $tgl_resign; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alasan <?php echo form_error('alasan') ?></label>
            <input type="text" class="form-control" name="alasan" id="alasan" placeholder="Alasan" value="<?php echo $alasan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Perusahaan1 <?php echo form_error('perusahaan1') ?></label>
            <input type="text" class="form-control" name="perusahaan1" id="perusahaan1" placeholder="Perusahaan1" value="<?php echo $perusahaan1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan1 <?php echo form_error('jabatan1') ?></label>
            <input type="text" class="form-control" name="jabatan1" id="jabatan1" placeholder="Jabatan1" value="<?php echo $jabatan1; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Masuk1 <?php echo form_error('tgl_masuk1') ?></label>
            <input type="text" class="form-control" name="tgl_masuk1" id="tgl_masuk1" placeholder="Tgl Masuk1" value="<?php echo $tgl_masuk1; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Resign1 <?php echo form_error('tgl_resign1') ?></label>
            <input type="text" class="form-control" name="tgl_resign1" id="tgl_resign1" placeholder="Tgl Resign1" value="<?php echo $tgl_resign1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alasan1 <?php echo form_error('alasan1') ?></label>
            <input type="text" class="form-control" name="alasan1" id="alasan1" placeholder="Alasan1" value="<?php echo $alasan1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Perusahaan2 <?php echo form_error('perusahaan2') ?></label>
            <input type="text" class="form-control" name="perusahaan2" id="perusahaan2" placeholder="Perusahaan2" value="<?php echo $perusahaan2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan2 <?php echo form_error('jabatan2') ?></label>
            <input type="text" class="form-control" name="jabatan2" id="jabatan2" placeholder="Jabatan2" value="<?php echo $jabatan2; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Masuk2 <?php echo form_error('tgl_masuk2') ?></label>
            <input type="text" class="form-control" name="tgl_masuk2" id="tgl_masuk2" placeholder="Tgl Masuk2" value="<?php echo $tgl_masuk2; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Resign2 <?php echo form_error('tgl_resign2') ?></label>
            <input type="text" class="form-control" name="tgl_resign2" id="tgl_resign2" placeholder="Tgl Resign2" value="<?php echo $tgl_resign2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alasan2 <?php echo form_error('alasan2') ?></label>
            <input type="text" class="form-control" name="alasan2" id="alasan2" placeholder="Alasan2" value="<?php echo $alasan2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ktp <?php echo form_error('ktp') ?></label>
            <input type="text" class="form-control" name="ktp" id="ktp" placeholder="Ktp" value="<?php echo $ktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Do Dont <?php echo form_error('do_dont') ?></label>
            <input type="text" class="form-control" name="do_dont" id="do_dont" placeholder="Do Dont" value="<?php echo $do_dont; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ijazah <?php echo form_error('ijazah') ?></label>
            <input type="text" class="form-control" name="ijazah" id="ijazah" placeholder="Ijazah" value="<?php echo $ijazah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ket <?php echo form_error('ket') ?></label>
            <input type="text" class="form-control" name="ket" id="ket" placeholder="Ket" value="<?php echo $ket; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Notif <?php echo form_error('notif') ?></label>
            <input type="text" class="form-control" name="notif" id="notif" placeholder="Notif" value="<?php echo $notif; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>