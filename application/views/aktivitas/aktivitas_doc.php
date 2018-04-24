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
        <h2>Aktivitas List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Nasabah</th>
		<th>Tanggal</th>
		<th>Waktu</th>
		<th>Alamat</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($aktivitas_data as $aktivitas)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $aktivitas->nama_nasabah ?></td>
		      <td><?php echo $aktivitas->tanggal ?></td>
		      <td><?php echo $aktivitas->waktu ?></td>
		      <td><?php echo $aktivitas->alamat ?></td>
		      <td><?php echo $aktivitas->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>