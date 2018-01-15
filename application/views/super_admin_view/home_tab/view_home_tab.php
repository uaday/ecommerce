<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Manage Home Tab
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>BN Home Tab Header</th>
                                <th>EN Home Tab Header</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($home_tabs as $home_tab) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>
                                    <td><img src="<?php echo base_url().$home_tab['image'] ?>" alt="home_tab_image"
                                             style="width: 200px;height: 100px;"></td>
                                    <td><?php echo $home_tab['bn_home_tab_header'] ?></td>
                                    <td><?php echo $home_tab['en_home_tab_header'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url()?>portal/home_tab/edit_home_tab/<?php echo $home_tab['home_tab_id'] ?>"><i class="material-icons">edit</i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>