<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
        </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div> 