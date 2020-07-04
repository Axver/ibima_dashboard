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
        <h2 style="margin-top:0px">User_topik Read</h2>
        <table class="table">
	    <tr><td>Jumlah Percobaan</td><td><?php echo $jumlah_percobaan; ?></td></tr>
	    <tr><td>Users Id</td><td><?php echo $users_id; ?></td></tr>
	    <tr><td>Topik Id</td><td><?php echo $topik_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user_topik') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>