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
        <h2 style="margin-top:0px">Failed_jobs Read</h2>
        <table class="table">
	    <tr><td>Connection</td><td><?php echo $connection; ?></td></tr>
	    <tr><td>Queue</td><td><?php echo $queue; ?></td></tr>
	    <tr><td>Payload</td><td><?php echo $payload; ?></td></tr>
	    <tr><td>Exception</td><td><?php echo $exception; ?></td></tr>
	    <tr><td>Failed At</td><td><?php echo $failed_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('failed_jobs') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>