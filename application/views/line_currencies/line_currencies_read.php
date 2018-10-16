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
        <h2 style="margin-top:0px">Line_currencies Read</h2>
        <table class="table">
	    <tr><td>Id Currency</td><td><?php echo $id_currency; ?></td></tr>
	    <tr><td>Id Demande</td><td><?php echo $id_demande; ?></td></tr>
	    <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
	    <tr><td>Demande Type</td><td><?php echo $demande_type; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('line_currencies') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>