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
        <h2 style="margin-top:0px">Currencies Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
	    <tr><td>Update Date</td><td><?php echo $update_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('currencies') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>