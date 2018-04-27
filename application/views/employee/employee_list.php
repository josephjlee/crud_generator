<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Employee List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('employee/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('employee/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('employee/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
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
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "employee/json", "type": "POST"},
                    columns: [
                        {
                            "data": "ID",
                            "orderable": false
                        },{"data": "EmployeeID"},{"data": "ParentEmployeeID"},{"data": "EmployeeOldCode"},{"data": "EmployeeNewCode"},{"data": "EmployeeStatus"},{"data": "UserGroupID"},{"data": "EmployeeGrade"},{"data": "IdentityType"},{"data": "IdentityFilePath"},{"data": "IdentityFileName"},{"data": "PhotoFilePath"},{"data": "Sex"},{"data": "AgencyID"},{"data": "SalesCenterID"},{"data": "id_posisi"},{"data": "photo"},{"data": "nama_lengkap"},{"data": "nama_panggil"},{"data": "no_ktp"},{"data": "npwp"},{"data": "tempat_lahir"},{"data": "tanggal_lahir"},{"data": "tinggi_badan"},{"data": "berat_badan"},{"data": "alamat"},{"data": "kota"},{"data": "kodepos"},{"data": "lama"},{"data": "status_tinggal"},{"data": "status"},{"data": "agama"},{"data": "telp"},{"data": "hp"},{"data": "hp2"},{"data": "ibu"},{"data": "alamat_ktp"},{"data": "kota_ktp"},{"data": "kodepos_ktp"},{"data": "tinggal_ktp"},{"data": "email"},{"data": "kendaraan"},{"data": "nama"},{"data": "hubungan"},{"data": "no_hp"},{"data": "alamat_emergency"},{"data": "InterviewApprovalID"},{"data": "InterviewLevel"},{"data": "InterviewStatus"},{"data": "HiringApprovalID"},{"data": "HiringLevel"},{"data": "HiringStatus"},{"data": "ApprovalID"},{"data": "ApprovalLevel"},{"data": "ApprovalStatus"},{"data": "IsDiscontinued"},{"data": "IsDedicated"},{"data": "DedicatedRemark"},{"data": "tgl_aktif"},{"data": "tgl_nonaktif"},{"data": "keterangan"},{"data": "tanggal_buat"},{"data": "CreatedBy"},{"data": "jenjang_pendidikan"},{"data": "nama_sekolah"},{"data": "kota_sekolah"},{"data": "program_study"},{"data": "ipk"},{"data": "tahun_ijazah"},{"data": "jenjang_pendidikan1"},{"data": "nama_sekolah1"},{"data": "kota_sekolah1"},{"data": "program_study1"},{"data": "ipk1"},{"data": "tahun_ijazah1"},{"data": "jenjang_pendidikan2"},{"data": "nama_sekolah2"},{"data": "kota_sekolah2"},{"data": "program_study2"},{"data": "ipk2"},{"data": "tahun_ijazah2"},{"data": "perusahaan"},{"data": "jabatan"},{"data": "tgl_masuk"},{"data": "tgl_resign"},{"data": "alasan"},{"data": "perusahaan1"},{"data": "jabatan1"},{"data": "tgl_masuk1"},{"data": "tgl_resign1"},{"data": "alasan1"},{"data": "perusahaan2"},{"data": "jabatan2"},{"data": "tgl_masuk2"},{"data": "tgl_resign2"},{"data": "alasan2"},{"data": "ktp"},{"data": "do_dont"},{"data": "ijazah"},{"data": "ket"},{"data": "tgl"},{"data": "notif"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
    </body>
</html>