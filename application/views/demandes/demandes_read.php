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
        <h2 style="margin-top:0px">Demandes Read</h2>
        <table class="table">
	    <tr><td>Id Users</td><td><?php echo $id_users; ?></td></tr>
	    <tr><td>Demande No</td><td><?php echo $demande_no; ?></td></tr>
	    <tr><td>Suject</td><td><?php echo $suject; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Cost</td><td><?php echo $cost; ?></td></tr>
	    <tr><td>State</td><td><?php echo $state; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('demandes') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>