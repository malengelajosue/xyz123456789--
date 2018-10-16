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
        <h2 style="margin-top:0px">Type_of_users Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Desciption</td><td><?php echo $desciption; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('type_of_users') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>