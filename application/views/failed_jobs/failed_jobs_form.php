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
        <h2 style="margin-top:0px">Failed_jobs <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="connection">Connection <?php echo form_error('connection') ?></label>
            <textarea class="form-control" rows="3" name="connection" id="connection" placeholder="Connection"><?php echo $connection; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="queue">Queue <?php echo form_error('queue') ?></label>
            <textarea class="form-control" rows="3" name="queue" id="queue" placeholder="Queue"><?php echo $queue; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="longtext">Payload <?php echo form_error('payload') ?></label>
            <input type="text" class="form-control" name="payload" id="payload" placeholder="Payload" value="<?php echo $payload; ?>" />
        </div>
	    <div class="form-group">
            <label for="longtext">Exception <?php echo form_error('exception') ?></label>
            <input type="text" class="form-control" name="exception" id="exception" placeholder="Exception" value="<?php echo $exception; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Failed At <?php echo form_error('failed_at') ?></label>
            <input type="text" class="form-control" name="failed_at" id="failed_at" placeholder="Failed At" value="<?php echo $failed_at; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('failed_jobs') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>