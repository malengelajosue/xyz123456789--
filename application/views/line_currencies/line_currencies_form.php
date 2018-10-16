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
        <h2 style="margin-top:0px">Line_currencies <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Currency <?php echo form_error('id_currency') ?></label>
            <input type="text" class="form-control" name="id_currency" id="id_currency" placeholder="Id Currency" value="<?php echo $id_currency; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Demande <?php echo form_error('id_demande') ?></label>
            <input type="text" class="form-control" name="id_demande" id="id_demande" placeholder="Id Demande" value="<?php echo $id_demande; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Amount <?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Demande Type <?php echo form_error('demande_type') ?></label>
            <input type="text" class="form-control" name="demande_type" id="demande_type" placeholder="Demande Type" value="<?php echo $demande_type; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Create Date <?php echo form_error('create_date') ?></label>
            <input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('line_currencies') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>