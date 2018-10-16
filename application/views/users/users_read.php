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
        <h2 style="margin-top:0px">Users Read</h2>
        <table class="table">
	    <tr><td>Empno</td><td><?php echo $empno; ?></td></tr>
	    <tr><td>First Name</td><td><?php echo $first_name; ?></td></tr>
	    <tr><td>Last Name</td><td><?php echo $last_name; ?></td></tr>
	    <tr><td>Login</td><td><?php echo $login; ?></td></tr>
	    <tr><td>Pass</td><td><?php echo $pass; ?></td></tr>
	    <tr><td>Id Type</td><td><?php echo $id_type; ?></td></tr>
	    <tr><td>Id Departement</td><td><?php echo $id_departement; ?></td></tr>
	    <tr><td>Mgr Empno</td><td><?php echo $mgr_empno; ?></td></tr>
	    <tr><td>General M</td><td><?php echo $general_m; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>