<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Manage Notice
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>BN Notice Header</th>
                                <th>EN Notice Header</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($notices as $notice) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>
                                    <td><img src="<?php echo base_url() . $notice['image'] ?>" alt="slider_image"
                                             style="width: 200px;height: 100px;"></td>
                                    <td><?php echo $notice['bn_notice_header'] ?></td>
                                    <td><?php echo $notice['en_notice_header'] ?></td>
                                    <?php if ($notice['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>De-active</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($notice['status'] == '1') { ?>
                                            <a href="<?php echo base_url()?>portal/notice/block_notice/<?php echo $notice['notice_id'] ?>"><i class="material-icons">thumb_down</i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url()?>portal/notice/active_notice/<?php echo $notice['notice_id'] ?>"><i class="material-icons">thumb_up</i></a>
                                        <?php } ?>
                                        <a href="<?php echo base_url()?>portal/notice/edit_notice/<?php echo $notice['notice_id'] ?>"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo base_url()?>portal/notice/delete_notice/<?php echo $notice['notice_id'] ?>" onclick="return delete_notice();"><i class="material-icons">delete</i></a>
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