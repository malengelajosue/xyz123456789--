<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Le cash</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
     
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Description <?php echo form_error('description') ?></label>
            <textarea rows="5" type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" ></textarea
        </div>
	    <div class="form-group">
           
            <input type="hidden" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
        </div>
	    <div class="form-group">
            
            <input type="hidden" class="form-control" name="update_date" id="update_date" placeholder="Update Date" value="<?php echo $update_date; ?>" />
        </div>
              <div class="box-footer clearfix">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-info btn-flat"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('currencies') ?>" class="btn btn-default btn-flat">Annuler</a>
              </div>
	</form>
    </div>
            <!-- /.box-body -->
          
            <!-- /.box-footer -->
          </div>