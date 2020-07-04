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
        <h2 style="margin-top:0px">User_topik <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jumlah Percobaan <?php echo form_error('jumlah_percobaan') ?></label>
            <input type="text" class="form-control" name="jumlah_percobaan" id="jumlah_percobaan" placeholder="Jumlah Percobaan" value="<?php echo $jumlah_percobaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Users Id <?php echo form_error('users_id') ?></label>
            <input type="text" class="form-control" name="users_id" id="users_id" placeholder="Users Id" value="<?php echo $users_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Topik Id <?php echo form_error('topik_id') ?></label>
            <input type="text" class="form-control" name="topik_id" id="topik_id" placeholder="Topik Id" value="<?php echo $topik_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user_topik') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>