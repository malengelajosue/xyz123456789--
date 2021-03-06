<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Types d'utilisateurs</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
               
                <a href="<?= base_url('type_of_users/create')?>"><button class='btn btn-default'> <i class='fa fa-plus'></i></button></a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('type_of_users/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                            if ($q <> '') {
                                ?>
                                <a href="<?php echo site_url('type_of_users'); ?>" class="btn btn-default">Reset</a>
                                <?php
                            }
                            ?>
                            <button class="btn btn-info btn-flat" type="submit">Rechercher</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Desciption</th>
                <th>Action</th>
            </tr><?php
            foreach ($type_of_users_data as $type_of_users) {
                ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $type_of_users->name ?></td>
                    <td><?php echo $type_of_users->desciption ?></td>
                    <td style="text-align:center" width="200px">
                        <?php
                        echo anchor(site_url('type_of_users/read/' . $type_of_users->id), 'Read');
                        echo ' | ';
                        echo anchor(site_url('type_of_users/update/' . $type_of_users->id), 'Update');
                        echo ' | ';
                        echo anchor(site_url('type_of_users/delete/' . $type_of_users->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
             <div class="box-footer clearfix">
            <div class="col-md-6">
                <a href="#" class="btn btn-info btn-flat">Total : <?php echo $total_rows ?></a>
              
                <a href="<?= base_url('type_of_users/excel')?>"><button class='btn btn-success btn-flat'>Telecharger&nbsp;<i class='fa fa-download'></i></button> </a>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
    </div>
    <!-- /.box-body -->
 
    <!-- /.box-footer -->
</div>