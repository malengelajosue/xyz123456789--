<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Type d'utilisateur</h3>

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
                <label for="varchar">Desciption <?php echo form_error('desciption') ?></label>
                <textarea rows='5' type="text" class="form-control" name="desciption" id="desciption" placeholder="Desciption" value="<?php echo $desciption; ?>" ></textarea>
            </div>
            <div class="box-footer clearfix">
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <button type="submit" class="btn btn-info btn-flat"><?php echo $button ?></button> 
                <a href="<?php echo site_url('type_of_users') ?>" class="btn btn-default btn-flat">Annuler</a>
            </div>
        </form>
    </div>
    <!-- /.box-body -->

    <!-- /.box-footer -->
</div>