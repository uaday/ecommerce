<?php $j = 0; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Approve Product/Service
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product/Service</th>
                                <th>Product/Service Name</th>
                                <th>Product Material</th>
                                <th>Product Color</th>
                                <th>Product Size</th>
                                <th>Product Design</th>
                                <th>Product Condition</th>
                                <th>Automatic Grade</th>
                                <th>Product/Service Price</th>
                                <th>Request Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $product) { ?>
                                <tr>
                                    <th scope="row"><?php echo ++$j; ?></th>
                                    <td><img src="<?php echo base_url() . $product['product_photo'] ?>" alt="product_image"
                                             style="width: 80px;height: 40px;"></td>
                                    <?php if($product['service']=='0'){?>
                                        <td>Product</td>
                                    <?php }else {?>
                                        <td>Service</td>
                                    <?php }?>
                                    <td><?php echo $product['product_name'] ?></td>
                                    <td><?php echo $product['product_material'] ?></td>
                                    <td><?php echo $product['product_color'] ?></td>
                                    <td><?php echo $product['product_size'] ?></td>
                                    <td><?php echo $product['product_design'] ?></td>
                                    <td><?php echo $product['product_condition'] ?></td>
                                    <td><?php echo $product['automatic_grade'] ?></td>
                                    <td><?php echo $product['product_price'] ?></td>
                                    <td><?php echo $product['product_create_date'] ?></td>
                                    <?php if ($product['status'] == '1') { ?>
                                        <td>Approved</td>
                                    <?php } else { ?>
                                        <td>Not Approved</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($product['status'] == '1') { ?>
                                            <a href="<?php echo base_url()?>portal/product/block_product/<?php echo $product['product_id'] ?>"><i class="material-icons">thumb_down</i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url()?>portal/product/active_product/<?php echo $product['product_id'] ?>"><i class="material-icons">thumb_up</i></a>
                                        <?php } ?>
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