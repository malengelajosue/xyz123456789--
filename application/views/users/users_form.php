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
        <h2 style="margin-top:0px">Users <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Empno <?php echo form_error('empno') ?></label>
            <input type="text" class="form-control" name="empno" id="empno" placeholder="Empno" value="<?php echo $empno; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">First Name <?php echo form_error('first_name') ?></label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Last Name <?php echo form_error('last_name') ?></label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Login <?php echo form_error('login') ?></label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Login" value="<?php echo $login; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pass <?php echo form_error('pass') ?></label>
            <input type="text" class="form-control" name="pass" id="pass" placeholder="Pass" value="<?php echo $pass; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Type <?php echo form_error('id_type') ?></label>
            <input type="text" class="form-control" name="id_type" id="id_type" placeholder="Id Type" value="<?php echo $id_type; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Departement <?php echo form_error('id_departement') ?></label>
            <input type="text" class="form-control" name="id_departement" id="id_departement" placeholder="Id Departement" value="<?php echo $id_departement; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mgr Empno <?php echo form_error('mgr_empno') ?></label>
            <input type="text" class="form-control" name="mgr_empno" id="mgr_empno" placeholder="Mgr Empno" value="<?php echo $mgr_empno; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">General M <?php echo form_error('general_m') ?></label>
            <input type="text" class="form-control" name="general_m" id="general_m" placeholder="General M" value="<?php echo $general_m; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>