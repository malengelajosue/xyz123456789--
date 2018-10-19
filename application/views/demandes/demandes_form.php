
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

        <div class="row">
            <div class="col-md-8">
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="int">Id Users <?php echo form_error('id_users') ?></label>
                <input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Demande No <?php echo form_error('demande_no') ?></label>
                <input type="text" class="form-control" name="demande_no" id="demande_no" placeholder="Demande No" value="<?php echo $demande_no; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Suject <?php echo form_error('suject') ?></label>
                <input type="text" class="form-control" name="suject" id="suject" placeholder="Suject" value="<?php echo $suject; ?>" />
            </div>
            <div class="form-group">
                <label for="description">Description <?php echo form_error('description') ?></label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="float">Cost <?php echo form_error('cost') ?></label>
                <input type="text" class="form-control" name="cost" id="cost" placeholder="Cost" value="<?php echo $cost; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">State <?php echo form_error('state') ?></label>
                <input type="text" class="form-control" name="state" id="state" placeholder="State" value="<?php echo $state; ?>" />
            </div>
            <div class="form-group">
                <label for="date">Create Date <?php echo form_error('create_date') ?></label>
                <input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" />
            </div>
            <div class="box-footer clearfix">
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <button type="submit" class="btn  btn-info btn-flat"><?php echo $button ?></button> 
                <a href="<?php echo site_url('demandes') ?>" class="btn  btn-default flat">Annuler</a>
            </div>
        </form>
            </div>
        </div>
    </div>
    <!-- /.box-body -->


</div>
<!-- /.box-footer -->
