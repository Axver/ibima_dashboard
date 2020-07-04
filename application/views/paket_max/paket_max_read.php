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
        <h2 style="margin-top:0px">Paket_max Read</h2>
        <table class="table">
	    <tr><td>Paket Id</td><td><?php echo $paket_id; ?></td></tr>
	    <tr><td>Max</td><td><?php echo $max; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('paket_max') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>