<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Manage Category
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>BN Category Name</th>
                                <th>EN Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($categorys as $category) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>
                                    <td><img src="<?php echo base_url() . $category['image'] ?>" alt="category_image"
                                             style="width: 200px;height: 100px;"></td>
                                    <td><?php echo $category['bn_category_name'] ?></td>
                                    <td><?php echo $category['en_category_name'] ?></td>
                                    <?php if ($category['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>De-active</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($category['status'] == '1') { ?>
                                            <a href="<?php echo base_url()?>portal/category/block_category/<?php echo $category['category_id'] ?>"><i class="material-icons">thumb_down</i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url()?>portal/category/active_category/<?php echo $category['category_id'] ?>"><i class="material-icons">thumb_up</i></a>
                                        <?php } ?>
                                        <a href="<?php echo base_url()?>portal/category/edit_category/<?php echo $category['category_id'] ?>"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo base_url()?>portal/category/delete_category/<?php echo $category['category_id'] ?>" onclick="return delete_category();"><i class="material-icons">delete</i></a>
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