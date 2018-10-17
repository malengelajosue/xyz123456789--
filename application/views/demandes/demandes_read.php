
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Creation de la demande</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <h2 style="margin-top:0px">Demandes Read</h2>
        <table class="table">
	    <tr><td>Id Users</td><td><?php echo $id_users; ?></td></tr>
	    <tr><td>Demande No</td><td><?php echo $demande_no; ?></td></tr>
	    <tr><td>Suject</td><td><?php echo $suject; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Cost</td><td><?php echo $cost; ?></td></tr>
	    <tr><td>State</td><td><?php echo $state; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
         
	    <tr><td></td><td><a href="<?php echo site_url('demandes') ?>" class="btn btn-default">Annuler</a></td></tr>
           
	</table>
       