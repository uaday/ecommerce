<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Manage Slider
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>BN Slider Header</th>
                                <th>EN Slider Header</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($sliders as $slider) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>
                                    <td><img src="<?php echo base_url() . $slider['image'] ?>" alt="slider)image"
                                             style="width: 200px;height: 100px;"></td>
                                    <td><?php echo $slider['bn_slider_header'] ?></td>
                                    <td><?php echo $slider['en_slider_header'] ?></td>
                                    <?php if ($slider['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>De-active</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($slider['status'] == '1') { ?>
                                            <a href="<?php echo base_url()?>portal/slider/block_slider/<?php echo $slider['slider_id'] ?>"><i class="material-icons">thumb_down</i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url()?>portal/slider/active_slider/<?php echo $slider['slider_id'] ?>"><i class="material-icons">thumb_up</i></a>
                                        <?php } ?>
                                        <a href="<?php echo base_url()?>portal/slider/edit_slider/<?php echo $slider['slider_id'] ?>"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo base_url()?>portal/slider/delete_slider/<?php echo $slider['slider_id'] ?>" onclick="return delete_slider();"><i class="material-icons">delete</i></a>
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