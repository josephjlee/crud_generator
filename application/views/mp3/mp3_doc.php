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
        <h2>Mp3 List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>File</th>
		<th>Name</th>
		<th>A Number</th>
		<th>Create At</th>
		
            </tr><?php
            foreach ($mp3_data as $mp3)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mp3->file ?></td>
		      <td><?php echo $mp3->name ?></td>
		      <td><?php echo $mp3->a_number ?></td>
		      <td><?php echo $mp3->create_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>